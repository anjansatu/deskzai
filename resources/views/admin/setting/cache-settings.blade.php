@extends('admin.layouts.app')

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <div class="col-xl-3">
                @include('admin.setting.partials.general-sidebar')
            </div>
            <div class="col-xl-9">
                <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                    <h4 class="fs-18 fw-600 lh-22 text-title-black pb-16 text-center text-sm-start">{{ __(@$pageTitle) }}</h4>
                    <div
                        class="custom-form-group d-flex justify-content-between align-items-center g-10 mb-10 flex-column flex-sm-row">
                        <p class="fs-16 fw-400 lh-22 text-title-black">{{ __('Clear View Cache') }}</p>
                        <a href="{{ route('admin.setting.cache-update', 1) }}"
                           class="d-inline-block fs-15 fw-500 lh-25 text-white py-10 px-26 bg-main-color hover-bg-one bd-ra-12">{{ __('Click Here') }}</a>
                    </div>
                    <div
                        class="custom-form-group d-flex justify-content-between align-items-center g-10 mb-10 flex-column flex-sm-row">
                        <p class="fs-16 fw-400 lh-22 text-title-black">{{ __('Clear Route Cache') }} </p>
                        <a href="{{ route('admin.setting.cache-update', 2) }}"
                           class="d-inline-block fs-15 fw-500 lh-25 text-white py-10 px-26 bg-main-color hover-bg-one bd-ra-12">{{ __('Click Here') }}</a>
                    </div>
                    <div
                        class="custom-form-group d-flex justify-content-between align-items-center g-10 mb-10 flex-column flex-sm-row">
                        <p class="fs-16 fw-400 lh-22 text-title-black">{{ __('Clear Config Cache') }} </p>
                        <a href="{{ route('admin.setting.cache-update', 3) }}"
                           class="d-inline-block fs-15 fw-500 lh-25 text-white py-10 px-26 bg-main-color hover-bg-one bd-ra-12">{{ __('Click Here') }}</a>
                    </div>
                    <div
                        class="custom-form-group d-flex justify-content-between align-items-center g-10 mb-10 flex-column flex-sm-row">
                        <p class="fs-16 fw-400 lh-22 text-title-black">{{ __('Application Clear Cache') }} </p>
                        <a href="{{ route('admin.setting.cache-update', 4) }}"
                           class="d-inline-block fs-15 fw-500 lh-25 text-white py-10 px-26 bg-main-color hover-bg-one bd-ra-12">{{ __('Click Here') }}</a>
                    </div>
                    <div
                        class="custom-form-group d-flex justify-content-between align-items-center g-10 mb-10 flex-column flex-sm-row">
                        <p class="fs-16 fw-400 lh-22 text-title-black">{{ __('Storage Link') }} </p>
                        <a href="{{ route('admin.setting.cache-update', 5) }}"
                           class="d-inline-block fs-15 fw-500 lh-25 text-white py-10 px-26 bg-main-color hover-bg-one bd-ra-12">{{ __('Click Here') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection
