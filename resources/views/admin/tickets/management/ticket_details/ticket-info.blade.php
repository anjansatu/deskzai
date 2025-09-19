<div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
    <div class="d-flex justify-content-between align-items-center flex-wrap g-20 bd-b-one bd-c-stroke pb-17 mb-17">
        <h4 class="fs-18 fw-600 lh-22 text-title-black">{{__('Ticket Info')}}</h4>
        <button class="zBadge zBadge-deactivate">{{getTicketStatus($ticketData->status)}}</button>
    </div>
    <ul class="zList-pb-16">
        @if(count($ticketDynamicFieldData)>0)
            @foreach($ticketDynamicFieldData as $field)
                <li>
                    <div class="d-flex justify-content-between align-items-start g-10">
                        <div>
                            <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{$field->level}}:</h5>
                            <p class="fs-12 fw-500 lh-15 text-para-text">{{$field->field_value??""}}</p>
                        </div>
                        <div class="cursor-pointer">
                            <span class="ticket-details-dynamic-filed-edit-action" data-id="{{$field->id}}"
                                  data-value="{{$field->field_value??""}}" data-filed_type="{{$field->type}}"
                                  data-level="{{$field->level}}" data-required="{{$field->required}}">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                                       fill="none">
                                    <rect width="25" height="25" rx="5" fill=#007aff/>
                                    <g clip-path="url(#clip0_846_1766)">
                                      <path
                                          d="M11.875 7.49996H7.5C7.16848 7.49996 6.85054 7.63166 6.61612 7.86608C6.3817 8.1005 6.25 8.41844 6.25 8.74996V17.5C6.25 17.8315 6.3817 18.1494 6.61612 18.3838C6.85054 18.6183 7.16848 18.75 7.5 18.75H16.25C16.5815 18.75 16.8995 18.6183 17.1339 18.3838C17.3683 18.1494 17.5 17.8315 17.5 17.5V13.125"
                                          stroke="white" stroke-width="1.2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                      <path
                                          d="M16.5625 6.56237C16.8111 6.31373 17.1484 6.17405 17.5 6.17405C17.8516 6.17405 18.1889 6.31373 18.4375 6.56237C18.6861 6.81102 18.8258 7.14824 18.8258 7.49987C18.8258 7.85151 18.6861 8.18873 18.4375 8.43737L12.5 14.3749L10 14.9999L10.625 12.4999L16.5625 6.56237Z"
                                          stroke="white" stroke-width="1.2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_846_1766">
                                        <rect width="15" height="15" fill="white" transform="translate(5 5)"/>
                                      </clipPath>
                                    </defs>
                                  </svg>
                            </span>
                        </div>
                    </div>
                </li>
            @endforeach
        @endif
        @if($envato?->enable_purchase_code == 1)
            <li>
                <div class="d-flex justify-content-between align-items-start g-10">
                    <div>
                        <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Licence')}}:</h5>
                        <p class="fs-12 fw-500 lh-15 text-para-text">{{$ticketData->envato_licence??""}}</p>
                    </div>
                    <div class="cursor-pointer">
                        <span class="license-edit-action" data-id="{{$ticketData->id}}"
                              data-value="{{$ticketData->envato_licence??""}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25"
                                 fill="none">
                                    <rect width="25" height="25" rx="5" fill=#007aff/>
                                    <g clip-path="url(#clip0_846_1766)">
                                      <path
                                          d="M11.875 7.49996H7.5C7.16848 7.49996 6.85054 7.63166 6.61612 7.86608C6.3817 8.1005 6.25 8.41844 6.25 8.74996V17.5C6.25 17.8315 6.3817 18.1494 6.61612 18.3838C6.85054 18.6183 7.16848 18.75 7.5 18.75H16.25C16.5815 18.75 16.8995 18.6183 17.1339 18.3838C17.3683 18.1494 17.5 17.8315 17.5 17.5V13.125"
                                          stroke="white" stroke-width="1.2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                      <path
                                          d="M16.5625 6.56237C16.8111 6.31373 17.1484 6.17405 17.5 6.17405C17.8516 6.17405 18.1889 6.31373 18.4375 6.56237C18.6861 6.81102 18.8258 7.14824 18.8258 7.49987C18.8258 7.85151 18.6861 8.18873 18.4375 8.43737L12.5 14.3749L10 14.9999L10.625 12.4999L16.5625 6.56237Z"
                                          stroke="white" stroke-width="1.2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_846_1766">
                                        <rect width="15" height="15" fill="white" transform="translate(5 5)"/>
                                      </clipPath>
                                    </defs>
                                  </svg>
                        </span>
                    </div>
                </div>
            </li>
        @endif

        <li>
            <div class="d-flex justify-content-between align-items-start g-10">
                <div>
                    <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Category')}}:</h5>
                    <p class="fs-12 fw-500 lh-15 text-para-text">{{$ticketData->category->name??""}}</p>
                </div>
                <button type="button"
                        class="p-8 d-flex align-items-center g-12 bg-main-color bd-one bd-c-main-color bd-ra-8"
                        data-bs-toggle="modal" data-bs-target="#categorymodel">
                    <img src="{{asset('main_assets/images/icon/edit.svg')}}" alt="">
                </button>
            </div>
        </li>
        <li>
            <div class="d-flex justify-content-between align-items-start g-10">
                <div>
                    <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Created')}}:</h5>
                    <p class="fs-12 fw-500 lh-15 text-para-text">{{$ticketData->category->name ?\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ticketData->created_at)->format('d M, Y H:i:s'):""}}</p>
                </div>
            </div>
        </li>
        <li>
            <div class="d-flex justify-content-between align-items-start g-10">
                <div>
                    <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Last Message')}}:</h5>
                    <p class="fs-12 fw-500 lh-15 text-para-text">{{\Carbon\Carbon::parse($ticketData->last_reply_time)->diffForHumans()}}</p>
                </div>
            </div>
        </li>
        <li>
            <div class="d-flex justify-content-between align-items-start g-10">
                <div>
                    <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Priority')}}:</h5>
                    <p class="fs-12 fw-500 lh-15 text-para-text {{$ticketData->priority?getPriorityColor($ticketData->priority):"generally-color"}}">{{$ticketData->priority?getPriorityStatus($ticketData->priority):""}}</p>
                </div>
                <button type="button"
                        class="p-8 d-flex align-items-center g-12 bg-main-color bd-one bd-c-main-color bd-ra-8"
                        data-bs-toggle="modal" data-bs-target="#prioritymodel">
                    <img src="{{asset('main_assets/images/icon/edit.svg')}}" alt="">
                </button>
            </div>
        </li>

        @if($ticketData->status_change_by)
            <li>
                <div class="d-flex justify-content-between align-items-start g-10">
                    <div>
                        <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Status Change By ')}}:</h5>
                        <p class="fs-12 fw-500 lh-15 text-para-text">{{getUserFullNameUsingID($ticketData->status_change_by).' ('.getUserEmailById($ticketData->status_change_by).')'}}</p>
                    </div>
                </div>
            </li>
        @endif
        <li>
            <h4 class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-17 mb-17 fs-18 fw-600 lh-22 text-title-black">{{__('Customer Info :')}}</h4>

            <div class="d-flex g-10 align-items-center flex-wrap">
                <div class="w-55 h-55 rounded-circle overflow-hidden">
                    <img class="w-100 h-100 object-fit-cover" src="{{ getFileUrl($ticketCreatorData->image) }}" alt="">
                </div>
                <div class="ticket-user-name">
                    <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{$ticketCreatorData->name??''}}</h5>
                    <p class="fs-12 fw-500 lh-18 text-para-text">{{$ticketCreatorData->email??''}}</p>
                    <p class="fs-12 fw-500 lh-18 text-para-text">{{$ticketCreatorData->mobile??''}}</p>
                </div>
            </div>
        </li>
    </ul>

</div>
