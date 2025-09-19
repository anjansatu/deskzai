<div class="p-sm-25 p-15">
    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update Language') }}</h5>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>
    <form class="ajax reset" action="{{ route('admin.setting.languages.update', $language->id) }}" method="post"
          data-handler="languageHandler">
        @csrf

            <div class="row rg-24">
                <div class="col-12">
                        <label class="zForm-label" for="language">{{ __('Language') }} <span class="text-danger">*</span></label>
                        <input class="zForm-control" type="text" name="language" value="{{ $language->language }}" placeholder="{{ __("Type Language Name") }}" required>
                </div>
                <div class="col-12">
                        <label class="zForm-label" for="iso_code">{{ __('ISO Code') }} <span class="text-danger">*</span></label>
                        <select class="form-control" name="iso_code" required>
                            <option value="">--{{ __('Select ISO Code') }}--</option>
                            @foreach(languageIsoCode() as $code => $isoCountryName)
                                <option
                                    value="{{$code}}" {{ $code == $language->iso_code ? 'selected' : '' }}>{{$isoCountryName.'-'.$code}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-12">
                        <label for="flag" class="zForm-label"> {{__('Flag')}} <span
                                class="text-danger">*</span> </label>
                        <div class="upload-img-box">
                            <img src="{{ getFileUrl($language->flag_id) }}">
                            <input type="file" name="flag" accept="image/*" onchange="previewFile(this)">
                        </div>
                </div>
                <div class="col-12">
                        <label class="zForm-label" for="rtl">{{ __('RTL Supported') }} <span class="text-danger">*</span></label>
                        <select class="form-control" name="rtl" required>
                            <option {{ $language->rtl == 0 ? 'selected' : '' }} value="0">{{__("No")}}</option>
                            <option {{ $language->rtl == 1 ? 'selected' : '' }} value="1">{{__("Yes")}}</option>
                        </select>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input name="default" class="form-check-input" type="checkbox" value="1"
                               {{ $language->default == STATUS_ACTIVE ? 'checked' : '' }} id="flexCheckChecked-{{ $language->id }}">
                        <label class="form-check-label p-1" for="flexCheckChecked-{{ $language->id }}">
                            {{ __('Default Language') }}
                        </label>
                    </div>
                </div>
            </div>

        <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Update') }}</button>

    </form>
</div>
