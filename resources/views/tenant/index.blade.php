@extends('tenant.layouts.app')
@push('title')
    {{ __('Welcome') }}
@endpush
@section('content')
    <div class="overflow-hidden">
        <!-- hero area start -->
        @if($section['hero_banner'] != null && $section['hero_banner']->status==STATUS_ACTIVE)
            <section class="pb-sm-150 pt-sm-64 py-30 landing-banner-wrap position-relative z-1">
                <div class="item-1"></div>
                <div class="item-2"></div>
                <div class="item-3"></div>
                <div class="item-4"></div>
                <div class="item-5"></div>
                <div class="container">
                    <div class="row justify-content-center pb-30">
                        <div class="col-lg-8">
                            <div class="text-center">
                                <p class="landing-section-subtitle">{{__('Streamline Your Agency')}}</p>
                                <h4 class="landing-section-title pb-15">{{__($section['hero_banner']->title)}}</h4>
                                <p class="max-w-640 m-auto fs-18 fw-400 lh-28 text-para-text pb-24">{{__($section['hero_banner']->description)}}</p>
                                <form method="get" action="{{route('tenant.search')}}" class="search-form">
                                    <div class="search-box home-searchBox shadow-sm">
                                        <input type="search" name="search"
                                               placeholder="{{__("Search for questions or topics...")}}">
                                        <button type="submit" class="secrch-btu">{{("Search Here")}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="landing-hero-content">
                        <div class="img text-center"><img src="{{getFileUrl($section['hero_banner']->image)}}" alt="">
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- hero area end -->

        <!-- logical area start -->

        @if($section['features_area'] != null && $section['features_area']->status == STATUS_ACTIVE)
            <section class="pb-sm-150 pb-30 landing-feature-wrap">
                <div class="item-1"></div>
                <div class="item-2"></div>
                <div class="item-3"></div>
                <div class="item-4"></div>
                <div class="item-5"></div>
                <div class="item-6"></div>
                <div class="item-7"></div>
                <div class="item-8"></div>
                <div class="item-9"></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center pb-55">
                                <p class="landing-section-subtitle">Features</p>
                                <h4 class="lh-sm-57 lh-44 landing-section-title">{{__($section['features_area']->title)}}</h4>
                                <p class="max-w-640 m-auto fs-18 fw-400 lh-28 text-para-text pt-16">{{__($section['features_area']->description)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row rg-30">
                        <div class="col-lg-4 col-sm-6">
                            <div class="features-list-item align-items-center text-center">
                                <div class="icon bg-purple-10">
                                    <img src="{{ asset(getFileUrl(count($featureObj)>0?$featureObj[0]->icon:null)) }}"
                                         alt="">
                                </div>
                                <h4 class="title">{{__(count($featureObj)>0?$featureObj[0]->title:null)}}</h4>
                                <p class="info pb-0">{{__(count($featureObj)>0?$featureObj[0]->description:null)}}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="features-list-item align-items-center text-center">
                                <div class="icon bg-purple-10">
                                    <img src="{{asset(getFileUrl(count($featureObj)>1?$featureObj[1]->icon:null))}}"
                                         alt="">
                                </div>
                                <h4 class="title">{{__(count($featureObj)>1?$featureObj[1]->title:null)}}</h4>
                                <p class="info pb-0">{{__(count($featureObj)>1?$featureObj[1]->description:null)}}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="features-list-item align-items-center text-center">
                                <div class="icon bg-purple-10">
                                    <img src="{{asset(getFileUrl(count($featureObj)>2?$featureObj[2]->icon:null))}}"
                                         alt="">
                                </div>
                                <h4 class="title">{{__(count($featureObj)>2?$featureObj[2]->title:null)}}</h4>
                                <p class="info pb-0">{{__(count($featureObj)>2?$featureObj[2]->description:null)}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!--knowledge area start -->

        @if ($section['knowledge_area'] != null && $section['knowledge_area']->status==STATUS_ACTIVE)
            <section class="pb-sm-150 pb-30 position-relative z-1">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="text-center pb-55">
                                <h4 class="lh-sm-57 lh-44 landing-section-title">{{$section['knowledge_area']->title}}</h4>
                                <p class="fs-18 fw-400 lh-28 text-para-text pt-16">{{$section['knowledge_area']->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="pb-55">
                        <form action="{{route('tenant.searchKnowledge')}}" type="get" class="search-form bread ">
                            <div class="search-box home-searchBox shadow-sm">
                                <input type="search" name="query" placeholder="{{ __('Search') }}">
                                <button class="secrch-btu">{{__('Search Here')}}</button>
                            </div>
                        </form>
                    </div>
                    <!--  -->
                    <div class="row rg-20 pb-55">
                        @foreach($knowledgeCategory as $key => $knowledgeCategorys)
                            <div class="col-lg-6">
                                <div class="features-list-item">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/start-ic.png') }}" alt="">
                                    </div>
                                    <h4 class="title">{{ $knowledgeCategorys->title }}<span class="number ps-2">({{ $knowledgeCategorys->knowledge->count() }})</span>
                                    </h4>
                                    <p class="info">{{ substr($knowledgeCategorys->description, 0,  150) }}</p>
                                    <ul class="list-wrap">
                                        @foreach($knowledge as $knowledges)
                                            @if($knowledges->knowledge_category_id == $knowledgeCategorys->id)
                                                <li class="item">
                                                    <div class="flex-shrink-0">
                                                        <img
                                                            src="{{ asset('frontend/assets/images/pase-icon.png') }}"
                                                            alt="">
                                                    </div>
                                                    <a class="title-link"
                                                       href="{{route('tenant.knowledge-category-single', $knowledges->id)}}">{{ $knowledges->title }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('tenant.knowledge-category', $knowledgeCategorys->id) }}"
                                       class="link">{{ __('Explore More') }}<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--  -->
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="single-knowledge-support text-center">
                                <h4 class="lh-sm-57 lh-44 landing-section-title">{{$section['looking_support_area']->title}}</h4>
                                <p class="fs-18 fw-400 lh-28 text-para-text pt-16 pb-30">{{$section['looking_support_area']->description}}</p>
                                <a class="py-17 px-33 bd-ra-48 d-inline-flex bg-main-color fs-18 fw-600 lh-22 text-white"
                                   href="{{route('tenant.contact.us.index')}}">Contact Support</a>
                                {{--                            <div class="single-knowledge-support-img">--}}
                                {{--                                <img src="{{asset('frontend')}}/assets//images/OBJECTS .png" alt="">--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- knowledge area end-->

        <!-- Testimonial Start -->
        @if($section['testimonial_area'] != null && $section['testimonial_area']->status==STATUS_ACTIVE)
            <section class="py-sm-150 py-30 bg-color6 position-relative z-1 overflow-hidden" id="testimonial">
                <div class="container">
                    <!-- title area start -->
                    {{--            <div class="title-area">--}}
                    {{--                <div class="container">--}}
                    {{--                    <div class="row">--}}
                    {{--                        <div class="title-text">--}}
                    {{--                            <h2></h2>--}}
                    {{--                            <p>{{__($section['testimonial_area']->description)}}</p>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}
                    <!-- title area end -->

                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="text-center pb-55">
                                <p class="landing-section-subtitle bg-white-8">{{ __('Testimonials') }}</p>
                                <h4 class="lh-sm-57 lh-44 landing-section-title landing-section-title-1 text-white">{{__($section['testimonial_area']->title)}}</h4>
                            </div>
                        </div>
                    </div>

                    {{--            <div class="user-review">--}}
                    {{--                <div class="container">--}}
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-md-12">--}}
                    {{--                            <div class="user-box owl-carousel">--}}
                    {{--                                @foreach($testimonial as $testimonials)--}}
                    {{--                                    <div class="single-slider">--}}
                    {{--                                        <div class="review">--}}
                    {{--                                            @for ($i = 0; $i < $testimonials->star; $i++)--}}
                    {{--                                                <i class="fa-solid fa-star"></i>--}}
                    {{--                                            @endfor--}}
                    {{--                                            @for ($i = 0; $i < (5 - $testimonials->star); $i++)--}}
                    {{--                                                <i class="fa-regular fa-star"></i>--}}
                    {{--                                            @endfor--}}
                    {{--                                        </div>--}}
                    {{--                                        <p>{{__($testimonials->comment)}}</p>--}}
                    {{--                                        <div class="user-info">--}}
                    {{--                                            <h2>{{__($testimonials->name)}}</h2>--}}
                    {{--                                            <p>{{__($testimonials->designation)}}</p>--}}

                    {{--                                            <div class="user-logo">--}}
                    {{--                                                <img src="{{ asset(getFileUrl($testimonials->logo)) }}" alt="">--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="user-img">--}}
                    {{--                                            <img src="{{ asset(getFileUrl($testimonials->image)) }}" alt="">--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                @endforeach--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                    {{--            </div>--}}

                    <div class="landing-testimonial-wrap">
                        <div class="swiper ldTestiItems">
                            <div class="swiper-wrapper">
                                @foreach($testimonial as $testimonials)
                                    <div class="swiper-slide">
                                        <div class="landing-testimonial-item">
                                            <div class="top">
                                                <div class="user">
                                                    <div class="img">
                                                        <img src="{{ asset(getFileUrl($testimonials->image)) }}" alt="">
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="name">{{__($testimonials->name)}}</h4>
                                                        <p class="userUrl">{{__($testimonials->designation)}}</p>
                                                    </div>
                                                </div>
                                                <div class="icon">
                                                    <img src="{{ asset('main_assets/images/icon/quote-ld.svg') }}"
                                                         alt="{{ getOption('app_name') }}"/>
                                                </div>
                                            </div>
                                            <p class="text">{{__($testimonials->comment)}}</p>
                                            <div class="bottom cg-10">
                                                <div class="content">
                                                    <img src="{{ asset(getFileUrl($testimonials->logo)) }}" alt="">
                                                </div>
                                                <ul class="ld-testi-rating">
                                                    <li>
                                                        @for ($i = 0; $i < $testimonials->star; $i++)
                                                            <i class="fa-solid fa-star"></i>
                                                        @endfor
                                                        @for ($i = 0; $i < (5 - $testimonials->star); $i++)
                                                            <i class="fa-regular fa-star"></i>
                                                        @endfor
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="arrowControl">
                                <div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>
                                <div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-- Testimonial end -->

        <!-- Frequently Asked Questions are start -->
        @if($section['faq_area'] != null && $section['faq_area']->status==STATUS_ACTIVE)
            <section class="py-sm-150 py-30 landing-faq-wrap">
                <div class="item-1"></div>
                <div class="item-2"></div>
                <div class="item-3"></div>
                <div class="item-4"></div>
                <div class="item-5"></div>
                <!-- title area start -->
                {{--        <div class="title-area">--}}
                {{--            <div class="container">--}}
                {{--                <div class="row">--}}
                {{--                    <div class="title-text">--}}
                {{--                        <h2></h2>--}}
                {{--                        <p>{{__($section['faq_area']->description)}}</p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--            </div>--}}
                {{--        </div>--}}


                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="text-center pb-55">
                                <p class="landing-section-subtitle">{{ __("FAQ's") }}</p>
                                <h4 class="lh-sm-57 lh-44 landing-section-title">{{__($section['faq_area']->title)}}</h4>
                                <p class="fs-18 fw-400 lh-28 text-para-text pt-16">{{__($section['faq_area']->description)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row rg-20">
                        <div class="col-lg-4">
                            <div class="navigation-part sf-navigation-part">
                                @if (count($faqCategory) > 0)
                                    <h3 class="fs-24 fw-600 lh-38 text-title-black pb-20 text-center text-lg-start">{{__('Quick Navigation')}}</h3>
                                @endif
                                <div class="navigation-button">
                                    <nav>
                                        <div
                                            class="nav nav-tabs zTab-reset zTab-vertical-one flex-row flex-lg-column flex-wrap flex-lg-nowrap justify-content-center g-20"
                                            id="nav-tab" role="tablist">
                                            @foreach($faqCategory as $key => $faqCategorys)
                                                <button class="nav-link {{$key==0?'active':''}}" id="nav-{{$key}}-tab"
                                                        data-bs-toggle="tab"
                                                        data-bs-target="#nav-{{$key}}" type="button" role="tab"
                                                        aria-controls="nav-home"
                                                        aria-selected="true">{{$faqCategorys->title}}
                                                </button>
                                            @endforeach
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="tab-content" id="nav-tabContent">

                                @foreach($faqCategory as $key=> $cate_item)
                                    @php $category_faq_counter = 0; @endphp
                                    <div class="tab-pane fade show {{$key==0?'active':''}}" id="nav-{{$key}}"
                                         role="tabpanel"
                                         aria-labelledby="nav-{{$key}}-tab">

                                        <div class="accordion zAccordion-reset zAccordion-one"
                                             id="accordionExample{{$key}}">
                                            @foreach($faqs as $key2 => $faq)
                                                @if($cate_item->id == $faq->faq_category_id )
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button
                                                                class="accordion-button {{$category_faq_counter==0?'':'collapsed'}}"
                                                                type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapse{{$key2}}"
                                                                aria-expanded="{{$category_faq_counter==0?'true':'false'}}"
                                                                aria-controls="collapse{{$key2}}">
                                                                {{$faq->question}}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{$key2}}"
                                                             class="accordion-collapse collapse {{ ($category_faq_counter === 0) ? 'show' : '' }}"
                                                             data-bs-parent="#accordionExample{{$key}}">
                                                            <div class="accordion-body">
                                                                {{$faq->answer}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php $category_faq_counter = $category_faq_counter + 1; @endphp
                                                @else
                                                    @php $category_faq_counter = 0; @endphp
                                                @endif

                                            @endforeach
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </section>
        @endif
        <!-- Frequently Asked Questions are end -->

        <!-- support houre area start -->
        @if($section['need_support_area'] != null && $section['need_support_area']->status==STATUS_ACTIVE)
            <section class="cta-section pb-sm-150 pb-30">
                <div class="container">
                    {{--            <div class="cta-content" data-background="{{asset('frontend/assets/images/banner.png')}}">--}}
                    <div class="cta-content bg-white bd-ra-12">
                        <div class="left">
                            <h4 class="lh-sm-57 lh-44 landing-section-title">{{__($section['need_support_area']->title)}}</h4>
                            <p class="fs-18 fw-400 lh-28 text-para-text pt-16 pb-20">{{__($section['need_support_area']->description)}}</p>
                            <a href="{{route('ticket.guest-create-ticket')}}"
                               class="py-17 px-33 bd-ra-48 d-inline-flex bg-main-color fs-18 fw-600 lh-22 text-white">{{__("Open Ticket")}}</a>
                        </div>
                    </div>
                    {{--                <div class="row">--}}
                    {{--                    <div class="col-md-12">--}}
                    {{--                        <div class="support-bg">--}}
                    {{--                            <h2>{{__($section['need_support_area']->title)}}</h2>--}}
                    {{--                            <p>{{__($section['need_support_area']->description)}}</p>--}}
                    {{--                            <button class="mt-5"><a class="text-white" href="{{route('ticket.guest-create-ticket')}}">{{__("open ticket")}}</a></button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}
                </div>
            </section>
        @endif
        <!-- support houre area end -->
    </div>

@endsection
