<div class="">
    <div class="bd-b-one bd-c-stroke pb-20 mb-20 d-flex align-items-center flex-wrap justify-content-between g-10">
        <h4 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Pusher Configuration') }}</h4>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-times"></i>
        </button>
    </div>
    <form class="ajax" action="{{route('admin.setting.settings_env.update')}}" method="post"
          class="form-horizontal" data-handler="commonResponseForModal">
        @csrf
        <div class="row rg-20">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                <label class="zForm-label">{{ __('Pusher App Id') }}</label>
                <input type="text" name="pusher_app_id" id="pusher_app_id" value="{{getOption('pusher_app_id')}}" class="zForm-control">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                <label class="zForm-label">{{ __('Pusher App Key') }} </label>
                <input type="text" name="pusher_app_key" id="pusher_app_key" value="{{getOption('pusher_app_key')}}" class="zForm-control">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                <label class="zForm-label">{{ __('Pusher App Secret') }} </label>
                <input type="text" name="pusher_app_secret" id="pusher_app_secret" value="{{getOption('pusher_app_secret')}}" class="zForm-control">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                <label class="zForm-label">{{ __('Pusher Cluster') }} </label>
                <input type="text" name="pusher_cluster" id="pusher_cluster" value="{{getOption('pusher_cluster')}}" class="zForm-control">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                <label class="zForm-label">{{ __('Chanel Name') }} </label>
                <input type="text" name="pusher_chanel_name" id="pusher_chanel_name" value="{{getOption('pusher_chanel_name')}}" class="zForm-control">
            </div>
        </div>
        <div class="d-flex g-12 flex-wrap mt-25">
                <button type="submit" class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white">{{__('Update')}}</button>
        </div>
    </form>
</div>
