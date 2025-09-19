@extends('auth.layouts.app')
@push('title')
    {{ __('Login') }}
@endpush
@push('style')
@endpush
@section('content')
    <div class="signLog-section">
        <div class="left" data-aos="fade-right" data-aos-duration="1000">
            <div class="wrap">
                <div class="zMain-signLog-content">
                    <a href="{{ route('frontend') }}" class="d-flex max-w-167 mb-30">
                        <img src="{{ getFileUrl(getGeneralSettingData(getUserIdByTenant(),'app_footer_logo')) }}" class="w-100" alt="{{ getGeneralSettingData(getUserIdByTenant(),'app_name') }}" />
                    </a>
                    <div class="pb-30">
                        <h4 class="fs-32 fw-600 lh-48 text-title-black pb-5">{{ __('Sign in') }}</h4>
                        <p class="fs-14 fw-400 lh-22 text-para-text">{{ __('Don’t have an account?') }} <a href="{{ route('register') }}" class="fw-500 text-main-color text-decoration-underline">{{ __('Sign Up') }}</a></p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="pb-20">
                            <label for="inputEmail" class="zForm-label">{{ __('Email') }}</label>
                            <input type="email" name="email" class="form-control zForm-control" id="inputEmail"
                                   placeholder="{{ __('Enter email address') }}" />
                            @error('email')
                                <span class="fs-12 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="pb-14">
                            <label for="inputPassword" class="zForm-label">{{ __('Password') }}</label>
                            <div class="passShowHide">
                                <input type="password" name="password" class="form-control zForm-control passShowHideInput"
                                       id="inputPassword" placeholder="{{ __('Enter your password') }}" />
                                <button type="button" toggle=".passShowHideInput"
                                        class="toggle-password fa-solid fa-eye"></button>
                                @error('password')
                                    <span class="fs-12 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="pb-30 d-flex justify-content-between align-items-center flex-wrap g-10">
                            <div class="zForm-wrap-checkbox">
                                <input type="checkbox" class="form-check-input" id="authRemember" name="remember"
                                       value="1" />
                                <label for="authRemember">{{ __('Remember me') }}</label>
                            </div>
                            <a href="{{ route('password.request') }}"
                               class="fs-14 fw-400 lh-22 text-main-color">{{ __('Forgot Password?') }}</a>
                        </div>

                        @if(getOption('google_recaptcha_status') == 1)
                            <div class="g-recaptcha mb-5" id="feedback-recaptcha" data-sitekey="{{ getOption('google_recaptcha_site_key') }}"></div>
                        @endif

                        <button type="submit" class="border-0 d-flex justify-content-center align-items-center w-100 p-15 bd-ra-10 bg-main-color fs-14 fw-500 lh-20 text-white">{{ __('Log in') }}</button>
                    </form>

                    @if (env('LOGIN_HELP') == 'active')
                        <div class="row pt-12 fs-14">
                            <div class="col-md-12 mb-25">
                                <div class="table-responsive login-info-table mt-3">
                                    <table class="table table-bordered">
                                        <tbody>
                                            @if(isAddonInstalled('DESKSAAS') > 0)
                                                @if(getHostFromURL(env('APP_URL')) == request()->getHost())
                                                    <tr>
                                                        <td colspan="2" id="adminCredentialShow"
                                                            class="fs-4 login-info p-3">
                                                            <b>Super Admin :</b> sadmin@gmail.com | 123456
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" id="userCredentialShow"
                                                            class="fs-4 login-info p-3">
                                                            <b>Admin :</b> admin@gmail.com | 123456
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td colspan="2" id="agentCredentialShow"
                                                            class="fs-4 login-info p-3">
                                                            <b>Agent :</b> agent@gmail.com | 123456
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" id="customerCredentialShow"
                                                            class="fs-4 login-info p-3">
                                                            <b>Customer :</b> customer@gmail.com | 123456
                                                        </td>
                                                    </tr>
                                                @endif
                                            @else
                                                <tr>
                                                    <td colspan="2" id="userCredentialShow" class="fs-4 login-info p-3">
                                                        <b>Admin :</b> admin@gmail.com | 123456
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" id="agentCredentialShow" class="fs-4 login-info p-3">
                                                        <b>Agent :</b> agent@gmail.com | 123456
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" id="customerCredentialShow" class="fs-4 login-info p-3">
                                                        <b>Customer :</b> customer@gmail.com | 123456
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="right" data-background="{{ getFileUrl(getGeneralSettingData(getUserIdByTenant(),'login_left_image')) }}" data-aos="fade-left" data-aos-duration="1000"></div>
    </div>
@endsection

@push('script')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="{{ asset('assets/js/custom/auth.js') }}"></script>
@endpush
