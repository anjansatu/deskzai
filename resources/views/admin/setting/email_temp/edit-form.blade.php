<div class="p-sm-25 p-15">
    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>

    <form class="ajax reset" action="{{ route('admin.setting.email-temp-update', $template->id) }}" method="post"
        data-handler="commonResponseForModal">
        @csrf

            <div class="row rg-24">
                <div class="col-md-12">
                    <p class="alert-success p-20">{{__("Email Template Fields")}} : @foreach(emailTempFields() as $key=>$item) {{$key}} @endforeach</p>
                </div>

                <div class="col-md-12">

                        <label class="zForm-label" for="subject">{{ __('Subject') }} <span class="text-danger">*</span></label>
                        <input class="zForm-control" type="text" name="subject" value="{{ $template->subject }}" placeholder="{{ __('Subject') }}">

                </div>
                <div class="col-md-12">
                    <label class="zForm-label">{{__('Body')}} <span class="text-danger">*</span></label>
                    <textarea name="body" class="zForm-control" placeholder="{{ __("Body") }}">{!! $template->body !!}</textarea>
                </div>
            </div>

            <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Save') }}</button>

    </form>
</div>
<script src="{{ asset('admin/js/custom/summernote-init.js') }}"></script>
<script src="{{ asset('admin/js/custom/select2-init.js') }}"></script>

