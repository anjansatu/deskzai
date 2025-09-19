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
                </div>
            </li>
        @endif
        {{--    <div class="ticket-info">--}}
        {{--        <div>--}}
        {{--            <h5>{{__('Domain')}}:</h5>--}}
        {{--            <p><a href="{{$ticketData->domain??""}}" target="_blank">{{$ticketData->domain??""}}</a></p>--}}
        {{--        </div>--}}
        {{--    </div>--}}
        <li>
            <div class="d-flex justify-content-between align-items-start g-10">
                <div>
                    <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Category')}}:</h5>
                    <p class="fs-12 fw-500 lh-15 text-para-text">{{$ticketData->category->name??""}}</p>
                </div>
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
            </div>
        </li>
    </ul>
</div>
