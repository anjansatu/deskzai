<!-- Start Footer -->
<section class="landing-footer">
    <div class="container">
        <!-- Top -->
        <div class="landing-footer-top">
            <div class="container">
                <div class="row rg-20">
                    <div class="col-lg-4 col-md-6">
                        <div class="max-w-366">
                            <div class="max-w-194 pb-22">
                                <img src="{{ getFileUrl(getGeneralSettingData(getUserIdByTenant(),'app_footer_logo')) }}" alt="{{ getGeneralSettingData(getUserIdByTenant(),'app_name') }}" />
                            </div>
                            <p class="pb-32 fs-18 fw-400 lh-28 text-title-black">{{strip_tags(getCmsSetting(getUserIdByTenant(),'app_footer_text'))}}</p>
                            <ul class="d-flex align-items-center g-12 landing-footer-social">
                                <li>
                                    <a target="__blank" href="{{ getCmsSetting(getUserIdByTenant(), 'facebook_url') }}" class="w-40 h-40 rounded-circle bd-one bd-c-para-text d-flex justify-content-center align-items-center text-title-black"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a target="__blank" href="{{ getCmsSetting(getUserIdByTenant(), 'twitter_url') }}" class="w-40 h-40 rounded-circle bd-one bd-c-para-text d-flex justify-content-center align-items-center text-title-black"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a target="__blank" href="{{ getCmsSetting(getUserIdByTenant(), 'instagram_url') }}" class="w-40 h-40 rounded-circle bd-one bd-c-para-text d-flex justify-content-center align-items-center text-title-black"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a target="__blank" href="{{ getCmsSetting(getUserIdByTenant(), 'linkedin_url') }}" class="w-40 h-40 rounded-circle bd-one bd-c-para-text d-flex justify-content-center align-items-center text-title-black"><i class="fa-brands fa-linkedin-in"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="pl-xl-70">
                            <h4 class="pb-37 fs-24 fw-500 lh-30 text-title-black">{{ __('Quick Links') }}</h4>
                            <ul class="zList-pb-21">
                                <li><a href="{{route('tenant.faqs')}}" class="fs-18 fw-400 lh-27 text-title-black hover-color-main-color">{{ __('FAQ') }}</a>
                                </li>
                                @if (isAddonInstalled('DESKSAAS') > 0)
                                    <li><a href="{{route('pricing')}}" class="fs-18 fw-400 lh-27 text-title-black hover-color-main-color">{{__('pricing plan')}}</a></li>
                                @endif
                                <li><a href="{{route('tenant.contact.us.index')}}" class="fs-18 fw-400 lh-27 text-title-black hover-color-main-color">{{__('contact us')}}</a></li>
                                <li><a href="{{route('terms.of.use.index')}}" class="fs-18 fw-400 lh-27 text-title-black hover-color-main-color">{{__('Terms Of Condition')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <h4 class="pb-37 fs-24 fw-500 lh-30 text-title-black">{{ __('Useful Links') }}</h4>
                        <ul class="zList-pb-21">
                            <li><a href="{{route('login')}}" class="fs-18 fw-400 lh-27 text-title-black hover-color-main-color">{{__('Sign in')}}</a></li>
                            <li><a href="{{route('register')}}" class="fs-18 fw-400 lh-27 text-title-black hover-color-main-color">{{__('Sign up')}}</a></li>
                            <li><a href="{{route('password.request')}}" class="fs-18 fw-400 lh-27 text-title-black hover-color-main-color">{{__('Forgot password')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="max-w-190 ms-lg-auto">
                            <h4 class="pb-37 fs-24 fw-500 lh-30 text-title-black">{{ __('Contact Info') }}</h4>
                            <ul class="zList-pb-21">
                                <li class="d-flex align-items-center g-16">
                                    <div class="flex-shrink-0 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" viewBox="0 0 20 26" fill="none">
                                            <path d="M10 0C7.3488 0.00319472 4.80708 1.08037 2.93239 2.99522C1.05771 4.91008 0.00313834 7.50627 1.0639e-05 10.2143C-0.00316471 12.4273 0.704538 14.5802 2.01455 16.3429C2.01455 16.3429 2.28728 16.7096 2.33183 16.7626L10 26L17.6718 16.7579C17.7118 16.7087 17.9854 16.3429 17.9854 16.3429L17.9864 16.3401C19.2957 14.5782 20.0031 12.4263 20 10.2143C19.9969 7.50627 18.9423 4.91008 17.0676 2.99522C15.1929 1.08037 12.6512 0.00319472 10 0ZM10 13.9286C9.2808 13.9286 8.57774 13.7107 7.97975 13.3026C7.38175 12.8945 6.91567 12.3144 6.64044 11.6357C6.36521 10.957 6.2932 10.2102 6.43351 9.48966C6.57382 8.76916 6.92015 8.10734 7.42871 7.58789C7.93726 7.06844 8.5852 6.71468 9.29058 6.57137C9.99597 6.42805 10.7271 6.50161 11.3916 6.78273C12.056 7.06386 12.624 7.53993 13.0235 8.15074C13.4231 8.76155 13.6364 9.47967 13.6364 10.2143C13.6352 11.199 13.2517 12.143 12.57 12.8393C11.8883 13.5356 10.9641 13.9273 10 13.9286Z" fill="#01091A"></path>
                                        </svg>
                                    </div>
                                    <p class="fs-16 fw-400 lh-26 text-title-black">{{$contactUs->app_email ?? ''}}</p>
                                </li>
                                <li class="d-flex align-items-center g-16">
                                    <div class="flex-shrink-0 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M13.3342 14.2081L15.0564 12.4859C15.2883 12.2569 15.5818 12.1 15.9012 12.0345C16.2205 11.969 16.552 11.9976 16.8555 12.1169L18.9544 12.9549C19.261 13.0794 19.5239 13.2918 19.71 13.5655C19.8961 13.8391 19.997 14.1617 20 14.4926V18.3368C19.9982 18.5619 19.9509 18.7843 19.8609 18.9906C19.7709 19.197 19.6401 19.3829 19.4763 19.5374C19.3125 19.6918 19.1192 19.8115 18.9079 19.8893C18.6967 19.967 18.4719 20.0012 18.2471 19.9898C3.5392 19.0749 0.57149 6.61972 0.010239 1.85293C-0.0158147 1.61885 0.00798984 1.3819 0.0800864 1.15768C0.152183 0.933454 0.270938 0.727038 0.428538 0.552007C0.586138 0.376976 0.779012 0.237298 0.994471 0.142162C1.20993 0.0470249 1.44309 -0.00141401 1.67862 3.14216e-05H5.3921C5.72347 0.00101229 6.04698 0.101108 6.321 0.287445C6.59503 0.473782 6.80704 0.737838 6.92977 1.04565L7.7678 3.14457C7.89101 3.44678 7.92245 3.77859 7.85818 4.09856C7.79391 4.41852 7.63679 4.71246 7.40645 4.94365L5.68426 6.66585C5.68426 6.66585 6.67606 13.3778 13.3342 14.2081Z" fill="#01091A"></path>
                                        </svg>
                                    </div>
                                    <p class="fs-16 fw-400 lh-26 text-title-black">{{$contactUs->app_contact_number ?? ''}}</p>
                                </li>
                                <li class="d-flex align-items-center g-16">
                                    <div class="flex-shrink-0 d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                            <path d="M18 -0.0078125H2C0.9 -0.0078125 0.00999999 0.892187 0.00999999 1.99219L0 13.9922C0 15.0922 0.9 15.9922 2 15.9922H18C19.1 15.9922 20 15.0922 20 13.9922V1.99219C20 0.892187 19.1 -0.0078125 18 -0.0078125ZM18 3.99219L10 8.99219L2 3.99219V1.99219L10 6.99219L18 1.99219V3.99219Z" fill="#01091A"></path>
                                        </svg>
                                    </div>
                                    <p class="fs-16 fw-400 lh-26 text-title-black">{{$contactUs->app_location ?? ''}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom -->
        <div class="landing-footer-bottom">
            <p class="fs-16 fw-400 lh-22 text-title-black">{{ getGeneralSettingData(getUserIdByTenant(),'app_copyright') }}
                {{ __('By') }}
                <a href="{{ route('frontend') }}" class="text-purple text-decoration-underline">{{ getGeneralSettingData(getUserIdByTenant(),'app_developed') }}</a>
            </p>
        </div>

    </div>
</section>
<!-- End Footer -->
