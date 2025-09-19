@extends('tenant.layouts.app')
@push('title')
    {{ __('FAQ') }}
@endpush
@section('content')

    <section class="breadcrumb-section bg-main-color py-30 py-sm-150">
        <div class="breadcrumb-content">
            <h4 class="title">{{__($pageTitle)}}</h4>
            <ol class="breadcrumb sf-inner-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{__($pageTitle)}}</a></li>
            </ol>
        </div>
    </section>
    <!-- Frequently Asked Questions are start -->

    <section class="py-sm-150 py-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    @if(count($faqs)>0)
                        <div class="accordion zAccordion-reset zAccordion-one" id="accordionExample1">
                            @foreach($faqs as $key2 => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{$key2}}"
                                                aria-expanded="{{$key2==0?'true':'false'}}"
                                                aria-controls="collapse{{$key2}}">
                                            {{$faq->question}}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$key2}}" class="accordion-collapse collapse {{ ($key2 === 0) ? 'show' : '' }}"
                                         data-bs-parent="#accordionExample1">
                                        <div class="accordion-body">
                                            {{$faq->answer}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    @else
                        <h3 class="text-center"><i class="fa fa-meh text-dark"></i> No Data Found!</h3>
                    @endif
                </div>
            </div>
        </div>

    </section>

    <!-- Frequently Asked Questions are end -->
@endsection
