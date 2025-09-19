<div class="p-sm-25 p-15">
    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>
    <form class="ajax reset" action="{{ route('admin.setting.frontend.knowledge.update', $knowledge->id) }}" method="post"
          data-handler="commonResponseForModal">
        @csrf

        <input type="hidden" name="id" value="{{$knowledge->id}}">
        <div class="row">
            <div class="col-12">
                <label class="zForm-label" for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                <input class="zForm-control" type="text" name="title" placeholder="{{ __('Title') }}" value="{{$knowledge->title}}">
            </div>
            <div class="col-12">
                <label class="zForm-label" for="title">{{ __('Description') }} <span class="text-danger">*</span></label>
                <textarea name="description" class="summernoteOne" placeholder="{{ __("Description") }}">{!! $knowledge->description !!}</textarea>
            </div>
            <div class="col-12">
                <label class="zForm-label">{{ __('Status') }}</label>
                <select name="status" class="form-select zForm-control">
                    <option value="1" {{$knowledge->status == 1?'selected':''}}>{{ __('Active') }}</option>
                    <option value="0" {{$knowledge->status == 0?'selected':''}}>{{ __('Deactivate') }}</option>
                </select>
            </div>
        </div>

        <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Update') }}</button>

    </form>
</div>
<script src="{{ asset('admin/js/custom/summernote-init.js') }}"></script>
<script src="{{ asset('admin/js/custom/select2-init.js') }}"></script>
