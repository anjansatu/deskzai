@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/image-preview.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/custom/frontend.css')}}"/>
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row rg-20">
            <input type="hidden" id="frontend-section" value="{{ route('admin.setting.frontend.index') }}">
            <div class="col-xl-3">
                @include('admin.setting.partials.frontend-sidebar')
            </div>
            <div class="col-xl-9">
                <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                    <table class="table zTable zTable-last-item-right" id="commonDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div>{{ __("SL") }}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{ __("Section Name") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Title") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Image") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Status") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Action") }}</div>
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Page content area end -->
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
    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/frontend-section.js')}}"></script>
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush
