<div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-24">
    <div class="view-post-reply">
        <div class="quickVieew d-none">
            <input type="hidden" id="ticketStatusChangeRoute"
                   value="{{ route('customer.ticket.ticketStatusUpdate',$ticketData) }}">

            <input type="hidden" id="ticketData" value="{{$ticketData}}">
            <input type="hidden" id="ticketDataId" value="{{encrypt($ticketData->id)}}">
        </div>

        <form action="{{route('customer.conversations.conversationStore',encrypt($ticketData->id))}}" method="post"
              class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="summernote-reply sf-ticket-details-reply">
                <div class="d-flex justify-content-between align-items-start flex-wrap g-20 pb-20">
                    <div class="d-flex gap-2 ticket-status-change">
                        <div class="d-flex align-items-center g-10 flex-wrap">
                            <div class="checkrowed zForm-wrap-checkbox-2">
                                <input class="ticket_status_input" data-status={{STATUS_CLOSED}} type="radio"
                                       @if($ticketData->status==STATUS_CLOSED) checked="checked" @endif id="closed"
                                       name="ticket_status">
                                <label class="closedColor" for="closed">{{ __('Closed') }}</label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center g-10 flex-wrap">
                            <div class="checkrowed zForm-wrap-checkbox-2">
                                <input class="ticket_status_input" data-status={{STATUS_RESOLVED}} type="radio"
                                       @if($ticketData->status==STATUS_RESOLVED) checked="checked" @endif id="solved"
                                       name="ticket_status">
                                <label class="solvedColor me-0" for="solved">{{__("Solved")}}</label>
                            </div>
                        </div>
                    </div>

                    @if(getOption('agent_rating_status') == 1)
                        <div class="rate-section">
                            <div class="rating-view-container d-flex" onclick="view_rating_modal()">
                                @php
                                    if( getRatingByTicketId($ticketData->id) > 0 ){
                                    $rating = getRatingByTicketId($ticketData->id);
                                    }
                                @endphp
                                @if(!empty($rating))
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if($i<=$rating)
                                            <div class="rating-view-select">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        @else
                                            <div class="rating-view-init">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        @endif
                                    @endfor
                                @else
                                    @if($ticketData->status==STATUS_CLOSED)
                                        @for ($i = 1; $i <= 5; $i++)
                                            <div class="rating-view-init">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        @endfor
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <div class="pb-20">
                    <textarea class="zForm-control" name="conversation_details"
                              id="conversation_details"></textarea>
                </div>

{{--                <div class="view-assign-tab " id="noteBox">--}}
{{--                    <div class="user-search">--}}
{{--                        <input type="text" placeholder="{{ __('Search Conversation') }}">--}}
{{--                        <span><i class="fa-solid fa-magnifying-glass"></i></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="ticket-upload-box">
                <div class="ticket-upload-btn-box">
                    <p class="fs-15 fw-600 lh-24 text-para-text pb-12">{{__("Upload file")}} {{__("(JPG, JPEG, PNG, ZIP, MP4, GIF, DOC)")}}</p>
                    <div class="d-flex justify-content-between align-items-center flex-wrap g-20">
                        <div class="choose-file-border file-upload-one">
                            <label class="upload__btn m-0" for="ticket-upload-img">
                                <p class="fs-12 fw-500 lh-16 text-para-text">{{__('Choose files to upload')}}</p>
                                <p class="fs-12 fw-500 lh-16 text-white browse-file">{{__("Browse File")}}</p>
                            </label>
                            <input type="file" multiple="" data-max_length="20" id="ticket-upload-img"
                                   name="file[]" class="ticket-img-input d-none">
                        </div>
                        <button type="submit" @if($ticketData->status==STATUS_CLOSED) disabled
                                @endif class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 conversation-reply">{{__('Reply Now')}}</button>
                    </div>
                </div>
                <div class="ticket-upload-img-wrap"></div>
            </div>

        </form>
    </div>
</div>
@push('script')

@endpush
