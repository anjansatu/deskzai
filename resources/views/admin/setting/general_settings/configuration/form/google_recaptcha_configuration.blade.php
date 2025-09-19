<div class="">
    <div class="bd-b-one bd-c-stroke pb-20 mb-20 d-flex align-items-center flex-wrap justify-content-between g-10">
        <h4 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Google Recaptcha Credentials') }}</h4>
        <button type="button" class="bd-one bd-c-border-color rounded-circle w-25 h-25 bg-transparent text-border-color" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-times"></i>
        </button>
    </div>
    <form class="ajax" action="{{route('admin.setting.settings_env.update')}}" method="post" class="form-horizontal" data-handler="commonResponseForModal">
        @csrf
        <div class="form-group text-black mb-10">
            <label class="w-100 mb-10">{{ __('Google Recaptcha Site Key') }}</label>
            <input type="text" name="google_recaptcha_site_key" id="google_recaptcha_site_key" value="{{getOption('google_recaptcha_site_key')}}" class="form-control">
        </div>
        <div class="form-group text-black mb-10">
            <label class="w-100 mb-10">{{ __('Google Recaptcha Secret Key') }} </label>
            <input type="text" name="google_recaptcha_secret_key" id="google_recaptcha_secret_key" value="{{getOption('google_recaptcha_secret_key')}}" class="form-control">
        </div>
        <div class="justify-content-end row text-end">
            <div class="col-md-12">
                <button type="submit" class="btn btn-blue float-right">{{__('Update')}}</button>
            </div>
        </div>
    </form>
</div>
