@extends('tenant.layouts.app')
@push('title')
    {{ __('Welcome') }}
@endpush
@section('content')
    <!-- hero area start -->
    <section class="breadcrumb-section bg-main-color py-30 py-sm-150">
        <div class="breadcrumb-content">
            <h4 class="title">{{__("Knowledge Category Details")}}</h4>
            <ol class="breadcrumb sf-inner-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tenant.knowledge') }}">{{__("Knowledge")}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('tenant.knowledge-category', $knowledgeDetails->id) }}">{{__("Knowledge Category")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{__("Knowledge Category Details")}}</a></li>
            </ol>
        </div>
    </section>
    <!-- hero area end -->
    <!-- category getting started area start -->

    <section class="py-sm-150 py-30 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center pb-30">
                        <h4 class="lh-sm-57 lh-44 landing-section-title pb-30">{{$knowledgeDetails->title}}</h4>
                        <ul class="d-flex align-items-center justify-content-center g-20 flex-wrap">
                            <li class="d-flex align-items-center g-5">
                                <div class="d-flex"><img src="{{asset('frontend')}}/assets//images/Calendar.svg" alt=""></div>
                                <p class="fs-16 fw-400 lh-24 text-para-text">{{ $knowledgeDetails->created_at->formatLocalized('%d-%B-%Y') }}</p>
                            </li>
                            <li class="d-flex align-items-center g-5">
                                <div class="d-flex"><img src="{{asset('frontend')}}/assets//images/Clipboard List.svg" alt=""></div>
                                <p class="fs-16 fw-400 lh-24 text-para-text">{{$knowledgeDetails->category_title}}</p>
                            </li>
                            <li class="d-flex align-items-center g-5">
                                <div class="d-flex"><img src="{{asset('frontend')}}/assets//images/view.svg" alt=""></div>
                                <p class="fs-16 fw-400 lh-24 text-para-text">{{$knowledgeDetails->user_count}}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-white p-sm-30 p-15 bd-ra-15">
                        <p class="fs-16 fw-400 lh-24 text-para-text">{!! $knowledgeDetails->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category getting started area end -->

    <!-- knowledge area start -->
    <section class="pb-sm-150 pb-30 position-relative z-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center pb-55">
                        <h4 class="lh-sm-57 lh-44 landing-section-title">{{__('Some of related categories')}}</h4>
                        <p class="fs-18 fw-400 lh-28 text-para-text pt-16">{{__('Quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam')}} <br> {{__('voluptatem quia voluptas sit aspernatur aut odit fugit')}}</p>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="row rg-20 pb-55">
                @foreach($knowledgeCategory as $key => $knowledgeCategorys)
                    <div class="col-lg-6 mb-4">
                        <div class="features-list-item">
                            <div class="icon">
                                <img src="{{ asset('frontend/assets/images/start-ic.png') }}" alt="">
                            </div>
                            <h4 class="title">{{ $knowledgeCategorys->title }}<span class="number ps-2">({{ $knowledgeCategorys->knowledge->count() }})</span>
                            </h4>
                            <p class="info">{{ substr($knowledgeCategorys->description, 0,  80) }}</p>
                            <ul class="list-wrap">
                                @foreach($knowledge as $knowledges)
                                    @if($knowledges->knowledge_category_id == $knowledgeCategorys->id)
                                        <li class="item">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('frontend/assets/images/pase-icon.png') }}" alt="">
                                            </div>
                                            <a href="{{route('tenant.knowledge-category-single', $knowledges->id)}}" class="title-link">{{ $knowledges->title }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <a href="{{ route('tenant.knowledge-category', $knowledgeCategorys->id) }}" class="link">{{ __('Explore More') }}<i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--  -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="single-knowledge-support text-center">
                        <h4 class="lh-sm-57 lh-44 landing-section-title">{{__("Looking for Support?")}}</h4>
                        <p class="fs-18 fw-400 lh-28 text-para-text pt-16 pb-30">{{__("Can't find the answer you're looking for? Don't worry we're here to solve your softtware problem!")}}</p>
                        <a class="py-17 px-33 bd-ra-48 d-inline-flex bg-main-color fs-18 fw-600 lh-22 text-white" href="{{route('tenant.contact.us.index')}}">{{__('Contact Support')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- knowledge text area end -->
@endsection
