<div class="p-sm-25 p-15">
    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>

    <form class="ajax reset" action="{{ route('admin.custom-pages-update', $page->id) }}" method="post"
        data-handler="commonResponseForModal">
        @csrf

        <div class="row rg-24">
                <div class="col-md-12">
                    <label class="zForm-label" for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                    <input class="zForm-control" type="text" name="title" value="{{$page->title}}" placeholder="{{ __('Title') }}">
                </div>

                <div class="col-md-12">
                    <label class="zForm-label">{{__('Details')}} <span class="text-danger">*</span></label>
                    <textarea name="details" class="summernoteOne" placeholder="{{ __("Details") }}">{{$page->desc}}</textarea>
                </div>

                <div class="col-md-12">
                    <label class="zForm-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                    <select name="status" class="form-select zForm-control">
                        <option value="1" {{$page->status == 1?'selected':''}}>{{ __('Publish') }}</option>
                        <option value="0" {{$page->status == 0?'selected':''}}>{{ __('Unpublish') }}</option>
                    </select>
                </div>
            </div>

        <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Save') }}</button>

    </form>
</div>
<script src="{{ asset('admin/js/custom/summernote-init.js') }}"></script>


