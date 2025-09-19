@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div
            class="d-flex flex-column-reverse flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
            <h4 class="fs-24 fw-500 lh-34 text-title-black">{{ __($pageTitle) }}</h4>
            <div class="d-flex g-12">
                <a href="{{route('admin.user.list')}}"
                   class="py-10 px-26 bg-white bd-one bd-c-para-text bd-ra-8 fs-15 fw-600 lh-25 text-para-text">{{ __('Back') }}</a>
                @isset($user->id)
                    <a href="{{route('admin.user.edit',$user->id)}}"
                       class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white">{{ __('Edit') }}</a>
                @endisset
            </div>
        </div>
        <div class="row rg-24">
            <input type="hidden" id="user-route" value="{{ route('admin.user.list') }}">
            <!-- Left -->
            <div class="col-xl-4 col-md-5">
                <div class="bd-one bd-c-stroke bd-ra-8 bg-white p-sm-25 p-15">
                    <div class="w-105 h-105 rounded-circle overflow-hidden">
                        <img src="{{ getFileUrl(isset($user->image)?$user->image:'') }}"
                             alt="{{__('Profile Picture')}}">
                    </div>
                    <div class="bd-t-one bd-c-stroke pt-22 mt-30">
                        <ul class="zList-pb-16">
                            <li class="row flex-wrap">
                                <div class="col-6"><h4 class="fs-12 fw-500 lh-19 text-title-black"></h4></div>
                                <div class="col-6"><p class="fs-12 fw-500 lh-19 text-para-text"></p></div>
                            </li>
                            <li class="row flex-wrap">
                                <div class="col-6"><h4 class="fs-12 fw-500 lh-19 text-title-black">{{ __("Name") }}</h4>
                                </div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text"></p>{{ __(isset($user->name)?$user->name:'') }}
                                </div>
                            </li>
                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Email") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->email)?$user->email:'') }}</p>
                                </div>
                            </li>
                            <li class="row flex-wrap">
                                <div class="col-6"><h4 class="fs-12 fw-500 lh-19 text-title-black">{{ __("Type") }}</h4>
                                </div>
                                @if(isset($user->role) && $user->role == USER_ROLE_ADMIN)
                                    <div class="col-6"><p
                                            class="fs-12 fw-500 lh-19 text-para-text">{{ __("Admin") }}</p></div>
                                @elseif(isset($user->role) && $user->role == USER_ROLE_AGENT)
                                    <div class="col-6"><p
                                            class="fs-12 fw-500 lh-19 text-para-text">{{ __("Agent") }}</p></div>
                                @elseif(isset($user->role) && $user->role == USER_ROLE_CUSTOMER)
                                    <div class="col-6"><p
                                            class="fs-12 fw-500 lh-19 text-para-text">{{ __("Customer") }}</p></div>
                                @endif

                            </li>
                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Mobile") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->mobile)?$user->mobile:'') }}</p>
                                </div>
                            </li>

                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Gender") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->gender)?ucfirst($user->gender):'') }}</p>
                                </div>
                            </li>

                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Date of Birth") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->dob)?$user->dob:'') }}</p>
                                </div>
                            </li>

                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Address") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->address)?$user->address:'') }}</p>
                                </div>
                            </li>

                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Email Verify") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->email_verification_status) && $user->email_verification_status == 1 ?'Yes':'NO') }}</p>
                                </div>
                            </li>
                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Mobile Verify") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->phone_verification_status) && $user->phone_verification_status == 1 ?'Yes':'NO') }}</p>
                                </div>
                            </li>

                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Join Date") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->created_at)?date('d-m-Y H:i:s', strtotime($user->created_at)):'') }}</p>
                                </div>
                            </li>

                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Last Update") }}</h4></div>
                                <div class="col-6"><p
                                        class="fs-12 fw-500 lh-19 text-para-text">{{ __(isset($user->updated_at)?date('d-m-Y H:i:s', strtotime($user->updated_at)):'') }}</p>
                                </div>
                            </li>

                            <li class="row flex-wrap">
                                <div class="col-6"><h4
                                        class="fs-12 fw-500 lh-19 text-title-black">{{ __("Status") }}</h4></div>
                                @if($user->status == USER_STATUS_ACTIVE)
                                    <div class="col-6"><p
                                            class="fs-12 fw-500 lh-19 text-para-text">{{ __("Active") }}</p></div>
                                @elseif($user->status == STATUS_SUSPENDED)
                                    <div class="col-6"><p
                                            class="fs-12 fw-500 lh-19 text-para-text">{{ __("Suspended") }}</p></div>
                                @else
                                    <div class="col-6"><p
                                            class="fs-12 fw-500 lh-19 text-para-text">{{ __("Inactive") }}</p></div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Right -->
            <div class="col-xl-8 col-md-7">
                <div class="bd-one bd-c-stroke bd-ra-8 bg-white p-sm-25 p-15">
                    @if(isAddonInstalled('DESKSAAS') > 0)
                        @if(auth()->user()->role == USER_ROLE_SUPER_ADMIN)
                            <!--start-->
                            <h4 class="fs-18 fw-600 lh-20 text-title-black pb-12">{{__("Domain Information")}}</h4>

                            <table class="table zTable zTable-last-item-right" id="">
                                <thead>
                                <tr>
                                    <th>
                                        <div>{{__('Current Domain')}}</div>
                                    </th>
                                    <th>
                                        <div>{{__('Requested Domain')}}</div>
                                    </th>
                                    {{-- <th><div>{{__('Action')}}</div></th> --}}
                                </tr>
                                <tr>
                                    <td>{{isset($domainInfo->domain)?$domainInfo->domain:'N/A'}}</td>
                                    {{-- <td>N\A</td> --}}
                                    <td>{{isset($domainInfo->user_domain)?$domainInfo->user_domain:'N/A'}}</td>
                                </tr>
                                </thead>
                            </table>
                            <!--end-->
                        @endif
                    @endif
                    <!--start-->
                    <h4 class="fs-18 fw-600 lh-20 text-title-black pb-12">{{__('Activity Log')}}</h4>

                    <input type="hidden" id="user-activity-route" value="{{ route('admin.user.activity',$user->id )}}">
                    <table class="table zTable zTable-last-item-right" id="activityDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div>{{__('Action')}}</div>
                            </th>
                            <th>
                                <div>{{__('Source')}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__('IP Address')}}</div>
                            </th>
                            <th>
                                <div>{{__('Location')}}</div>
                            </th>
                            <th>
                                <div>{{__('When')}}</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                    <!--end-->
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->

@endsection

@push('script')

    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/user.js')}}"></script>
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>

@endpush
