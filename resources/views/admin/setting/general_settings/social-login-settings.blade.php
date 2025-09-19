@extends('admin.layouts.app')
@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ $pageTitle }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-2 col-lg-3 col-md-4 mb-3 pr-0">
                    @include('admin.setting.partials.general-sidebar')
                </div>
                <div class="col-xxl-10 col-lg-9 col-md-8">
                    <div class="email-inbox__area bg-style">
                        <form class="ajax" action="{{route('admin.setting.settings_env.update')}}" method="POST"
                              enctype="multipart/form-data" data-handler="settingCommonHandler">
                            @csrf
                            <h4 class="bd-b-one bd-c-stroke pb-20 mb-20 fs-18 fw-600 lh-22 text-title-black">{{ __('Google Credentials') }}</h4>

                            <div class="row rg-24">
                                <div class="col-12">
                                    <label class="zForm-label">{{ __('Google Login Status') }}</label>

                                        <select name="google_login_status" id="google_login_status" class="form-control">
                                            <option value="">--{{ __('Select option') }}--</option>
                                            <option value="1"
                                                    @if(getOption('google_login_status') == STATUS_ACTIVE) selected @endif>{{ getStatus(STATUS_ACTIVE) }}</option>
                                            <option value="0"
                                                    @if(getOption('google_login_status') != STATUS_ACTIVE) selected @endif>{{ getStatus(STATUS_DISABLE) }}</option>
                                        </select>

                                </div>
                                <div class="col-12">
                                    <label class="zForm-label">{{ __('Google Client ID') }}</label>
                                    <input type="text" name="google_client_id" id="google_client_id" value="{{getOption('google_client_id')}}" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="zForm-label">{{ __('Google Client Secret') }} </label>
                                    <input type="text" name="google_client_secret" id="google_client_secret" value="{{getOption('google_client_secret')}}" class="form-control">
                                </div>
                            </div>

                            <h4 class="bd-b-one bd-c-stroke py-20 mb-20 fs-18 fw-600 lh-22 text-title-black">{{ __('Facebook Credentials') }}</h4>
                            <div class="row rg-24">
                                <div class="col-12">
                                    <label class="zForm-label">{{ __('Facebook Login Status') }}</label>

                                        <select name="facebook_login_status" id="facebook_login_status"
                                                class="form-control">
                                            <option value="">--{{ __('Select option') }}--</option>
                                            <option value="1"
                                                    @if(getOption('facebook_login_status') == STATUS_ACTIVE) selected @endif>{{ getStatus(STATUS_ACTIVE) }}</option>
                                            <option value="0"
                                                    @if(getOption('facebook_login_status') != STATUS_ACTIVE) selected @endif>{{ getStatus(STATUS_DISABLE) }}</option>
                                        </select>

                                </div>
                                <div class="col-12">
                                    <label class="zForm-label">{{ __('Facebook Client ID') }}</label>
                                    <input type="text" name="facebook_client_id" id="facebook_client_id" value="{{getOption('facebook_client_id')}}" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="zForm-label">{{ __('Facebook Client Secret') }} </label>
                                    <input type="text" name="facebook_client_secret" id="facebook_client_secret" value="{{getOption('facebook_client_secret')}}" class="form-control">
                                </div>
                            </div>
                            <button type="submit" class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white mt-25">{{__('Update')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection
@push('script')
    <script>
        'use strict'
        var google_status = "{{ getOption('google_login_status') }}"
        var facebook_status = "{{ getOption('facebook_login_status') }}"
    </script>
    <script src="{{ asset('admin/js/custom/social-login.js') }}"></script>
@endpush

