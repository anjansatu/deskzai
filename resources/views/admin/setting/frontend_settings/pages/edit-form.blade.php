<div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
    <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
    <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<form class="ajax reset" action="{{ route('admin.setting.frontend.pages.update', $page->id) }}" method="post"
      data-handler="commonResponseForModal">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$page->id}}">
        <div class="row">
            <div class="col-12">
                <div class="input__group mb-25">
                    <label for="type">{{ __('Type') }} <span class="text-danger">*</span></label>
                    <input type="text" name="type" class="zForm-control" disabled value="{{getPageType($page->type)}}">
                </div>
            </div>

            <div class="col-12">
                <div class="input__group mb-25">
                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="zForm-control" placeholder="{{ __('Title') }}" value="{{$page->title}}">
                </div>
            </div>

            <div class="col-12">
                <div class="col-md-12 mb-25">
                    <label>{{__('Description')}} <span class="text-danger">*</span></label>
                    <textarea name="description" class="summernoteOne"
                              placeholder="{{ __("Description") }}">{!! $page->description !!}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </div>
</form>

<script src="{{ asset('admin/js/custom/summernote-init.js') }}"></script>
