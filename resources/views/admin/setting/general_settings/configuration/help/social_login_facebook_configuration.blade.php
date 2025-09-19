<div class="email-inbox__area bg-style">
    <h4 class="fs-24 fw-500 lh-34 text-black pb-16 bd-b-one bd-c-stroke pb-20 mb-20">{{ __('Social Login (Google) Configuration') }}</h4>

    <form class="ajax" action="{{route('admin.setting.settings_env.update')}}" method="POST"
          enctype="multipart/form-data" data-handler="settingCommonHandler">
        @csrf
        <div class="row rg-24">
            <div class="col-12">
                <label class="col-lg-3">{{ __('Facebook Client ID') }}</label>
                <input type="text" name="facebook_client_id" id="facebook_client_id" value="{{getOption('facebook_client_id')}}" class="zForm-control">
            </div>
            <div class="col-12">
                <label class="col-lg-3">{{ __('Facebook Client Secret') }} </label>
                <input type="text" name="facebook_client_secret" id="facebook_client_secret" value="{{getOption('facebook_client_secret')}}" class="zForm-control">
            </div>
            <div class="col-12">
                <p class="fs-16 fw-400 lh-24 text-para-text">{{ __('Set callback URL') }} : <strong>{{ url('/auth/facebook/callback') }}</strong></p>
            </div>
        </div>
        <button type="submit" class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white mt-25">{{__('Save')}}</button>
    </form>
</div>
