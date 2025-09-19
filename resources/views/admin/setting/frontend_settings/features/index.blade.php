@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/image-preview.css') }}">
@endpush
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <input type="hidden" id="news-list-route" value="{{ route('admin.setting.frontend.feature.index') }}">
            <div class="col-xl-3">
                @include('admin.setting.partials.frontend-sidebar')
            </div>
            <div class="col-xl-9">
                <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                    <table class="table zTable zTable-last-item-right" id="featureDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div>{{ __('Image') }}</div>
                            </th>
                            <th>
                                <div>{{ __('Title') }}</div>
                            </th>
                            <th>
                                <div>{{ __('Status') }}</div>
                            </th>
                            <th>
                                <div>{{ __('Action') }}</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Page content area end -->
    <!-- Add Modal section start -->
    <div class="modal fade" id="add-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                <div class="p-sm-25 p-15">
                    <div
                        class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add New') }}</h5>
                        <button type="button"
                                class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                    </div>
                    <form class="ajax reset" action="{{ route('admin.setting.frontend.feature.store') }}" method="post"
                          data-handler="commonResponseForModal">
                        @csrf

                        <div class="row rg-24">
                            <div class="col-12">
                                <label class="zForm-label" for="title">{{ __('Title') }} <span
                                        class="text-danger">*</span></label>
                                <input class="zForm-control" type="text" name="title" placeholder="{{ __('Title') }}">
                            </div>
                            <div class="col-12">
                                <label class="zForm-label" for="description">{{ __('Description') }} <span
                                        class="text-danger">*</span></label>
                                <textarea class="zForm-control" name="description" rows="5" id=""></textarea>
                            </div>
                            <div class="col-12">
                                <label for="icon" class="zForm-label"> {{ __('Icon') }} <span
                                        class="text-danger">*</span></label>
                                <div class="upload-img-box">
                                    <img src="{{ getDefaultImage() }}">
                                    <input type="file" name="icon" accept="image/*" onchange="previewFile(this)">
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                                class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Save') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal section end -->
    <!-- Edit Modal section start -->
    <div class="modal fade" id="edit-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">

            </div>
        </div>
    </div>
    <!-- Edit Modal section end -->
@endsection

@push('script')
    <script src="{{ asset('admin/libs/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/feature.js') }}"></script>
    <script src="{{ asset('admin/js/custom/image-preview.js') }}"></script>
@endpush
