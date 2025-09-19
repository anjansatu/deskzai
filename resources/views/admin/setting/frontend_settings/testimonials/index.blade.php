@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/image-preview.css') }}">
@endpush
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
            <div class="row rg-20">
                <input type="hidden" id="news-list-route"
                       value="{{ route('admin.setting.frontend.testimonial.index') }}">
                <div class="col-xl-3">
                    @include('admin.setting.partials.frontend-sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                        <!-- Search - Add -->
                        <div class="d-flex flex-column-reverse flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
                            <div class="flex-grow-1">
                                <div class="search-one flex-grow-1 max-w-282">
                                    <input type="text" id="testimonialsAdminSearch" placeholder="{{__('Search here')}}..."/>
                                    <button class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.71401 15.7857C12.6194 15.7857 15.7854 12.6197 15.7854 8.71428C15.7854 4.80884 12.6194 1.64285 8.71401 1.64285C4.80856 1.64285 1.64258 4.80884 1.64258 8.71428C1.64258 12.6197 4.80856 15.7857 8.71401 15.7857Z"
                                                stroke="#707070" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.3574 18.3571L13.8574 13.8571" stroke="#707070" stroke-width="1.35902"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
{{--                            <h2>{{ $pageTitle }}</h2>--}}
                            <button class="d-inline-flex bd-ra-8 bg-main-color py-8 px-26 fs-15 fw-600 lh-25 text-white" type="button" data-bs-toggle="modal" data-bs-target="#add-modal">
                                    {{ __('+ Add New') }}
                            </button>
                        </div>
{{--                        <div class="customers__table table-responsive">--}}
                            <table class="table zTable zTable-last-item-right" id="testimonialDataTable">
                                <thead>
                                    <tr>
                                        <th><div class="text-nowrap">{{ __('Company Logo') }}</div></th>
                                        <th><div class="text-nowrap">{{ __('Client Name') }}</div></th>
                                        <th><div class="text-nowrap">{{ __('Client Image') }}</div></th>
                                        <th><div>{{ __('Designation') }}</div></th>
                                        <th><div>{{ __('Status') }}</div></th>
                                        <th><div>{{ __('Action') }}</div></th>
                                    </tr>
                                </thead>
                            </table>
{{--                        </div>--}}
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
                    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add New') }}</h5>
                        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                    </div>

                    <form class="ajax reset" action="{{ route('admin.setting.frontend.testimonial.store') }}" method="post"
                          data-handler="commonResponseForModal">
                        @csrf

                            <div class="row rg-24">
                                <div class="col-12">
                                    <label class="zForm-label" for="title">{{ __('Client Name') }} <span class="text-danger">*</span></label>
                                    <input class="zForm-control" type="text" name="name" placeholder="{{ __('Client Name') }}">
                                </div>
                                <div class="col-12">
                                    <label class="zForm-label" for="description">{{ __('Designation') }} <span class="text-danger">*</span></label>
                                    <textarea class="zForm-control" name="designation" id=""></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="description">{{ __('Comment') }} <span class="text-danger">*</span></label>
                                    <textarea class="zForm-control" name="comment" id=""></textarea>
                                </div>
                                <div class="col-md-12 mb-25">
                                    <label class="zForm-label">{{ __('Review') }}</label>
                                    <input type="number" name="star" class="zForm-control" placeholder="{{ __('Star') }}">
                                </div>
                                <div class="col-12">
                                    <label class="zForm-label">{{ __('Status') }}</label>
                                    <select name="status" class="form-select zForm-control">
                                        <option value="1">{{ __('Active') }}</option>
                                        <option value="0">{{ __('Deactive') }}</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="col-12">
                                            <label for="icon" class="zForm-label"> {{ __('Client Image') }} <span class="text-danger">*</span></label>
                                            <div class="upload-img-box">
                                                <img src="{{ getDefaultImage() }}">
                                                <input type="file" name="image" accept="image/*" onchange="previewFile(this)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col-12">
                                            <label for="icon" class="zForm-label"> {{ __('Company Logo') }} <span class="text-danger">*</span></label>
                                            <div class="upload-img-box">
                                                <img src="{{ getDefaultImage() }}">
                                                <input type="file" name="logo" accept="image/*" onchange="previewFile(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Save') }}</button>
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
    <script src="{{ asset('admin/js/custom/testimonial.js') }}"></script>
    <script src="{{ asset('admin/js/custom/image-preview.js') }}"></script>
@endpush
