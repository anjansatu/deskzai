@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div
            class="d-flex flex-column-reverse flex-md-row justify-content-center justify-content-md-between align-items-center align-items-md-start flex-wrap g-10 table-pl">
            <!-- Left -->
            <ul class="nav nav-tabs zTab-reset zTab-four flex-wrap pl-sm-20" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="userAgent-tab" data-bs-toggle="tab"
                            data-bs-target="#userAgent-tab-pane" type="button" role="tab"
                            aria-controls="userAgent-tab-pane" aria-selected="true">Agent
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="userCustomer-tab" data-bs-toggle="tab"
                            data-bs-target="#userCustomer-tab-pane" type="button" role="tab"
                            aria-controls="userCustomer-tab-pane" aria-selected="false">Customer
                    </button>
                </li>
            </ul>
            <!-- Right -->
            <a href="{{route('admin.user.add-new')}}"
               class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white">{{__('+ Add User')}}</a>
        </div>
        <!--  -->
        <div class="tab-content" id="myTabContent">
            <!-- Agent -->
            <div class="tab-pane fade show active" id="userAgent-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                 tabindex="0">
                <div class="bg-white bd-one bd-c-stroke bd-ra-10 p-sm-30 p-15">
                    <input type="hidden" id="user-route" value="{{ route('admin.user.list') }}">
                    <table class="table zTable zTable-last-item-right" id="commonDataTable">
                        <thead>
                        <tr>
                            <th>
                                <div>{{ __("Picture ") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Name") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Email") }}</div>
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
            <!-- Customer -->
            <div class="tab-pane fade" id="userCustomer-tab-pane" role="tabpanel" aria-labelledby="userCustomer-tab"
                 tabindex="0">
                <input type="hidden" id="user-route-for-customer" value="{{ route('admin.user.customer.list') }}">
                <div class="bg-white bd-one bd-c-stroke bd-ra-10 p-sm-30 p-15">
                    <table class="table zTable zTable-last-item-right" id="commonDataTableForCustomer">
                        <thead>
                        <tr>
                            <th>
                                <div>{{ __("Picture") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Name") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Email") }}</div>
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
@endsection

@push('script')

    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/user.js')}}"></script>
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>

@endpush
