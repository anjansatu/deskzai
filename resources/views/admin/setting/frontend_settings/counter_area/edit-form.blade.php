<div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
    <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
    <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<form class="ajax reset" action="{{ route('admin.setting.frontend.counter_area.update', $counterArea->id) }}"
      method="post"
      data-handler="commonResponseForModal">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$counterArea->id}}">
        <div class="row">
            <div class="col-12">
                <div class="input__group mb-25">
                    <label for="title">{{ __('Number') }} <span class="text-danger">*</span></label>
                    <input type="text" name="number" placeholder="{{ __('Number') }}" value="{{$counterArea->number}}">
                </div>
            </div>
            <div class="col-12">
                <div class="input__group mb-25">
                    <label for="title">{{ __('Description') }} <span class="text-danger">*</span></label>
                    <input type="text" name="description" placeholder="{{ __('Description') }}" value="{{$counterArea->description}}">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </div>
</form>
