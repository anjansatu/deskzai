@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/image-preview.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/frontend.css') }}"/>
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!-- Title - Search -->
        <div
            class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
            <h4 class="fs-24 fw-500 lh-34 text-black">{{ $pageTitle }}</h4>
            <div class="flex-grow-1 max-w-282">
                <div class="search-one flex-grow-1">
                    <input type="text" id="ticketManagementDataTableSearch" placeholder="{{__('Search here')}}..."/>
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
        <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <input type="hidden" id="self-assigned-tickets" value="{{ route('admin.tickets.my-assigned-tickets') }}">
            <table class="table zTable zTable-last-item-right" id="ticketManagementDataTable">
                <thead>
                <tr>
                    <th>
                        <div>{{ __("Ticket Id") }}</div>
                    </th>
                    <th>
                        <div class="text-nowrap">{{ __('Ticket Details') }}</div>
                    </th>
                    <th>
                        <div>{{ __('User') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Updated') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Assigned') }}</div>
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

@endsection

@push('script')
    <script src="{{ asset('admin/libs/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/image-preview.js') }}"></script>
    <script>
        $(document).on('change', '#assign_to', function () {

            let val = $(this).val();
            var ticketId = $(this).attr("data-id");
            var targetUrl = "{{ route('admin.tickets.ticketAssignTo') }}" + '?ticketId=' + ticketId;
            var modalId = '#ticketAssignModal';
            var modalUrl = $(this).attr("modal-url");
            if (val == 'others') {
                $.ajax({
                    type: 'GET',
                    url: modalUrl,
                    success: function (data) {
                        $(document).find(modalId).find('.modal-content').html(data);
                        $(modalId).modal('toggle');
                        $(document).ready(function () {
                            $(".sf-select").select2({
                                dropdownCssClass: "sf-select-dropdown",
                                selectionCssClass: "sf-select-section",
                            });
                        });
                    },
                    error: function (error) {
                        toastr.error(error.responseJSON.message)
                    }
                })
            } else if (val == 'self') {
                $.ajax({
                    type: 'GET',
                    url: targetUrl,
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status === true) {
                            toastr.success(data.message);
                        } else {
                            toastr.error("Something Went Wrong!");
                        }
                    },
                    error: function (error) {
                        toastr.error(error.responseJSON.message)
                    }
                });
            }
        });

        (function ($) {
            "use strict";
            var ticketManagementAdminTableSerch
            $(document).on('input', '#ticketManagementDataTableSearch', function () {
                ticketManagementAdminTableSerch.search($(this).val()).draw();
            });
            ticketManagementAdminTableSerch = $('#ticketManagementDataTable').DataTable({
                pageLength: 25,
                ordering: false,
                serverSide: true,
                processing: true,
                searing: false,
                responsive: true,
                ajax: $('#self-assigned-tickets').val(),
                language: {
                    paginate: {
                        previous: "<span class='iconify' data-icon='material-symbols:chevron-left-rounded'></span>",
                        next: "<span class='iconify' data-icon='material-symbols:chevron-right-rounded'></span>",
                    },
                    searchPlaceholder: "Search",
                    search: ""
                },
                dom: '<>tr<"bottom"<"row"<"col-sm-6"i><"col-sm-6"p>>><"clear">',
                columns: [
                    {"data": 'ticket_id', "name": 'tracking_no'},
                    {"data": "ticket_title", "name": "ticket_title"},
                    {"data": "created_by", "name": "created_by"},
                    {"data": "updated", "name": "updated", searchable: false},
                    {"data": "assigned_to", "name": "assigned_to"},
                    {"data": "action", searchable: false, responsivePriority: 2},
                ]
            });
        })(jQuery)
    </script>
@endpush
