@extends('agent.layouts.app')
@push('title')
    {{ __('Profile') }}
@endpush

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@section('content')
    <!-- Right Content Start -->
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-24 fw-500 lh-34 text-black pb-18">{{ $pageTitle }}</h4>
        <!-- dashboard area start -->

        {{--            <section class="dashboard-area">--}}
        {{--                <div class="container-fluid">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="col-md-12">--}}
        {{--                            <div class="dashboard-box">--}}
        {{--                                <div class="title-area">--}}
        {{--                                    <div class="dashboard-text">--}}
        {{--                                        <h2>{{$pageTitle}}</h2>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </section>--}}

        <!-- dashboard area end -->


        <!-- profile information start-->

{{--        <section>--}}
{{--            <div class="container-fluid">--}}
{{--                <div class="profile-info">--}}
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-20">
                        <form class="form-horizontal ajax"
                              action="{{route('agent.envato.license-verification-action')}}" method="POST"
                              enctype="multipart/form-data" data-handler="licenseVerificationHandler">
                            @csrf
{{--                            <div class="row align-items-end row-gap-4">--}}
{{--                                <div class="col-md-8 col-lg-10 mb-25">--}}
{{--                                    <div class="user-info-from mb-0">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <label class="zForm-label">{{__('Envato License')}} <span>*</span></label>
                                <input type="text" name="envato_license" class="zForm-control" required>
                                <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{__("Verify")}}</button>
{{--                            </div>--}}
                        </form>
                    </div>
{{--                    <div class="row">--}}
{{--                        <div class="col-xxl-8 col-lg-8 mb-8">--}}
{{--                            <div id="envatoData">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}


        <!-- profile information end-->
    </div>

@endsection
@push('script')
    <script src="{{ asset('agent/assets/js/custom/envato_configuration.js') }}"></script>
@endpush
