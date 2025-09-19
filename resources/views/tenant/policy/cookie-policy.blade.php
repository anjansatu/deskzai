@extends('tenant.layouts.app')
@push('title')
    {{ __($page->title) }}
@endpush
@section('content')
    <!-- breadcrumb area start here  -->
    py-30 py-sm-150
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
