@if(isset($envatoConfigData->envato_expired_on) && $envatoConfigData->envato_expired_on == STATUS_ACTIVE)
    <div class="d-flex justify-content-between align-items-center g-10 flex-wrap p-sm-25 p-15 bd-ra-10 mb-24 {{($envatoData == null) || (isset($envatoDayCount) && $envatoDayCount == 0) ?'purchase-red':'purchase-green'}} ">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{isset($envatoData->item->name)?$envatoData->item->name:''}}</h5>
        <button class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white d-inline-flex align-items-center g-10" data-bs-toggle="modal" data-bs-target="#purchaseModal" data-bs-whatever="@mdo">{{__("View Details")}}</button>
    </div>
@endif

<div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-24">
    <div class="view-assign">

        <div class="d-flex justify-content-between align-items-start align-items-sm-center g-20 bd-b-one bd-c-stroke pb-17 mb-17">
            <div class="d-flex align-items-center flex-wrap flex-sm-nowrap g-20 ticket-assignTag-dropdown">
                <!-- Assignments -->
                <div class="dropdown">
                    <button class="dropdown-toggle assignmentsagent bg-transparent py-8 px-12 bd-one bd-c-stroke bd-ra-8 fs-15 fw-500 lh-25 text-para-text d-inline-flex align-items-center g-10" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('Assignments')}}
                        <span class="d-flex"><img src="{{asset('main_assets/images/icon/arrow-fill-down.svg')}}" alt=""></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end dropdownItem-three" aria-labelledby="dropdownMenuLink">
                        <h3 class="fs-14 fw-500 lh-17 text-title-black pb-10">{{__('Add Anyone')}}</h3>
                        <div class="search-one mb-10">
                            <input type="text" placeholder="{{ __('Search Admin') }}" id="adminAssignmentSearch">
                            <button class="icon"><img src="{{asset('main_assets/images/icon/search.svg')}}" alt=""></button>
                        </div>
                        <input type="hidden" id="ticketAssignRoute" value="{{ route('agent.ticket.assignTicketUser') }}">

                        <ul class="m-0 p-0">
                            @foreach ($userList as $user)
                                <li class="d-flex align-items-center g-9">
                                    <div class="selectBoxTage">
                                        <div class="round ">
                                            <input type="checkbox" name="ticket_assignee[]"
                                                   id="ticket_assignee_{{$user->id}}"
                                                   onclick="addUserToTicket({{$ticketData->id}},{{ $user->id }})"
                                                   @if(in_array($user->id,$ticketUserData)) checked @endif />
                                            <label for="ticket_assignee_{{$user->id}}" class="top-0"></label>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center g-8">
                                        <div class="flex-shrink-0 w-25 h-25 rounded-circle overflow-hidden">
                                            <img src="{{ getFileUrl($user->image) }}" alt="" class="w-100 h-100 object-fit-cover">
                                        </div>
                                        <p class="fs-12 fw-500 lh-15 text-para-text text-nowrap">{{ $user->name.'('.getRoleName(USER_ROLE_AGENT).')' }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <!-- Tag Dropdown -->
                <div class="dropdown">
                    <button class="dropdown-toggle taggingagent bg-transparent py-8 px-12 bd-one bd-c-stroke bd-ra-8 fs-15 fw-500 lh-25 text-para-text d-inline-flex align-items-center g-10" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('Tagging')}}
                        <span class="d-flex"><img src="{{asset('main_assets/images/icon/arrow-fill-down.svg')}}" alt=""></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end dropdownItem-three" aria-labelledby="dropdownMenuLink1">
                        <h3 class="fs-14 fw-500 lh-17 text-title-black pb-10">{{__('Add Tags')}}</h3>
                        <div class="search-one mb-10">
                            <input type="text" placeholder="{{ __('Search Tags') }}" id="adminTagSearch">
                            <button class="icon"><img src="{{asset('main_assets/images/icon/search.svg')}}" alt=""></button>
                        </div>

                        <input type="hidden" id="addTagRoute" value="{{ route('agent.ticket.addTicketTags') }}">
                        <ul class="m-0 p-0">
                            @foreach($allTagsData as $tag)
                                <li class="d-flex align-items-center g-9">
                                    <div class="selectBoxTage">
                                        <div class="round">
                                            <input type="checkbox" name="ticket_tag[]"
                                                   id="ticket_tag_{{$tag->id}}"
                                                   onclick="addTagToTicket({{$ticketData->id}},{{ $tag->id }})"
                                                   @if(in_array($tag->id,$existingTagsData['ids'])) checked @endif />
                                            <label for="ticket_tag_{{$tag->id}}" class="top-0"></label>
                                        </div>
                                    </div>
                                    <p class="fs-12 fw-500 lh-15 text-para-text text-nowrap">{{$tag->name}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <span id="noneClick" class=""></span>
                <!-- User Images -->
                <div class="ticketUserImages">
                    @foreach ($userList as $user)
                        @if(in_array($user->id,$ticketUserData))
                            @if( $user->image == null)
                                <div class="ticket-assign-name border flex-shrink-0">
                                    <h5>{{ucfirst(substr($user->name,0,2))}}</h5>
                                </div>
                            @else
                                <img title="{{$user->name.'('.$user->email.')'}}" class="" src={{ getFileUrl($user->image) }} alt="img">
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="dropdown">
                <button class="dropdown-toggle w-30 h-30 bd-one bd-c-stroke rounded-circle d-flex justify-content-center align-items-center fs-13 text-para-text" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdownItem-two">
                    <li>
                        <a href="#" onclick="deleteTicket('{{route('agent.ticket.ticket-delete',$ticketData->id)}}')" class="d-flex align-items-center cg-8 fs-14 fw-500 lh-17 text-para-text">
                            <span class="d-flex"><i class="fa-solid fa-trash"></i></span>
                            <p>{{__('Delete')}}</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="ticket-details">
            <h3 class="fs-18 fw-600 lh-22 text-title-black pb-8">#{{$ticketData->tracking_no??""}}-{{$ticketData->ticket_title??""}}</h3>
            <div class="fs-14 fw-400 lh-24 text-para-text pb-8">
                <p>{!! nl2br($ticketData->ticket_description)??"" !!}</p>
            </div>
        </div>

        @php
            $counter = 1;
        @endphp
        <div class="tag-key-word d-flex flex-wrap cg-10">
            @isset($existingTagsData['names'])
                @foreach($existingTagsData['names'] as $index => $tagNames)
                    @php
                        $classes = [
                            'zBadge-active',
                            'zBadge-pending',
                            'zBadge-open',
                        ];
                        $classToAdd = $classes[$index % count($classes)];
                    @endphp
                    <p class="zBadge {{ $classToAdd }} mb-10">{{ $tagNames }}</p>
                @endforeach
            @endisset
        </div>

        <div class="">
            @if($ticketData->file_id)
                <div class="d-flex g-10 flex-wrap">
                    @foreach(json_decode($ticketData->file_id) as $key=>$fileData)
                        @if(in_array(getFileType($fileData), ['image/jpeg','image/jpg','image/png','image/webp']))
                            <a class="test-popup-link w-40 h-40 bd-one bd-c-stroke bd-ra-4" href="{{ getFileUrl($fileData) }}">
                                <img src="{{ getFileUrl($fileData) }}" alt="" class="w-100 h-100 object-fit-cover">
                            </a>
                        @else
                            <a href="{{ getFileUrl($fileData) }}" target="_blank">
                                <button class="bd-one bd-c-stroke bd-ra-4 bg-transparent p-8">{{getFileName($fileData)}}</button>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

<!--  Add purchaseModalLabel model start -->
<div class="modal fade" id="purchaseModal" tabindex="-2" aria-labelledby="purchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bd-c-stroke bd-one bd-ra-10">
            <div class="p-sm-25 p-15">
                <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                    <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Purchase Details') }}</h5>
                    <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                </div>
                <div class="client-details-bg alert alert-danger">
                    @if($envatoData == null)
                        <p class="alert alert-danger fs-14 fw-400 lh-24 text-para-text">{{__('Purchase code not valid!')}}</p>
                    @else
                        <h4 class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-17 mb-17 fs-16 fw-600 lh-22 text-title-black">{{__('Client Details:')}}</h4>
                        <ul class="zList-pb-16">
                            <li>
                                <h4 class="fs-14 fw-500 lh-17 text-title-black">{{__("Item Icon")}}: </h4>
                                <img
                                    src="{{isset($envatoData->item->previews->icon_preview->icon_url)?$envatoData->item->previews->icon_preview->icon_url:''}}"
                                    alt="" class="max-w-120">
                            </li>
                            <li>
                                <h4 class="fs-14 fw-500 lh-17 text-title-black">{{__("Item Name")}}: </h4>
                                <p class="fs-12 fw-400 lh-17 text-para-text">{{isset($envatoData->item->name)?$envatoData->item->name:''}}</p>
                            </li>
                            <li>
                                <h4 class="fs-14 fw-500 lh-17 text-title-black">{{__("Client")}}: </h4>
                                <p class="fs-12 fw-400 lh-17 text-para-text">{{isset($envatoData->buyer)?$envatoData->buyer:''}}</p>
                            </li>
                            <li>
                                <h4 class="fs-14 fw-500 lh-17 text-title-black">{{__("Sold At")}}: </h4>
                                <p class="fs-12 fw-400 lh-17 text-para-text">{{isset($envatoData->sold_at)?date('d-m-Y',strtotime($envatoData->sold_at)):''}}
                                    <span> {{isset($envatoData->sold_at)?date('H:i:s',strtotime($envatoData->sold_at)):''}}</span>
                                </p>
                            </li>
                            <li>
                                <h4 class="fs-14 fw-500 lh-17 text-title-black">{{__("Support Until")}}: </h4>
                                <p class="fs-12 fw-400 lh-17 text-para-text">
                                    {{isset($envatoData->supported_until)?date('d-m-Y',strtotime($envatoData->supported_until)):''}}
                                    <span>{{isset($envatoData->supported_until)?date('H:i:s',strtotime($envatoData->supported_until)):''}}</span>
                                    @if(isset($envatoDayCount) && $envatoDayCount != 0)
                                        <span class="small-btn success-btn ms-3">{{__("Supported")}}</span>
                                    @else
                                        <span class="small-btn danger-btn ms-3">{{__("License Expiry")}}</span>
                                    @endif
                                </p>
                            </li>
                            <li>
                                <h4 class="fs-14 fw-500 lh-17 text-title-black">{{__("License")}}: </h4>
                                <p class="fs-12 fw-400 lh-17 text-para-text">{{isset($envatoData->license)?$envatoData->license:''}}</p>
                            </li>
                            <li>
                                <h4 class="fs-14 fw-500 lh-17 text-title-black">{{__("Count")}}: </h4>
                                <p class="fs-12 fw-400 lh-17 text-para-text">{{isset($envatoData->purchase_count)?$envatoData->purchase_count:0}}</p>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Add purchaseModalLabel model end -->
