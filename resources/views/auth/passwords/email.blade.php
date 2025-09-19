@extends('auth.layouts.app')
@push('title')
    {{ __('Welcome') }}
@endpush
@push('style')
@endpush
@section('content')
    <div class="signLog-section">
        <div class="left" data-aos="fade-right" data-aos-duration="1000">
            <div class="wrap">
                <div class="zMain-signLog-content">
                    <a href="{{ route('frontend') }}" class="d-flex max-w-167 mb-30">
                        <img src="{{ getFileUrl(getGeneralSettingData(getUserIdByTenant(),'app_logo')) }}" class="w-100" alt="{{ getGeneralSettingData(getUserIdByTenant(),'app_name') }}" />
                    </a>
                    <div class="pb-30">
                        <h4 class="fs-32 fw-600 lh-48 text-title-black pb-5">{{ __('Forget Your Password') }}</h4>
                        <p class="fs-14 fw-400 lh-22 text-para-text">{{ __('Don’t have an account?') }} <a href="{{ route('register') }}" class="fw-500 text-main-color text-decoration-underline">{{ __('Sign Up') }}</a></p>
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="pb-20">
                            @if (session('status'))
                                <strong class="text-success">{{ session('status') }}</strong>
                            @endif
                        </div>
                        <div class="pb-20">
                            <label for="inputForgotPassEmail" class="zForm-label">{{ __('Email Address') }}</label>
                            <input type="email" name="email" class="form-control zForm-control" id="inputForgotPassEmail" placeholder="{{ __('Enter email address') }}" />
                            @error('email')
                                <span class="fs-12 text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="border-0 d-flex justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-main-color fs-14 fw-500 lh-20 text-white" title="{{ __('Continue') }}">{{ __('Continue') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="right" data-background="{{ getFileUrl(getGeneralSettingData(getUserIdByTenant(),'login_left_image')) }}" data-aos="fade-left" data-aos-duration="1000"></div>
    </div>
@endsection
