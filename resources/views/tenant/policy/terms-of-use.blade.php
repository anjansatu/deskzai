@extends('tenant.layouts.app')
@push('title')
    {{ __($page?->title) }}
@endpush
@section('content')

    <section class="breadcrumb-section bg-main-color py-30 py-sm-150">
        <div class="breadcrumb-content">
            <h4 class="title">{{__("Terms Of Use")}}</h4>
            <ol class="breadcrumb sf-inner-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{__("Terms Of Use")}}</a></li>
            </ol>
        </div>
    </section>
    <!-- breadcrumb area start here  -->
    <!-- breadcrumb area end here  -->
    <section class="py-sm-150 py-30">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="single-policy-info">
                        @if ($page?->description)
                            {!! $page?->description !!}
                        @else
                            <p class="text-center">{{__("No Data Found!")}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
