@extends('admin.layouts.app')
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-xl-3">
                @include('admin.setting.partials.general-sidebar')
            </div>
            <div class="col-xl-9">
                <h4 class="fs-18 fw-600 lh-20 text-title-black pb-18">{{__('Site Logos')}}</h4>
                <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                    <form class="ajax" action="{{route('admin.setting.color-settings.update')}}" method="POST"
                          enctype="multipart/form-data" data-handler="settingCommonHandler">
                        @csrf

                        <div class="row rg-24">
                            <div class="col-lg-auto col-md-4 col-sm-6">
                                <label class="zForm-label">{{__('App Preloader')}}</label>
                                <div class="upload-img-box">
                                    <img
                                        src="{{ getFileUrl(getGeneralSettingData(auth()->id(),'app_preloader')) }}">
                                    <input type="file" name="app_preloader" id="app_preloader" accept="image/*"
                                           onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                @if ($errors->has('app_logo'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('app_logo')
                                    }}</span>
                                @endif
                                <p class="fs-14 fw-400 lh-24 text-main-color">{{__('Recommend Size: 140 x 40')}}</p>
                            </div>
                            <div class="col-lg-auto col-md-4 col-sm-6">
                                <label class="zForm-label">{{__('App Logo')}}</label>
                                <div class="upload-img-box">
                                    <img src="{{ getFileUrl(getGeneralSettingData(auth()->id(),'app_logo')) }}">
                                    <input type="file" name="app_logo" id="app_logo" accept="image/*"
                                           onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                @if ($errors->has('app_logo'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('app_logo')
                                    }}</span>
                                @endif
                                <p class="fs-14 fw-400 lh-24 text-main-color">{{__('Recommend Size: 140 x 40')}}</p>
                            </div>
                            @php
                                @endphp
                            <div class="col-lg-auto col-md-4 col-sm-6">
                                <label class="zForm-label">{{__('App Fav Icon')}} </label>
                                <div class="upload-img-box">
                                    <img src="{{ getFileUrl(getGeneralSettingData(auth()->id(),'app_fav_icon')) }}">
                                    <input type="file" name="app_fav_icon" id="app_fav_icon" accept="image/*"
                                           onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                @if ($errors->has('app_fav_icon'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('app_fav_icon')
                                    }}</span>
                                @endif
                                <p class="fs-14 fw-400 lh-24 text-main-color">{{__('Recommend Size: 16 x 16')}}</p>
                            </div>
                            <div class="col-lg-auto col-md-4 col-sm-6">
                                <label class="zForm-label">{{__('Admin Logo & Footer Logo')}}</label>
                                <div class="upload-img-box">
                                    <img
                                        src="{{ getFileUrl(getGeneralSettingData(auth()->id(),'app_footer_logo')) }}">
                                    <input type="file" name="app_footer_logo" id="app_footer_logo" accept="image/*"
                                           onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                @if ($errors->has('app_logo'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('app_logo')
                                    }}</span>
                                @endif
                                <p class="fs-14 fw-400 lh-24 text-main-color">{{__('Recommend Size: 140 x 40')}}</p>
                            </div>
                            <div class="col-lg-auto col-md-4 col-sm-6">
                                <label class="form-label">{{__('Login Left Image')}}</label>
                                <div class="upload-img-box">
                                    <img
                                        src="{{ getFileUrl(getGeneralSettingData(auth()->id(),'login_left_image')) }}">
                                    <input type="file" name="login_left_image" id="login_left_image"
                                           accept="image/*"
                                           onchange="previewFile(this)">
                                    <div class="upload-img-box-icon">
                                        <i class="fa fa-camera"></i>
                                    </div>
                                </div>
                                @if ($errors->has('login_left_image'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{
                                    $errors->first('login_left_image')
                                    }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="general-settings-btn">
                            <button type="submit"
                                    class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{__('Update')}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection
@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush
@push('script')

    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush
