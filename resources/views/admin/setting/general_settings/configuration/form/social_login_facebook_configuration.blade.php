<div class="">
    <div class="bd-b-one bd-c-stroke pb-20 mb-20 d-flex align-items-center flex-wrap justify-content-between g-10">
        <h2 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Social Login (Google) Configuration') }}</h2>
        <button type="button" class="bd-one bd-c-border-color rounded-circle w-25 h-25 bg-transparent text-border-color" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-times"></i>
        </button>
    </div>
    <form class="ajax" action="{{route('admin.setting.settings_env.update')}}" method="POST"
          enctype="multipart/form-data" data-handler="commonResponseForModal">
        @csrf
        <div class="row rg-24">
            <div class="col-12">
                <label class="zForm-label">{{ __('Facebook Client ID') }}</label>
                <input type="text" name="facebook_client_id" id="facebook_client_id" value="{{getOption('facebook_client_id')}}" class="zForm-control">
            </div>
            <div class="col-12">
                <label class="zForm-label">{{ __('Facebook Client Secret') }} </label>
                <input type="text" name="facebook_client_secret" id="facebook_client_secret" value="{{getOption('facebook_client_secret')}}" class="zForm-control">
            </div>
            <div class="col-12">
                <p class="fs-16 fw-400 lh-24 text-para-text">{{ __('Set callback URL') }} : <strong>{{ url('/auth/facebook/callback') }}</strong></p>
            </div>
        </div>
        <button type="submit" class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white mt-25">{{__('Save')}}</button>
    </form>
</div>
