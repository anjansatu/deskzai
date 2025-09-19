<div class="p-sm-25 p-15">
    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{__('Envato Personal Api Token')}}</h5>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>
    <form class="ajax" action="{{ route('admin.envato.config-modal-data-store') }}" method="post"
          class="form-horizontal" data-handler="commonResponseForModal">
        @csrf

            <label class="zForm-label">{{ __('Api Token') }} </label>
            <input type="text" min="0" max="100" step="any" name="envato_personal_api_token" value="{{ isset($envatoConfigData->personal_api_token) ? $envatoConfigData->personal_api_token : '' }}" class="zForm-control">

            <button class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20" type="submit">{{ __('Update') }}</button>
    </form>
</div>
