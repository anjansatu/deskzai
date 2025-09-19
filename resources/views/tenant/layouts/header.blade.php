{{--<!-- header area start here  -->--}}
{{--<header class="header-area header">--}}

{{--    <div class="">--}}
{{--        <div class="container">--}}
{{--            <div class="header-element">--}}
{{--                <div class="header-logo">--}}
{{--                    <a href="{{route('frontend')}}">--}}
{{--                        <img src="{{ getFileUrl(getGeneralSettingData(getUserIdByTenant(),'app_logo')) }}" alt="{{ getGeneralSettingData(getUserIdByTenant(),'app_name') }}">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="header-menu">--}}
{{--                    <ul id="nav" class="nan">--}}
{{--                        <li><a href="{{route('frontend')}}">{{__("Home")}}</a></li>--}}
{{--                        <li><a href="{{route('tenant.knowledge')}}">{{__("Knowledge")}}</a></li>--}}
{{--                        <li><a href="{{route('tenant.faqs')}}">{{__("FAQ,s")}}</a></li>--}}
{{--                        <li><a href="{{route('tenant.contact.us.index')}}">{{__("Contact Us")}}</a></li>--}}
{{--                        @if(Auth::check())--}}
{{--                            @if(auth()->user()->role == USER_ROLE_AGENT)--}}
{{--                                <li class="down-btu-hide"><a href="{{route('agent.dashboard')}}" class="down-btu">{{__("Dashboard")}}</a>--}}
{{--                                </li>--}}
{{--                            @else--}}
{{--                                <li class="down-btu-hide"><a href="{{route('customer.dashboard')}}"--}}
{{--                                       class="down-btu">{{__("Dashboard")}}</a></li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="down-btu-hide"><a href="{{route('ticket.guest-create-ticket')}}" class="down-btu theme-color">{{__("Create Ticket")}}</a></li>--}}
{{--                            <li class="down-btu-hide"><a href="{{route('login')}}" class="down-btu">{{__("Sign In")}}</a></li>--}}
{{--                        @endif--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="d-flex align-items-center g-20">--}}
{{--                    <div class="dropdown langHome d-inline-block sme-4">--}}
{{--                        <button type="button" class="header-item" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <img class="rounded-circle avatar-xs fit-image header-profile-user" src="{{asset(selectedLanguage()?->flag)}}">--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu dropdown-menu-lang" aria-labelledby="page-header-user-dropdown">--}}
{{--                            <!-- item-->--}}
{{--                            @foreach(appLanguages() as $app_lang)--}}
{{--                                <a href="{{ url('/local/'.$app_lang->iso_code) }}" class="notification-item">--}}
{{--                                    <div class="d-flex align-items-center gap-4 mb-3 ps-2">--}}
{{--                                        <div>--}}
{{--                                            <img class="rounded-circle avatar-xs fit-image header-profile-user"--}}
{{--                                                 src="{{asset($app_lang->flag)}}" alt="Header Avatar">--}}
{{--                                        </div>--}}
{{--                                        <div class="flex-1">--}}
{{--                                            <p class="mb-1">{{$app_lang->language}}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            @endforeach--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    @if(Auth::check())--}}
{{--                        @if(auth()->user()->role == USER_ROLE_AGENT)--}}
{{--                            <a href="{{route('agent.dashboard')}}" class="down-btu ">{{__("Dashboard")}}</a>--}}
{{--                        @elseif(auth()->user()->role == USER_ROLE_SUPER_ADMIN || auth()->user()->role == USER_ROLE_ADMIN)--}}
{{--                            <a href="{{route('admin.dashboard')}}" class="down-btu ">{{__("Dashboard")}}</a>--}}
{{--                        @else--}}
{{--                            <a href="{{route('customer.dashboard')}}" class="down-btu">{{__("Dashboard")}}</a>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        <a href="{{route('ticket.guest-create-ticket')}}" class="down-btu theme-color">{{__("Create Ticket")}}</a>--}}
{{--                        <a href="{{route('login')}}" class="down-btu sms-3">{{__("Sign In")}}</a>--}}
{{--                    @endif--}}

{{--                    <div class="header-toggle">--}}
{{--                        <div class="menu-icon">--}}
{{--                            <span></span>--}}
{{--                            <span></span>--}}
{{--                            <span></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</header>--}}

<!-- header area end here  -->

<!-- Start Header -->
<header class="landing-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-6">
                <a href="{{route('frontend')}}" class="">
                    <img src="{{ getFileUrl(getGeneralSettingData(getUserIdByTenant(),'app_logo')) }}" alt="{{ getGeneralSettingData(getUserIdByTenant(),'app_name') }}">
                </a>
            </div>
            <div class="col-xl-6 col-lg-5 col-6">
                <nav class="navbar navbar-expand-lg p-0">
                    <button class="navbar-toggler bd-c-main-color text-main-color fs-30 ms-auto" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="navbar-collapse landing-menu-navbar-collapse offcanvas offcanvas-start" tabindex="-1"
                         id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <button type="button"
                                class="d-lg-none w-30 h-30 p-0 rounded-circle bg-white border-0 position-absolute top-10 right-10"
                                data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-times"></i>
                        </button>
                        <ul class="navbar-nav landing-menu-navbar-nav justify-content-md-center flex-wrap w-100">
                            <li class="nav-item"><a class="nav-link" href="{{route('frontend')}}">{{__("Home")}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('tenant.knowledge')}}">{{__("Knowledge")}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('tenant.faqs')}}">{{__("FAQ,s")}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('tenant.contact.us.index')}}">{{__("Contact Us")}}</a></li>

                            @if(Auth::check())
                                <li class="nav-item d-lg-none">
                                    @if(auth()->user()->role == USER_ROLE_AGENT)
                                        <a href="{{route('agent.dashboard')}}" class="nav-link">{{__("Dashboard")}}</a>
                                    @elseif(auth()->user()->role == USER_ROLE_ADMIN || auth()->user()->role == USER_ROLE_SUPER_ADMIN)
                                        <a href="{{route('admin.dashboard')}}" class="nav-link">{{__("Dashboard")}}</a>
                                    @else
                                        <a href="{{route('customer.dashboard')}}" class="nav-link">{{__("Dashboard")}}</a>
                                    @endif
                                </li>
                            @else
                                <li class="nav-item d-lg-none">
                                    <a href="{{route('ticket.guest-create-ticket')}}" class="nav-link theme-color">{{__("Create Ticket")}}</a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a href="{{route('login')}}" class="nav-link">{{__("Sign In")}}</a>
                                </li>
                            @endif

                            <li class="nav-item d-lg-none">

                                <div class="dropdown">
                                    <button class="dropdown-toggle p-0 lanDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{asset(selectedLanguage()?->flag)}}" alt=""/>
                                    </button>
                                    <ul class="dropdown-menu dropdownItem-one">
                                        @foreach(appLanguages() as $app_lang)
                                            <li>
                                                <a class="d-flex align-items-center cg-8" href="{{ url('/local/'.$app_lang->iso_code) }}">
                                                    <div class="d-flex rounded-circle overflow-hidden flex-shrink-0">
                                                        <img src="{{asset($app_lang->flag)}}" alt="" class="max-w-26 h-26"/>
                                                    </div>
                                                    <p class="fs-13 fw-500 lh-16 text-title-black">{{$app_lang->language}}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                <div class="d-flex justify-content-end align-items-center g-10">
                    <div class="dropdown">
                        <button class="dropdown-toggle p-0 lanDropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset(selectedLanguage()?->flag)}}" alt=""/>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end dropdownItem-one">
                            @foreach(appLanguages() as $app_lang)
                                <li>
                                    <a class="d-flex align-items-center cg-8" href="{{ url('/local/'.$app_lang->iso_code) }}">
                                        <div class="d-flex rounded-circle overflow-hidden flex-shrink-0">
                                            <img src="{{asset($app_lang->flag)}}" alt="" class="max-w-26 h-26"/>
                                        </div>
                                        <p class="fs-13 fw-500 lh-16 text-title-black">{{$app_lang->language}}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="text-end">
                        @if(Auth::check())
                            @if(auth()->user()->role == USER_ROLE_AGENT)
                                <a href="{{route('agent.dashboard')}}" class="py-17 px-33 bd-ra-48 d-inline-flex bg-title-black fs-18 fw-600 lh-22 text-white">{{__("Dashboard")}}</a>
                            @elseif(auth()->user()->role == USER_ROLE_SUPER_ADMIN || auth()->user()->role == USER_ROLE_ADMIN)
                                <a href="{{route('admin.dashboard')}}" class="py-17 px-33 bd-ra-48 d-inline-flex bg-title-black fs-18 fw-600 lh-22 text-white">{{__("Dashboard")}}</a>
                            @else
                                <a href="{{route('customer.dashboard')}}" class="py-17 px-33 bd-ra-48 d-inline-flex bg-title-black fs-18 fw-600 lh-22 text-white">{{__("Dashboard")}}</a>
                            @endif
                        @else
                            <a href="{{route('ticket.guest-create-ticket')}}" class="py-17 px-33 bd-ra-48 d-inline-flex bg-main-color fs-18 fw-600 lh-22 text-white">{{__("Create Ticket")}}</a>
                            <a href="{{route('login')}}" class="py-17 px-33 bd-ra-48 d-inline-flex bg-title-black fs-18 fw-600 lh-22 text-white">{{__("Sign In")}}</a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- End Header -->
