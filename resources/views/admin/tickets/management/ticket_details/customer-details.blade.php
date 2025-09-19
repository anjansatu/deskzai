<div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
    <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-17 mb-17">
        <h4 class="fs-18 fw-600 lh-22 text-title-black">{{__('Customer Details')}}</h4>
        <a target="_blank" href="{{route('admin.tickets.my-ticket-history', ['id'=>$ticketCreatorData->id])}}" class="viewHistory">{{__('Previous Tickets')}}</a>
    </div>

    <ul class="zList-pb-16">
        <li>
            <div class="d-flex g-10 align-items-center">
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
        <li>
            <div class="d-flex justify-content-between align-items-start g-10">
                <div>
                    <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('IP Address')}}</h5>
                    <p class="fs-12 fw-500 lh-15 text-para-text">{{$ticketData->activityLog->ip_address??''}}</p>
                </div>
            </div>
        </li>
        @if($ticketCreatorData->address != null)
            <li>
                <div class="d-flex justify-content-between align-items-start g-10">
                    <div>
                        <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Location')}}:</h5>
                        <p class="fs-12 fw-500 lh-15 text-para-text">{{$ticketCreatorData->address??''}}</p>
                    </div>
                </div>
            </li>
        @endif

        @if($ticketCreatorData->app_timezone != null)
            <li>
                <div class="d-flex justify-content-between align-items-start g-10">
                    <div>
                        <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{__('Timezone')}}:</h5>
                        <p class="fs-12 fw-500 lh-15 text-para-text">{{$ticketCreatorData->app_timezone??''}}</p>
                    </div>
                </div>
            </li>
        @endif
    </ul>
</div>
