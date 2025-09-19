@extends('tenant.layouts.app')
@push('title')
    {{ __('FAQ') }}
@endpush
@section('content')

    <section class="breadcrumb-section bg-main-color py-30 py-sm-150">
        <div class="breadcrumb-content">
            <h4 class="title">{{__("Faq's")}}</h4>
            <ol class="breadcrumb sf-inner-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{__("Faq")}}</a></li>
            </ol>
        </div>
    </section>
    <!-- Frequently Asked Questions are start -->


    @if (count($faqCategory) > 0)

        <section class="py-sm-150 py-30 ">
            <!-- title area start -->
{{--            <div class="title-area">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="title-text">--}}
{{--                            <h2>{{$section->title}}</h2>--}}
{{--                            <p>{{$section->description}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- title area end -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="text-center pb-55">
                            <h4 class="lh-sm-57 lh-44 landing-section-title">{{$section->title}}</h4>
                            <p class="fs-18 fw-400 lh-28 text-para-text pt-16">{{$section->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="row rg-20">
                    <div class="col-lg-4">
                        <div class="navigation-part">
                            <h3 class="fs-24 fw-600 lh-38 text-title-black pb-20 text-center text-lg-start">{{__('Quick Navigation')}}</h3>
                            <div class="navigation-button">
                                <nav>
                                    <div class="nav nav-tabs zTab-reset zTab-vertical-one flex-row flex-lg-column flex-wrap flex-lg-nowrap justify-content-center g-20" id="nav-tab" role="tablist">
                                        @foreach($faqCategory as $key => $faqCategorys)
                                            <button class="nav-link {{$key==0?'active':''}}" id="nav-{{$key}}-tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#nav-{{$key}}" type="button" role="tab"
                                                    aria-controls="nav-{{$key}}"
                                                    aria-selected="{{$key==0?'true':'false'}}">{{$faqCategorys->title}}</button>
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
                                <div class="tab-pane fade show {{$key==0?'active':''}}" id="nav-{{$key}}" role="tabpanel"
                                     aria-labelledby="nav-{{$key}}-tab">


                                        <div class="accordion zAccordion-reset zAccordion-one" id="accordionExample{{$key}}">
                                            @foreach($faqs as $key2 => $faq)
                                                @if($cate_item->id == $faq->faq_category_id )
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button {{$category_faq_counter==0?'':'collapsed'}}" type="button"
                                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{$key2}}"
                                                                    aria-expanded="{{$category_faq_counter==0?'true':'false'}}"
                                                                    aria-controls="collapse{{$key2}}">
                                                                {{$faq->question}}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{$key2}}" class="accordion-collapse collapse {{ ($category_faq_counter === 0) ? 'show' : '' }}"
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

    @else
        <div class="text-center py-5 my-5"><h3>No Data found</h3></div>
    @endif


  <!-- Frequently Asked Questions are end -->
@endsection
