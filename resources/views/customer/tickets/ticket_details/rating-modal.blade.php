<form
    action="@if(!empty($ticketData->rating->id)){{route('customer.ticket.ticketRatingStore',['ratingId'=>$ticketData->rating->id])}} @else {{route('customer.ticket.ticketRatingStore')}} @endif"
    method="post" class="form-horizontal" enctype="multipart/form-data" data-handler="commonResponseForModal">
    @csrf
    <div class="modal fade bd-example-modal-lg" id="ticketReview" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                <div class="p-sm-25 p-15">
                    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Rate This Ticket Agent') }}</h5>
                        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                    </div>
                    <form action="">
                        <div class="ticketReview-modal-box">
                            <p class="ticketReview-massage mb-20">
                                {{__('To help the ticket agent, please leave a comment for your rating')}}
                            </p>
                            <div class="mb-20 d-flex flex-column g-10 align-items-start">
                                <h5 class="zForm-label">{{__('Your rating')}}</h5>
                                <div class="rate">
                                    <input
                                        @if( !empty($ticketData->rating->rating) && $ticketData->rating->rating==5) checked
                                        @endif type="radio" id="star5" name="rate" value="5"/>
                                    <label for="star5" title="text">{{__("5 stars")}}</label>
                                    <input
                                        @if( !empty($ticketData->rating->rating) && $ticketData->rating->rating==4) checked
                                        @endif type="radio" id="star4" name="rate" value="4"/>
                                    <label for="star4" title="text">{{__("4 stars")}}</label>
                                    <input
                                        @if( !empty($ticketData->rating->rating) && $ticketData->rating->rating==3) checked
                                        @endif type="radio" id="star3" name="rate" value="3"/>
                                    <label for="star3" title="text">{{__("3 stars")}}</label>
                                    <input
                                        @if( !empty($ticketData->rating->rating) && $ticketData->rating->rating==2) checked
                                        @endif type="radio" id="star2" name="rate" value="2"/>
                                    <label for="star2" title="text">{{__("2 stars")}}</label>
                                    <input
                                        @if( !empty($ticketData->rating->rating) && $ticketData->rating->rating==1) checked
                                        @endif type="radio" id="star1" name="rate" value="1"/>
                                    <label for="star1" title="text">{{__("1 stars")}}</label>
                                </div>
                            </div>
                            <input type="hidden" name="target_ticket" id="target_ticket" value="{{$ticketData->id}}">
                            <input type="hidden" name="rating_category" id="rating_category" value="1">
                            <div class="">
                                <label for="comment" class="zForm-label">{{__('Comments')}} <span class="fs-12 fw-400 lh-24 text-para-text">({{__('min')}}. 30 {{__('characters')}})</span></label>
                                <textarea name="rating_comment" id="comment" class="zForm-control" placeholder="{{__('Please describe the reason for your rating to help the ticket agent')}} ">{{$ticketData->rating->comment??""}}</textarea>
                            </div>

                        </div>
                        <div class="d-flex g-20 pt-20">
                            <button type="submit" data-bs-dismiss="modal" class="ticket-btu-com m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12">{{ __('Submit') }}</button>
                            <button type="button" class="ticket-btu-com py-10 px-26 bg-white bd-one bd-c-para-text bd-ra-8 fs-15 fw-600 lh-25 text-para-text" data-bs-dismiss="modal" aria-label="Close">{{__("Close")}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
<!--ticketReview modal area end -->
