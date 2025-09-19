@extends('frontend.layouts.app')
@push('title')
    {{ __('FAQ') }}
@endpush

@section('content')

    <section class="breadcrumb-section">
        <div class="breadcrumb-content bg-main-color">
            <h4 class="title">{{__("Faq's")}}</h4>
            <ol class="breadcrumb sf-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{__("Faq")}}</a></li>
            </ol>
        </div>
    </section>

    <!-- Frequently Asked Questions are start -->
    @if (count($faqCategories) > 0)
        <section class="frequent-question-area">
            <!-- title area start -->
            <div class="title-area">
                <div class="container">
                    <div class="row">
                        <div class="title-text">
                            <h2>{{__($section->title)}}</h2>
                            <p>{{__($section->description)}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- title area end -->
            <div class="container">
                <div class="row rg-20">
                    <div class="col-lg-4">
                        <div class="navigation-part">
                            <h3 class="fs-24 fw-600 lh-38 text-title-black pb-20 text-center text-lg-start">{{__('Quick Navigation')}}</h3>
                            <div class="navigation-button">
                                <nav>
                                    <div class="nav nav-tabs zTab-reset zTab-vertical-one flex-row flex-lg-column flex-wrap flex-lg-nowrap justify-content-center g-20" id="nav-tab" role="tablist">
                                        @foreach($faqCategories as $key => $faqCategory)
                                            <button class="nav-link {{$key==0?'active':''}}" id="nav-{{$key}}-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#nav-{{$key}}" type="button" role="tab"
                                                    aria-controls="nav-home"
                                                    aria-selected="true">{{$faqCategory->title}}
                                            </button>
                                        @endforeach
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($faqCategories as $key => $faqCategory)
                                <div class="tab-pane fade {{ ($key === 0) ? 'show active' : '' }}" id="nav-{{$key}}"
                                     role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="frequent-accordion">
                                        <div class="accordion" id="accordionExample{{$key}}">
                                            @foreach($faqs as $key=> $faq)
                                                @if($faq->faq_category_id == $faqCategory->id)
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapse{{$key}}-{{$faq->id}}"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapse{{$key}}-{{$faq->id}}">

                                                                {{ __($faq->question) }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{$key}}-{{$faq->id}}"
                                                             class="accordion-collapse collapse"
                                                             data-bs-parent="#accordionExample{{$key}}">
                                                            <div class="accordion-body">
                                                                {{ __($faq->answer) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="text-center py-5 my-5"><h3>{{__('No Data found')}}</h3></div>
    @endif

    <!-- Frequently Asked Questions are end -->
    <!-- faq area end -->
@endsection
