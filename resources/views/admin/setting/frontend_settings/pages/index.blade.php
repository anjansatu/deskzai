@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote-lite.min.css') }}"/>
@endpush
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <input type="hidden" id="pages-list-route" value="{{ route('admin.setting.frontend.pages.index') }}">
            <div class="col-xl-3">
                @include('admin.setting.partials.frontend-sidebar')
            </div>
            <div class="col-xl-9">
                <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                    <table class="table zTable zTable-last-item-right" id="pageDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div>{{ __('Type') }}</div>
                            </th>
                            <th>
                                <div>{{ __('Title') }}</div>
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
        <!-- Edit Modal section start -->
        <div class="modal fade" id="edit-modal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content bd-c-stroke bd-one bd-ra-10 p-sm-25 p-15">

                </div>
            </div>
        </div>


    </div>
@endsection
@push('script')
    <script src="{{ asset('admin/libs/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/pages.js') }}"></script>
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
@endpush
