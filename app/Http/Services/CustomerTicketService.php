<?php

namespace App\Http\Services;

use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\DynamicField;
use App\Models\DynamicFieldData;
use App\Models\Envato;
use App\Models\FileManager;
use App\Models\TicketSeenUnseen;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Varity;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendEmailGenericJob;
use App\Mail\SendMailGeneric;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class   CustomerTicketService
{
    use ResponseTrait;

    public $ticketCategoryService;

    public function __construct()
    {
        $this->ticketCategoryService = new TicketCategoryService;
    }

    public function store($request)
    {
//        $envato = Envato::where('tenant_id', auth()->user()->tenant_id)->first();
//        if($envato?->enable_purchase_code == 1){
//            $request->validate([
//                'purchase_code' => 'required',
////                'domain' => 'required',
//            ]);
//        }

        DB::beginTransaction();
        try {
            if ($request->id && $request->id != null) {
                $dataObj = Ticket::where('id', $request->id)->first();
            } else {
                $dataObj = new Ticket();
            }

            $dataObj->ticket_title = $request->subject;
            $dataObj->envato_licence = $request->purchase_code;
            $dataObj->ticket_description = $request->details;
//            $dataObj->domain = $request->domain;
            $dataObj->ticket_type = TICKET_TYPE_INTERNAL;
            $dataObj->category_id = $request->category;
            $dataObj->created_by = auth()->id();
            $dataObj->last_reply_time = now();
            $dataObj->status = STATUS_PENDING;
            $dataObj->priority = GENERALLY;
            $dataObj->tenant_id = getTenantId();

            /*File Manager Call upload*/
            if ($request->file && count($request->file) > 0) {
                $fileId = [];
                foreach ($request->file as $singlefile) {
                    $new_file = new FileManager();
                    $uploaded = $new_file->upload('ticket-documents', $singlefile);
                    array_push($fileId, $uploaded->id);
                }
                $dataObj->file_id = json_encode($fileId);
            }

            /*End*/
            $dataObj->save();

            //dynamic field data save
            $dynamicFieldList = DynamicField::where('tenant_id', auth()->user()->tenant_id)->orderBy('order', 'ASC')->get();
            if (count($dynamicFieldList) > 0) {
                foreach ($dynamicFieldList as $field) {
                    $dynamicFieldObj = new DynamicFieldData();
                    $dynamicFieldObj->ticket_id = $dataObj->id;
                    $dynamicFieldObj->field_id = $field->id;
                    $dynamicFieldObj->field_value = $request->{$field->name};
                    $dynamicFieldObj->tenant_id = auth()->user()->tenant_id;
                    $dynamicFieldObj->save();
                }
            }
            //dynamic field data save


            $ctegoryCode = Category::where('id', $dataObj->category_id)->first();
            if($ctegoryCode->is_ticket_prefix){
                $getTrackingPreFixed =  $ctegoryCode->code;
            }else{
                $verity = Varity::where('created_by', getUserIdByTenant())->first();
                $getTrackingPreFixed = isset($verity->ticket_tracking_no_pre_fixed) ? $verity->ticket_tracking_no_pre_fixed : 'ST';

            }

            $trackingNo = $getTrackingPreFixed . sprintf('%06d', $dataObj->id);
            if ($dataObj->id) {
                Ticket::where('id', $dataObj->id)->update(['tracking_no' => $trackingNo]);
                $categoryData = $this->ticketCategoryService->getById($request->category);
                $categoryUser = $categoryData->users->pluck('id')->toArray();
                $dataObj->users()->syncWithPivotValues($categoryUser, ['is_active' => ACTIVE, 'tenant_id' => getTenantId(), 'assigned_by' => getUserIdByTenant()], false);
            }

            $getAlluser = User::where('tenant_id', auth()->user()->tenant_id)
                ->where('role', '!=', USER_ROLE_CUSTOMER)
                ->get();

            $userData = [];

            foreach ($getAlluser as $key => $singleUser) {
                $userData[] = [
                    'ticket_id' => $dataObj->id,
                    'created_by' => $singleUser->id,
                    'tenant_id' => $singleUser->tenant_id,
                    'is_seen' => 0,
                ];
            }
            $userData[] = [
                'ticket_id' => $dataObj->id,
                'created_by' => auth()->id(),
                'tenant_id' => auth()->user()->tenant_id,
                'is_seen' => 1,
            ];

            TicketSeenUnseen::insert($userData);


            DB::commit();

            //add user log start
            addUserActivityLog('ticket-create', auth()->id(), $dataObj->id);
            //add user log end

            //send notification start
//            setCommonNotification(auth()->id(), 'New Ticket created', 'Welcome, You have a new ticket. Ticket tracking number ' . $trackingNo);
            newTicketNotify($dataObj->id);
            //send notification end

            //send email notification start
            newTicketEmailNotify($dataObj->id);
            //send email notification end
            return redirect()->route('customer.ticket.active-ticket')->with('success', __("Ticket created successfully"));
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());
            return redirect()->back()->with('error', SOMETHING_WENT_WRONG);
        }
    }

    public function guestTicketStore($request)
    {

        DB::beginTransaction();
        try {

            //check user exist or not
            $user = User::where('email', $request->email)->first();
            if (is_null($user)) {
                $remember_token = Str::random(64);
                $google2fa = app('pragmarx.google2fa');

                $userStatus = USER_STATUS_ACTIVE;
                if (getOption('email_verification_status', 0) == 1) {
                    $userStatus = USER_STATUS_UNVERIFIED;
                }
                $user = new User();
                $user->role = USER_ROLE_CUSTOMER;
                $user->name = explode('@', $request->email)[0];
                $user->email = trim($request->email);
                $user->password = Hash::make(123456);
                $user->remember_token = $remember_token;
                $user->status = $userStatus;
                $user->tenant_id = getTenantId();
                $user->google2fa_secret = $google2fa->generateSecretKey();
                $user->save();
            }
            //check user exist or not

            if ($request->id && $request->id != null) {
                $dataObj = Ticket::where('id', $request->id)->first();
            } else {
                $dataObj = new Ticket();
            }

            $dataObj->ticket_title = $request->subject;
            $dataObj->envato_licence = $request->purchase_code;
            $dataObj->ticket_description = $request->details;
            $dataObj->ticket_type = TICKET_TYPE_INTERNAL;
            $dataObj->category_id = $request->category;
            $dataObj->created_by = $user->id;
            $dataObj->last_reply_time = now();
            $dataObj->status = STATUS_PENDING;
            $dataObj->priority = GENERALLY;
            $dataObj->tenant_id = getTenantId();

            /*File Manager Call upload*/
            if ($request->file && count($request->file) > 0) {
                $fileId = [];
                foreach ($request->file as $singlefile) {
                    $new_file = new FileManager();
                    $uploaded = $new_file->upload('ticket-documents', $singlefile);
                    array_push($fileId, $uploaded->id);
                }
                $dataObj->file_id = json_encode($fileId);
            }

            /*End*/
            $dataObj->save();

            //dynamic field data save
            $dynamicFieldList = DynamicField::where('tenant_id', getTenantId())->orderBy('order', 'ASC')->get();
            if (count($dynamicFieldList) > 0) {
                foreach ($dynamicFieldList as $field) {
                    $dynamicFieldObj = new DynamicFieldData();
                    $dynamicFieldObj->ticket_id = $dataObj->id;
                    $dynamicFieldObj->field_id = $field->id;
                    $dynamicFieldObj->field_value = $request->{$field->name};
                    $dynamicFieldObj->tenant_id = getTenantId();
                    $dynamicFieldObj->save();
                }
            }
            //dynamic field data save
            $ctegoryCode = Category::where('id', $dataObj->category_id)->first();
            if($ctegoryCode->is_ticket_prefix){
                $getTrackingPreFixed =  $ctegoryCode->code;
            }else{
                $verity = Varity::where('created_by', getUserIdByTenant())->first();
                $getTrackingPreFixed = isset($verity->ticket_tracking_no_pre_fixed) ? $verity->ticket_tracking_no_pre_fixed : 'ST';
            }
            $trackingNo = $getTrackingPreFixed . sprintf('%06d', $dataObj->id);
            if ($dataObj->id) {
                Ticket::where('id', $dataObj->id)->update(['tracking_no' => $trackingNo]);
                $categoryData = $this->ticketCategoryService->getById($request->category);
                $categoryUser = $categoryData->users->pluck('id')->toArray();
                $dataObj->users()->syncWithPivotValues($categoryUser, ['is_active' => ACTIVE, 'tenant_id' => getTenantId(), 'assigned_by' => getUserIdByTenant()], false);
            }

            $getAlluser = User::where('tenant_id', getTenantId())
                ->where('role', '!=', USER_ROLE_CUSTOMER)
                ->get();

            $userData = [];

            foreach ($getAlluser as $key => $singleUser) {
                $userData[] = [
                    'ticket_id' => $dataObj->id,
                    'created_by' => $singleUser->id,
                    'tenant_id' => $singleUser->tenant_id,
                    'is_seen' => 0,
                ];
            }
            $userData[] = [
                'ticket_id' => $dataObj->id,
                'created_by' => $user->id,
                'tenant_id' => getTenantId(),
                'is_seen' => 1,
            ];


            TicketSeenUnseen::insert($userData);


            DB::commit();

            //add user log start
            addUserActivityLog('ticket-create', $user->id, $dataObj->id);
            //add user log end

            //send notification start
//            setCommonNotification(auth()->id(), 'New Ticket created', 'Welcome, You have a new ticket. Ticket tracking number ' . $trackingNo);
            newTicketNotify($dataObj->id);
            //send notification end

            //send email notification start
            newTicketEmailNotify($dataObj->id);
            //send email notification end
            return redirect()->route('ticket.guest-create-ticket')->with('success', __("Ticket created successfully"));
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', SOMETHING_WENT_WRONG);
        }
    }

    public function list($request, $ticket_status)
    {
        $envato = Envato::where('tenant_id', auth()->user()->tenant_id)->first();
        $ticketData = null;
        $notActiveStatus = array(STATUS_RESOLVED, STATUS_CLOSED);
        $activeStatus = array(STATUS_RESOLVED, STATUS_SUSPENDED, STATUS_CANCELED, STATUS_CLOSED, STATUS_ON_HOLD);
        $ticketData = Ticket::with('user')->with('category')
            ->where(['tickets.created_by' => auth()->id(),'tickets.tenant_id'=> auth()->user()->tenant_id])
            ->leftJoin('ticket_seen_unseens', function($join){
                $join->on('tickets.id', '=', 'ticket_seen_unseens.ticket_id');
                $join->on('ticket_seen_unseens.created_by', '=', DB::raw(auth()->id()));
            })->join('users', function($join){
                $join->on('tickets.created_by', '=', 'users.id');
            })->whereNull('users.deleted_at')
            ->orderBy('tickets.last_reply_time', 'DESC')
            ->select('users.name','users.image','users.mobile','users.email','tickets.id','tickets.envato_licence','tickets.tracking_no', 'tickets.ticket_title',
                'tickets.created_by','tickets.category_id', 'tickets.status', 'tickets.priority', 'tickets.created_at',
                'tickets.updated_at','ticket_seen_unseens.is_seen','tickets.last_reply_id');
        if ($ticket_status == STATUS_CLOSED) {
            $ticketData->where(['tickets.deleted_at' => NULL, 'tickets.status' => STATUS_CLOSED]);
        } else if ($ticket_status == STATUS_ON_HOLD) {
            $ticketData->where(['tickets.deleted_at' => NULL, 'tickets.status' => STATUS_ON_HOLD]);
        } else if ($ticket_status == STATUS_RESOLVED) {
            $ticketData->where(['tickets.deleted_at' => NULL, 'tickets.status' => STATUS_RESOLVED]);
        } else if ($ticket_status == 'active') {
            $ticketData->whereNotIn('tickets.status', $notActiveStatus);
        }

        return datatables($ticketData)
            ->addIndexColumn()
            ->addColumn('checkbox', function ($data) {
                return '<td>
                        <div class="round">
                          <input type="checkbox" class="allSelect" name="multicheck_ticket_id[]" id="checkbox' . $data->id . '" value="' . $data->id . '" />
                          <label for="checkbox' . $data->id . '"></label>
                        </div>
                      </td>';
            })
            ->editColumn('ticket_title', function ($data) use ($envato) {
                return getTicketTitleHtml($data,$envato);
            })
            ->editColumn('status', function ($data) {
                return getTicketStatusHtml($data);
            })
            ->editColumn('created_at', function ($data) {
                return '<p>' . \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d M, Y') . '</p>';
            })
            ->editColumn('updated_at', function ($data) {
                return '<p>' . \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->diffForHumans() . '</p>';
            })
            ->addColumn('action', function ($data) {
                return '<div class="d-flex justify-content-end g-10"><a class="p-0 bg-transparent w-30 h-30 bd-one bd-c-stroke rounded-circle d-flex justify-content-center align-items-center" href="' . route('customer.ticket.ticket-view', $data->id) . '">
                          <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.5 8C8.60457 8 9.5 7.10457 9.5 6C9.5 4.89543 8.60457 4 7.5 4C6.39543 4 5.5 4.89543 5.5 6C5.5 7.10457 6.39543 8 7.5 8Z" fill="#5D697A"></path><path d="M14.9698 5.83C14.3817 4.30882 13.3608 2.99331 12.0332 2.04604C10.7056 1.09878 9.12953 0.561286 7.49979 0.5C5.87005 0.561286 4.29398 1.09878 2.96639 2.04604C1.6388 2.99331 0.617868 4.30882 0.0297873 5.83C-0.00992909 5.93985 -0.00992909 6.06015 0.0297873 6.17C0.617868 7.69118 1.6388 9.00669 2.96639 9.95396C4.29398 10.9012 5.87005 11.4387 7.49979 11.5C9.12953 11.4387 10.7056 10.9012 12.0332 9.95396C13.3608 9.00669 14.3817 7.69118 14.9698 6.17C15.0095 6.06015 15.0095 5.93985 14.9698 5.83ZM7.49979 9.25C6.857 9.25 6.22864 9.05939 5.69418 8.70228C5.15972 8.34516 4.74316 7.83758 4.49718 7.24372C4.25119 6.64986 4.18683 5.99639 4.31224 5.36596C4.43764 4.73552 4.74717 4.15642 5.20169 3.7019C5.65621 3.24738 6.23531 2.93785 6.86574 2.81245C7.49618 2.68705 8.14965 2.75141 8.74351 2.99739C9.33737 3.24338 9.84495 3.65994 10.2021 4.1944C10.5592 4.72886 10.7498 5.35721 10.7498 6C10.7485 6.86155 10.4056 7.68743 9.79642 8.29664C9.18722 8.90584 8.36133 9.24868 7.49979 9.25Z" fill="#5D697A"></path></svg>
                        </a>

                        <a class="p-0 bg-transparent w-30 h-30 bd-one bd-c-stroke rounded-circle d-flex justify-content-center align-items-center cursor-pointer" onclick="deleteItem(\'' . route('customer.ticket.ticket-delete', $data->id) . '\', \'ticketsDataTable\')">
                          <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.76256 2.51256C6.09075 2.18437 6.53587 2 7 2C7.46413 2 7.90925 2.18437 8.23744 2.51256C8.4448 2.71993 8.59475 2.97397 8.67705 3.25H5.32295C5.40525 2.97397 5.5552 2.71993 5.76256 2.51256ZM3.78868 3.25C3.89405 2.57321 4.21153 1.94227 4.7019 1.4519C5.3114 0.84241 6.13805 0.5 7 0.5C7.86195 0.5 8.6886 0.84241 9.2981 1.4519C9.78847 1.94227 10.106 2.57321 10.2113 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41422 13.4142 4.75 13 4.75H12V13C12 13.3978 11.842 13.7794 11.5607 14.0607C11.2794 14.342 10.8978 14.5 10.5 14.5H3.5C3.10217 14.5 2.72064 14.342 2.43934 14.0607C2.15804 13.7794 2 13.3978 2 13V4.75H1C0.585786 4.75 0.25 4.41422 0.25 4C0.25 3.58579 0.585786 3.25 1 3.25H3.78868ZM5 6.37646C5.34518 6.37646 5.625 6.65629 5.625 7.00146V11.003C5.625 11.3481 5.34518 11.628 5 11.628C4.65482 11.628 4.375 11.3481 4.375 11.003V7.00146C4.375 6.65629 4.65482 6.37646 5 6.37646ZM9.625 7.00146C9.625 6.65629 9.34518 6.37646 9 6.37646C8.65482 6.37646 8.375 6.65629 8.375 7.00146V11.003C8.375 11.3481 8.65482 11.628 9 11.628C9.34518 11.628 9.625 11.3481 9.625 11.003V7.00146Z" fill="#5D697A"></path></svg>
                        </a></div>';
            })
            ->addColumn('ticket_id', function ($data) {
                return getTicketIdHtml($data);
            })
            ->editColumn('updated', function ($data) {
                if($data->lastConversation?->created_at){
                    $last_reply = $data->lastConversationUser?->role == USER_ROLE_CUSTOMER ? 'You': 'Agent';
                    $userHtml = '<div class="ticket-user-name">
                                     <p>'.$last_reply.'</p>
                                     '.Carbon::createFromFormat('Y-m-d H:i:s', $data->lastConversation?->created_at)->diffForHumans().'
                                </div>';
                    return $userHtml;
                }else{
                    return "no-conversion";
                }

            })
            ->addColumn('assigned_to', function ($data) {
                return getTicketAssignToHtml($data);
            })
            ->rawColumns(['action', 'status', 'ticket_title', 'created_at', 'updated_at', 'checkbox', 'ticket_id', 'updated', 'assigned_to'])
            ->make(true);
    }

    public function deleteById($id)
    {
        DB::beginTransaction();
        try {
            $ticket = Ticket::where(['id'=> $id,'created_by' => Auth::id()])->firstOrFail();
            if (!$ticket && $ticket == null) {
                return $this->error([], SOMETHING_WENT_WRONG);
            }
            $ticket->delete();
            DB::commit();
            return $this->success([], __(DELETED_SUCCESSFULLY));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error([], __(SOMETHING_WENT_WRONG));
        }
    }

    public function multiDeleteById($request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->multicheck_ticket_id as $key => $item) {
                Ticket::where(['id'=> $item,'created_by' => Auth::id()])->delete();
            }
            DB::commit();
            return redirect()->back()->with('success', DELETED_SUCCESSFULLY);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', SOMETHING_WENT_WRONG);
        }
    }

    public function detailsById($id)
    {
        return Ticket::find($id);
    }


}
