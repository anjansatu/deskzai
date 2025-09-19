@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/image-preview.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote-lite.min.css') }}"/>
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <input type="hidden" id="news-list-route" value="{{ route('admin.blogs.index') }}">
        <div
            class="d-flex flex-column-reverse flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
            <h4 class="fs-24 fw-500 lh-34 text-title-black">{{__('Custom page')}}</h4>

            <button class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white" type="button"
                    data-bs-toggle="modal" data-bs-target="#add-modal">
                <i class="fa fa-plus"></i> {{ __('Add New') }}
            </button>
        </div>
        <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <input type="hidden" value="{{route('admin.custom-pages')}}" id="pages-list-route">
            <table class="table zTable zTable-last-item-right" id="customPageDataTable">
                <thead>
                <tr>
                    <th>
                        <div>{{ __('Title') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Link') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Status') }}</div>
                    </th>
                    <th>
                        <div class="text-nowrap">{{ __('Created Date') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Action') }}</div>
                    </th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- Page content area end -->

    <!-- Add Modal section start -->
    <div class="modal fade" id="add-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                <div class="p-sm-25 p-15">
                    <div
                        class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add New') }}</h5>
                        <button type="button"
                                class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                    </div>

                    <form class="ajax reset" action="{{ route('admin.custom-pages-store') }}" method="post"
                          data-handler="commonResponseForModal">
                        @csrf

                        <div class="row rg-24">
                            <div class="col-md-12">
                                <label class="zForm-label" for="title">{{ __('Title') }} <span
                                        class="text-danger">*</span></label>
                                <input class="zForm-control" type="text" name="title" placeholder="{{ __('Title') }}">
                            </div>

                            <div class="col-md-12">
                                <label class="zForm-label">{{__('Details')}} <span class="text-danger">*</span></label>
                                <textarea name="details" class="summernoteOne"
                                          placeholder="{{ __("Details") }}"></textarea>
                            </div>

                            <div class="col-md-12">

                                <label class="zForm-label">{{ __('Status') }} <span class="text-danger">*</span></label>
                                <select name="status" class="form-select zForm-control">
                                    <option value="1">{{ __('Publish') }}</option>
                                    <option value="0">{{ __('Unpublish') }}</option>
                                </select>
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
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">

            </div>
        </div>
    </div>
    <!-- Edit Modal section end -->

@endsection

@push('script')
    <script src="{{ asset('admin/libs/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/image-preview.js') }}"></script>
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/blogs.js') }}"></script>
    <script src="{{ asset('admin/js/custom/pages.js') }}"></script>
    <script src="{{ asset('admin/js/custom/summernote-init.js') }}"></script>
@endpush
