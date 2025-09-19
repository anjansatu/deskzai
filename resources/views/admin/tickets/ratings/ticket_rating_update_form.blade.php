<div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
    <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
    <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<form class="ajax reset" action="{{ route('admin.tickets.ticketRatingUpdate') }}" method="post"
      data-handler="commonResponseForModal">
    @csrf
    <div class="modal-body">
        <div class="row">

            <div class="col-12">
                <div class="input__group mb-25">
                    <label class="form-label">{{ __('Status') }}</label>
                    <div class="input-group">
                        <input type="hidden" name="ticket_rating_id" value="{{$ticket_rating->id}}">
                        <select name="status" class="form-control">
                            <option value="1" {{$ticket_rating->status == 1?'selected':''}}>{{ __('Active') }}</option>
                            <option value="0" {{$ticket_rating->status == 0?'selected':''}}>{{ __('Deactive') }}</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </div>
</form>
