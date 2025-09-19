<div data-aos="fade-down" data-aos-duration="1000" class="main-header">
    <!-- Left -->
    <div class="d-flex align-items-center cg-15">
        <!-- Mobile Menu Button -->
        <div class="mobileMenu">
            <button
                class="bd-one bd-c-title-color rounded-circle w-30 h-30 d-flex justify-content-center align-items-center text-title-color p-0 bg-transparent">
                <i class="fa-solid fa-bars"></i></button>
        </div>
        @if(count(getSupportSchedule())>0)
            <div class="dropdown d-inline-block header-schedule-dropdown">
                <button type="button" class="scheduleBtu bd-ra-8 bg-purple border-0 btn-sm fs-15 fw-600 header-item lh-25 px-15 py-8 text-white" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="supportText d-none d-md-block">{{ __('Support Schedule') }}</span>
                    <span class="headseticon d-md-none"><i class="fa-solid fa-headset "></i></span>
                </button>

                <div class="dropdown-menu dropdown-scheduleArea dropdown-menu-end"
                     aria-labelledby="page-header-notifications-dropdown">
                    <div class="scheduleArea">
                        <div class="scheduleImg">
                            <img src="{{ asset('customer') }}/assets/images/support.png" alt="">
                        </div>
                        <div class="scheduleTextArea">
                            <h5>{{ varityData('schedule_title') }}</h5>
                            <p>{{ varityData('schedule_desc') }}</p>
                        </div>
                    </div>
                    @foreach (getSupportSchedule() as $dayItem)
                        <div class="{{ $dayItem->days == date('D') ? 'todayClass' : '' }}">
                            <div class="scheduleTime">
                                <div class="singleDate">

                                    <div class="dataName {{ $dayItem->status == 'Opened' ? '' : 'closeTimeDate' }}">
                                        <p>{{ $dayItem->days }}</p>
                                    </div>
                                    <div class="timetext">
                                        @if ($dayItem->status == 'Opened')
                                            <span class="timeBetween">{{ $dayItem->start_time }}</span>
                                            <span>{{ $dayItem->end_time }}</span>
                                        @else
                                            <span class="closeTime">{{ __('Closed') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <!--  -->
        @if (auth()->user()->announcement_seen != 1 && announcement(auth()->user()->tenant_id) != null)
            <div class="d-none d-lg-flex resetMinit">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                     fill="none">
                    <circle cx="11" cy="11" r="11" fill="#AFEBD7"/>
                    <path
                        d="M11.4964 6L11.4017 12.9891H10.3031L10.2084 6H11.4964ZM10.8524 15.8C10.6188 15.8 10.4183 15.7161 10.251 15.5484C10.0837 15.3806 10 15.1796 10 14.9453C10 14.7111 10.0837 14.5101 10.251 14.3423C10.4183 14.1746 10.6188 14.0907 10.8524 14.0907C11.086 14.0907 11.2865 14.1746 11.4538 14.3423C11.6211 14.5101 11.7047 14.7111 11.7047 14.9453C11.7047 15.1005 11.6653 15.2429 11.5864 15.3727C11.5106 15.5025 11.408 15.6069 11.2786 15.686C11.1523 15.762 11.0102 15.8 10.8524 15.8Z"
                        fill="#1EBB52"/>
                </svg>
                @if(strlen(strip_tags(announcement(auth()->user()->tenant_id))) <= 70)
                    <p>{{ strip_tags(announcement(auth()->user()->tenant_id)) }}</p>
                    <button type="button" class=" cross button close dismiss-buttton w-22 h-22 bg-red rounded-circle d-flex align-items-center justify-content-center text-white opacity-100 fs-14 flex-shrink-0" id="announcement-seen-unseen" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-times"></i>
                    </button>
                @else
                    <p>{!! substr(strip_tags(announcement(auth()->user()->tenant_id)), 0,  70) !!} </p>
                    <button class="bg-transparent border-0 fw-medium small-bnt text-main-color text-decoration-underline"
                            data-bs-toggle="modal"
                            data-bs-target="#customer"
                            data-bs-whatever="@mdo">
                        {{__('View More')}}
                    </button>
                @endif
            </div>
        @endif

    </div>
    <!-- Right -->
    <div class="right d-flex justify-content-end align-items-center cg-12">
        <div class="d-flex flex-shrink-0">
            @if (auth()->user()->announcement_seen != 1)
                @if((announcement(auth()->user()->tenant_id)) != null)
                    <div class="dropdown d-inline-block d-lg-none flex-shrink-0">
                        <button type="button" class="lanDropdown" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                             aria-labelledby="page-header-search-dropdown">
                            <div>
                                <div class="d-lg-flex resetMinit ms-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                         fill="none">
                                        <circle cx="11" cy="11" r="11" fill="#AFEBD7"/>
                                        <path
                                            d="M11.4964 6L11.4017 12.9891H10.3031L10.2084 6H11.4964ZM10.8524 15.8C10.6188 15.8 10.4183 15.7161 10.251 15.5484C10.0837 15.3806 10 15.1796 10 14.9453C10 14.7111 10.0837 14.5101 10.251 14.3423C10.4183 14.1746 10.6188 14.0907 10.8524 14.0907C11.086 14.0907 11.2865 14.1746 11.4538 14.3423C11.6211 14.5101 11.7047 14.7111 11.7047 14.9453C11.7047 15.1005 11.6653 15.2429 11.5864 15.3727C11.5106 15.5025 11.408 15.6069 11.2786 15.686C11.1523 15.762 11.0102 15.8 10.8524 15.8Z"
                                            fill="#1EBB52"/>
                                    </svg>
                                    @if(strlen(strip_tags(announcement(auth()->user()->tenant_id))) <= 70)
                                        <p>{{ strip_tags(announcement(auth()->user()->tenant_id)) }}</p>
                                        <button type="button" class=" cross button close dismiss-buttton w-22 h-22 bg-red rounded-circle d-flex align-items-center justify-content-center text-white opacity-100 fs-14 flex-shrink-0" id="announcement-seen-unseen" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    @else
                                        <p class="media-welcome">{!! substr(strip_tags(announcement(auth()->user()->tenant_id)), 0,  70) !!} </p>
                                        <button class="bg-transparent border-0 fw-medium small-bnt text-primary w-75"
                                                data-bs-toggle="modal"
                                                data-bs-target="#customer"
                                                data-bs-whatever="@mdo">
                                            {{__('View More')}}
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
        <!-- Language switcher -->
        <div class="dropdown lanDropdown">
            <button class="dropdown-toggle p-0 border-0 bg-transparent d-flex align-items-center cg-8" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset(selectedLanguage()?->flag) }}" alt="Flag Image"/>
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdownItem-one">
                @foreach (appLanguages() as $app_lang)
                    <li>
                        <a class="d-flex align-items-center cg-8" href="{{ url('/local/' . $app_lang->iso_code) }}">
                            <div class="d-flex rounded-circle overflow-hidden flex-shrink-0">
                                <img src="{{ asset($app_lang->flag) }}" alt="icon" class="max-w-26 h-26"/>
                            </div>
                            <p class="fs-13 fw-500 lh-16 text-title-black">{{ $app_lang->language }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Notify -->
        <div class="dropdown notifyDropdown">
            <button
                class="p-0 w-41 h-41 bd-one bd-c-stroke rounded-circle bg-white d-flex justify-content-center align-items-center dropdown-toggle"
                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('main_assets')}}/images/icon/bell.svg" alt=""/>
                <span class="notify_no">{{count(userNotification('unseen'))}}</span>
            </button>
            <div class="dropdown-menu">
                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-8 mb-8">
                    <h4 class="fs-15 fw-600 lh-32 text-title-black">
                        @if (count(userNotification('seen-unseen')) > 0)
                            {{__("You have ".count(userNotification('unseen'))." new notification")}}
                        @else
                            {{ __('Notification Not Found!') }}
                        @endif
                    </h4>
                    @if (count(userNotification('unseen')) > 0)
                        <a href="{{route('agent.notification-mark-as-read')}}"
                           class="fs-12 fw-600 lh-20 text-title-black text-decoration-underline border-0 p-0 bg-transparent">{{__('Mark all as read')}}</a>
                    @endif
                </div>
                <ul class="notify-list">
                    @foreach (userNotification('seen-unseen') as $key => $item)
                        @if($key <=2 )
                            <li class="d-flex align-items-start cg-15">
                                <div
                                    class="flex-grow-0 flex-shrink-0 w-32 h-32 rounded-circle d-flex justify-content-center align-items-center bg-main-color">
                                    <img src="{{asset('main_assets/images/icon/bell-white.svg')}}" alt=""/>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center g-10 pb-8">
                                        @if($item->seen_id == null)
                                            <p class="fs-13 fw-500 lh-20 text-title-black">{{$item->title}}</p>
                                        @else
                                            <p class="fs-13 fw-500 lh-20 text-title-black">{{$item->title}}</p>
                                        @endif
                                        <p class="fs-10 fw-400 lh-20 text-para-text flex-shrink-0">{{$item->created_at->diffForHumans()}}</p>
                                    </div>
                                    @if($item->seen_id == null)
                                        <p class="fs-12 fw-400 lh-17 text-para-text max-w-220">
                                            <a href="{{route('customer.notification-view',$item->id)}}"
                                               class="text-title-black text-decoration-underline hover-color-main-color">{{__('See More')}}</a>
                                        </p>
                                    @else
                                        <p class="fs-12 fw-400 lh-17 text-para-text max-w-220">
                                            <a href="{{route('customer.notification-view',$item->id)}}"
                                               class="text-title-black text-decoration-underline hover-color-main-color">{{__('See More')}}</a>
                                        </p>
                                    @endif

                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
                @if(count(userNotification('seen-unseen'))>3)
                    <div class="d-flex justify-content-center pt-10">
                        <a class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white"
                           href="{{route('customer.all-notification')}}">{{__("View All Notifications")}}</a>
                    </div>
                @endif
            </div>
        </div>
        <!-- User -->
        <div class="dropdown headerUserDropdown">
            <button class="dropdown-toggle p-0 border-0 bg-transparent d-flex align-items-center cg-8" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-content">
                    <div class="wrap">
                        <div class="img">
                            <img src="{{ getFileUrl(auth()->user()->image) }}" alt="" class="rounded-circle w-100"/>
                        </div>
                    </div>
                    <h4 class="text-start d-none d-md-block fs-13 fw-600 lh-16 text-title-color">{{ auth()->user()->name }}</h4>
                </div>
            </button>
            <ul class="dropdown-menu dropdownItem-one">
                <li>
                    <a class="d-flex align-items-center cg-8" href="{{route('customer.profile.index')}}">
                        <div class="d-flex">
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.8966 11.6036C11.2651 11.5268 11.4846 11.1411 11.3015 10.8122C10.8978 10.0871 10.2617 9.44993 9.44812 8.96435C8.40026 8.33898 7.11636 8 5.79556 8C4.47475 8 3.19085 8.33897 2.14299 8.96435C1.32936 9.44993 0.693348 10.0871 0.289627 10.8122C0.106496 11.1411 0.325986 11.5268 0.694529 11.6036V11.6036C4.05907 12.3048 7.53204 12.3048 10.8966 11.6036V11.6036Z"
                                    fill="#63647B"/>
                                <circle cx="5.79574" cy="3.33333" r="3.33333" fill="#63647B"/>
                            </svg>
                        </div>
                        <p class="fs-14 fw-500 lh-17 text-para-text">{{__("Profile")}}</p>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-items-center cg-8" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <div class="d-flex">
                            <svg width="10" height="14" viewBox="0 0 10 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.69547 0.823345L4.37659 0.301806C2.49791 0.00658503 1.55857 -0.141025 0.945912 0.382878C0.333252 0.906781 0.333252 1.85765 0.333252 3.75938V6.56258H4.75631L2.65829 3.94005L3.34155 3.39345L6.00821 6.72678L6.22686 7.00008L6.00821 7.27339L3.34155 10.6067L2.65829 10.0601L4.75631 7.43758H0.333252V10.2401C0.333252 12.1419 0.333252 13.0927 0.945912 13.6166C1.55857 14.1405 2.49791 13.9929 4.37658 13.6977L7.69547 13.1762C8.63623 13.0283 9.10661 12.9544 9.3866 12.627C9.66658 12.2996 9.66658 11.8234 9.66658 10.8711V3.12839C9.66658 2.17609 9.66658 1.69993 9.3866 1.37251C9.10661 1.0451 8.63623 0.971179 7.69547 0.823345Z"
                                      fill="#5D697A"/>
                            </svg>
                        </div>
                        <p class="fs-14 fw-500 lh-17 text-para-text">{{__("Logout")}}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- modal area start -->
<div class="modal fade" id="customer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bd-c-stroke bd-one bd-ra-10">
            <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                <h3 class="modal-title text-white fw-bold">{{__('Announcement Details')}}</h3>
                <input type="hidden" id="announcementSeen" value="{{route('customer.announcement.seen.update')}}">
                <div>
                    <button type="button" class="close text-danger dismiss-buttton" data-bs-dismiss="modal"
                            aria-label="Close">
                        <span class=" hover-bg-color text-white fw-bold btn btn-primary ms-2 h4" aria-hidden="true">&times</span>
                    </button>
                    <button type="button" class=" cross button close dismiss-buttton" id="announcement-seen-unseen"
                            data-bs-dismiss="modal"
                            aria-label="Close">
                        <span class="hover-bg-color text-white fw-bold btn btn-primary"
                              aria-hidden="true">{{__('Close')}}</span>
                    </button>
                </div>
            </div>
            <div class="announcement-modal-box">
                <div class="modal-body" id="myModalLabel">
                    <p class="announcementText">{!! strip_tags(announcement(auth()->user()->tenant_id)) !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal area end -->


