@extends('tenant.layouts.app')
@push('title')
    {{ __($page->title) }}
@endpush
@section('content')
    <!-- breadcrumb area start here  -->
    <section class="breadcrumb-section bg-main-color py-30 py-sm-150">
        <div class="breadcrumb-content">
            <h4 class="title">{{ __($page->title) }}</h4>
            <ol class="breadcrumb sf-inner-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{ __($page->title) }}</a></li>
            </ol>
        </div>
    </section>
    <!-- breadcrumb area end here  -->
    <section class="section-space">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="single-policy-info">
                        @if ($page->description)
                            {!! $page->description !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
