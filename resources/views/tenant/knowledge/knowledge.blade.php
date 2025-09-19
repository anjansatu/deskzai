@extends('tenant.layouts.app')
@push('title')
    {{ __('Welcome') }}
@endpush
@section('content')
    <!-- hero area start -->
    <section class="breadcrumb-section bg-main-color py-30 py-sm-150">
        <div class="breadcrumb-content">
            <h4 class="title">{{__("Knowledge")}}</h4>
            <ol class="breadcrumb sf-inner-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{__("Knowledge")}}</a></li>
            </ol>
        </div>
    </section>
    <!-- hero area end -->


    @if ($section['knowledge_area'] != null && $section['knowledge_area']->status==STATUS_ACTIVE)
        <section class="py-sm-150 py-30 position-relative z-1">
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
                            <input type="search" name="query" placeholder="{{ __('Search for questions or topics...') }}">
                            <button class="secrch-btu">{{__('Search Here')}}</button>
                        </div>
                    </form>
                </div>
                <!--  -->
                <div class="row rg-20 pb-55">
                    @if(empty($searchKnowledgeCategory))
                        @foreach($knowledgeCategory as $knowledgeCategorys)
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
                                                        <img src="{{ asset('frontend/assets/images/pase-icon.png') }}" alt="">
                                                    </div>
                                                    <a class="title-link" href="{{route('tenant.knowledge-category-single', $knowledges->id)}}">{{ $knowledges->title }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('tenant.knowledge-category', $knowledgeCategorys->id) }}" class="link">{{ __('Explore More') }}<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @forelse ( $searchKnowledgeCategory as $knowledges)

                            <div class="col-lg-6">
                                <div class="features-list-item">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/images/start-ic.png') }}" alt="">
                                    </div>
                                    <h4 class="title">{{ $knowledges->category_title }}</h4>
                                    <p class="info">{{ substr($knowledges->category_desc, 0,  80) }}</p>
                                    <ul class="list-wrap">
                                        <li class="item">
                                            <div class="flex-shrink-0">
                                                <img src="{{ asset('frontend/assets/images/pase-icon.png') }}" alt="">
                                            </div>
                                            <a class="title-link" href="{{route('tenant.knowledge-category-single', $knowledges->id)}}">{{ $knowledges->title }}</a>
                                        </li>
                                    </ul>
                                    <a href="{{ route('tenant.knowledge-category', $knowledges->category_id) }}" class="link">{{ __('Explore More') }}<i class="fa-solid fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        @empty
                            <div class="text-dark text-center mb-5"><h3>{{__('No data match')}}</h3></div>
                        @endforelse
                    @endif
                </div>
                <!--  -->
                <div class="row justify-content-center">
                    @if($lookingSupport['looking_support_area'] != null && $lookingSupport['looking_support_area']->status==STATUS_ACTIVE)
                        <div class="col-lg-6">
                            <div class="single-knowledge-support text-center">
                                <h4 class="lh-sm-57 lh-44 landing-section-title">{{$lookingSupport['looking_support_area']->title}}</h4>
                                <p class="fs-18 fw-400 lh-28 text-para-text pt-16 pb-30">{{$lookingSupport['looking_support_area']->description}}</p>
                                <a class="py-17 px-33 bd-ra-48 d-inline-flex bg-main-color fs-18 fw-600 lh-22 text-white" href="{{route('tenant.contact.us.index')}}">{{__('Contact Support')}}</a>
                                {{--                            <div class="single-knowledge-support-img">--}}
                                {{--                                <img src="{{asset('frontend')}}/assets//images/OBJECTS .png" alt="">--}}
                                {{--                            </div>--}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

@endsection
