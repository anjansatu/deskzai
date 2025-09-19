@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote-lite.min.css') }}"/>
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">

        <div class="row rg-20">
            <div class="col-xl-3">
                @include('admin.setting.partials.frontend-sidebar')
            </div>
            <div class="col-xl-9">
                <form class="ajax" action="{{route('admin.setting.application-settings.store')}}" method="POST"
                      enctype="multipart/form-data" data-handler="settingCommonHandler">
                    @csrf

                    <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-20">
                        <div class="row rg-24">
                            <div class="col-12">
                                <label class="zForm-label">{{__('Auth Page Title')}} </label>
                                <textarea name="auth_page_title" class="summernoteOne"
                                          placeholder="{{ __("Auth Page Title") }}">{{ isset($settings_data->auth_page_title) ? $settings_data->auth_page_title : '' }} </textarea>
                            </div>
                            <div class="col-12">
                                <label class="zForm-label">{{__('Auth Page Subtitle')}} </label>
                                <textarea name="auth_page_sub_title" class="summernoteOne"
                                          placeholder="{{ __("Auth Page Subtitle") }}">{{ isset($settings_data->auth_page_sub_title) ? $settings_data->auth_page_sub_title : '' }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="zForm-label">{{ __('Footer Left Text') }} </label>
                                <textarea name="app_footer_text" class="summernoteOne"
                                          placeholder="{{ __("Footer Left Text") }}">{{ isset($settings_data->app_footer_text) ? $settings_data->app_footer_text : '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-20">
                        <h2 class="fs-24 fw-500 lh-34 text-black mb-20">{{__('Social Media Profile Link (Footer)')}}</h2>

                        <div class="row rg-24">
                            <div class="col-xxl-4 col-lg-6">
                                <label class="zForm-label">{{__('Facebook URL')}} </label>
                                <input type="text" name="facebook_url"
                                       value="{{ isset($settings_data->facebook_url) ? $settings_data->facebook_url : '' }}"
                                       class="zForm-control">
                            </div>
                            <div class="col-xxl-4 col-lg-6">
                                <label class="zForm-label">{{__('Instagram URL')}} </label>
                                <input type="text" name="instagram_url"
                                       value="{{ isset($settings_data->instagram_url) ? $settings_data->instagram_url : '' }}"
                                       class="zForm-control">
                            </div>
                            <div class="col-xxl-4 col-lg-6">
                                <label class="zForm-label">{{__('LinkedIn URL')}}</label>
                                <input type="text" name="linkedin_url"
                                       value="{{ isset($settings_data->linkedin_url) ? $settings_data->linkedin_url : '' }}"
                                       class="zForm-control">
                            </div>
                            <div class="col-xxl-4 col-lg-6">
                                <label class="zForm-label">{{__('Twitter URL')}}</label>
                                <input type="text" name="twitter_url"
                                       value="{{ isset($settings_data->twitter_url) ? $settings_data->twitter_url : '' }}"
                                       class="zForm-control">
                            </div>
                            <div class="col-xxl-4 col-lg-6">
                                <label class="zForm-label">{{ __('Skype Url') }}</label>
                                <input type="text" class="zForm-control" name="skype_url"
                                       value="{{ isset($settings_data->skype_url) ? $settings_data->skype_url : '' }}"
                                       placeholder="{{ __('Skype') }}">
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                            class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white">{{__('Update')}}</button>
                </form>

            </div>
        </div>

    </div>
    <!-- Page content area end -->
@endsection
@push('script')
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/summernote-init.js') }}"></script>
@endpush
