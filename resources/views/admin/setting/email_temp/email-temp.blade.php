@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/image-preview.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote-lite.min.css') }}"/>
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!-- Title - Search -->
        <div
            class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
            <h2 class="fs-24 fw-500 lh-34 text-black">{{ $pageTitle }}</h2>
            <div class="flex-grow-1 max-w-282">
                <div class="search-one flex-grow-1">
                    <input type="text" id="emailTempAdminTableSearch" placeholder="{{__('Search here')}}..."/>
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
        </div>
        <input type="hidden" id="news-list-route" value="{{ route('admin.blogs.index') }}">
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <input type="hidden" value="{{route('admin.setting.email-template')}}" id="email-temp-route">
            <table class="table zTable zTable-last-item-right" id="emailTempDataTable">
                <thead>
                <tr>
                    <th>
                        <div>{{ __('Category') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Subject') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Body') }}</div>
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
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/email-temp.js') }}"></script>
@endpush
