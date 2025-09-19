<div class="">
    <div class="bd-b-one bd-c-stroke pb-20 mb-20 d-flex align-items-center flex-wrap justify-content-between g-10">
        <h4 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Social Login (Google) Configuration') }}</h4>
        <button type="button" class="bd-one bd-c-border-color rounded-circle w-25 h-25 bg-transparent text-border-color" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-times"></i>
        </button>
    </div>
    <form class="ajax" action="{{route('admin.setting.settings_env.update')}}" method="POST"
          enctype="multipart/form-data" data-handler="commonResponseForModal">
        @csrf
        <div class="form-group text-black mb-10">
            <label class="w-100 mb-10">{{ __('Google Client ID') }}</label>
            <input type="text" name="google_client_id" id="google_client_id" value="{{getOption('google_client_id')}}" class="form-control">
        </div>
        <div class="form-group text-black mb-10">
            <label class="w-100 mb-10">{{ __('Google Client Secret') }} </label>
            <input type="text" name="google_client_secret" id="google_client_secret" value="{{getOption('google_client_secret')}}" class="form-control">
        </div>
        <div class="form-group text-black mb-10">
            <p>{{ __('Set callback URL') }} : <strong>{{ url('/auth/google/callback') }}</strong></p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="input__group general-settings-btn">
                    <button type="submit" class="btn btn-blue float-right">{{__('Save')}}</button>
                </div>
            </div>
        </div>
    </form>
</div>
