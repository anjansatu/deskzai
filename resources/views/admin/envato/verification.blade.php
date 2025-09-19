@extends('admin.layouts.app')
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-24 fw-500 lh-34 text-black pb-18">{{ $pageTitle }}</h4>
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-20">
            <form class="ajax" action="{{route('admin.envato.license-verification-action')}}" method="POST"
                  enctype="multipart/form-data" data-handler="licenseVerificationHandler">
                @csrf

                <label class="zForm-label">{{__('Envato License')}} <span class="text-danger">*</span></label>
                <input type="text" name="envato_license" class="zForm-control" required>
                <button type="submit"
                        class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{__('Verify')}}</button>

            </form>
            <div class="row">
                <div class="col-xxl-8 col-lg-8 mb-8">
                    <div id="envatoData">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
    <!-- Configuration section start -->
    <div class="modal fade main-modal" id="configureModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">

            </div>
        </div>
    </div>
    <!-- Configuration section end -->
    <!-- Help section start -->
    <div class="modal fade main-modal" id="helpModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">

            </div>
        </div>
    </div>
    <!-- Help section end -->

@endsection
@push('script')
    <script src="{{ asset('admin/js/custom/envato_configuration.js') }}"></script>
@endpush
