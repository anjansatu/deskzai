@extends('admin.layouts.app')

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        @if(isAddonInstalled('DESKSAAS') > 0)
            @if(auth()->user()->role == USER_ROLE_SUPER_ADMIN)
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="status__box__img">
                                <img src="{{ asset('admin/images/status-icon/expense.png') }}" alt="icon">
                            </div>
                            <div class="status__box__text">
                                <h2 class="color-blue">{{$newUser}}</h2>
                                <h3>{{__("New User")}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="status__box__img">
                                <img src="{{ asset('admin/images/status-icon/revenue.png') }}" alt="icon">
                            </div>
                            <div class="status__box__text">
                                <h2 class="color-red">{{$suspendedUser}}</h2>
                                <h3>{{__("Suspended User")}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="status__box__img">
                                <img src="{{ asset('admin/images/status-icon/expense.png') }}" alt="icon">
                            </div>
                            <div class="status__box__text">
                                <h2 class="color-blue">{{$deletedUser}}</h2>
                                <h3>{{__("Deleted User")}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="status__box__img">
                                <img src="{{ asset('admin/images/status-icon/revenue.png') }}" alt="icon">
                            </div>
                            <div class="status__box__text">
                                <h2 class="color-red">{{$pendingOrder}}</h2>
                                <h3>{{__("Pending Order")}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chart start -->
                <div class="">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="content-wrap">
                                <div class="section-top-title">
                                    <h2 class="title">{{__("Monthly  Order Summery")}}</h2>
                                </div>
                                <div class="single-ticket-count justify-content-center">
                                    <div id="container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chart end -->
            @else
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="right-box-ticket">
                                <div class="ticket-img-box rectangle">
                                    <img src="{{asset('agent')}}/assets/images/green.png" alt=""/>
                                </div>
                                <p>{{__("Total Tickets")}}</p>
                                <h1>{{$totalTicketCount}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="right-box-ticket">
                                <div class="ticket-img-box indianRed">
                                    <img src="{{asset('agent')}}/assets/images/red.png" alt=""/>
                                </div>
                                <p>{{__("Active Tickets")}}</p>
                                <h1>{{$activeTicketCount}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="right-box-ticket">
                                <div class="ticket-img-box mediumSlateBlue">
                                    <img src="{{asset('agent')}}/assets/images/yel.png" alt=""/>
                                </div>
                                <p>{{__("Recent Tickets")}}</p>
                                <h1>{{$recentTicketCount}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="right-box-ticket">
                                <div class="ticket-img-box mediumPurple">
                                    <img src="{{asset('agent')}}/assets/images/greenline.png" alt=""/>
                                </div>
                                <p>{{__("My Assigned Tickets")}}</p>
                                <h1>{{$myAssignTicketCount}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="right-box-ticket">
                                <div class="ticket-img-box orangeBg">
                                    <img src="{{asset('agent')}}/assets/images/orange.png" alt=""/>
                                </div>
                                <p>{{__("Resolved Tickets")}}</p>
                                <h1>{{$onHoldTicketCount}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="status__box status__box__v3 bg-style">
                            <div class="right-box-ticket">
                                <div class="ticket-img-box lightYellow">
                                    <img src="{{asset('agent')}}/assets/images/yellow.png" alt=""/>
                                </div>
                                <p>{{__("Closed Tickets")}}</p>
                                <h1>{{$closedTicketCount}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chart start -->
                <div class="">
                    <div class="row">
                        <div class="col-lg-8 col-xl-8">
                            <div class="content-wrap">
                                <div class="section-top-title">
                                    <h2 class="title">{{__("Monthly Summery")}}</h2>
                                </div>
                                <div class="single-ticket-count justify-content-center">
                                    <div id="container"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-xl-4">
                            <div class="content-wrap">
                                <div class="section-top-title">
                                    <h2 class="title">{{__("Summery by Categories")}}</h2>
                                </div>
                                <div class="single-ticket-count justify-content-center">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- chart end -->
                <div class="">
                    <div class="row">

                        <!-- ticket summery area start -->

                        <div class="col-lg-12 col-xl-12">
                            <div class="content-wrap">
                                <div class="section-top-title">
                                    <h2 class="title">{{__("Active Tickets")}}</h2>
                                </div>
                                <div class="">
                                    <input type="hidden" id="ticket-list-route" value="{{ $targetDataUrl }}">
                                    <div class="customers__table">
                                        <table class="table zTable zTable-last-item-right"
                                               id="ticketManagementDataTable">
                                            <thead>
                                            <tr>
                                                <th>
                                                    <div class="text-nowrap">{{ __("Ticket Id") }}</div>
                                                </th>
                                                <th>
                                                    <div class="text-nowrap">{{ __('Ticket Details') }}</div>
                                                </th>
                                                <th>
                                                    <div class="text-nowrap">{{ __('Created By') }}</div>
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
                            </div>
                        </div>
                        <!-- ticket summery area end -->

                    </div>
                </div>
            @endif
        @else
            <div class="mb-30 bd-one bd-c-stroke bd-ra-10 p-30 bg-white">
                <div class="count-item-one">
                    <div class="row justify-content-xl-start justify-content-xxl-between rg-13">
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                            <div class="item d-flex flex-row cg-13 rg-13">
                                <div
                                    class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-purple-10">
                                    <img src="{{asset('main_assets')}}/images/icon/ticket-total.svg" alt=""/>
                                </div>
                                <div class="content">
                                    <h4 class="fs-15 fw-500 lh-18 text-para-text pb-5">{{ __('Total Tickets') }}</h4>
                                    <p class="fs-18 fw-500 lh-21 text-title-black">{{$totalTicketCount}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                            <div class="item d-flex flex-row cg-13 rg-13">
                                <div
                                    class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-main-color-10">
                                    <img src="{{asset('main_assets')}}/images/icon/ticket-active.svg" alt=""/>
                                </div>
                                <div class="content">
                                    <h4 class="fs-15 fw-500 lh-18 text-para-text pb-5">{{__("Active Tickets")}}</h4>
                                    <p class="fs-18 fw-500 lh-21 text-title-black">{{$activeTicketCount}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                            <div class="item d-flex flex-row cg-13 rg-13">
                                <div
                                    class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-color1-10">
                                    <img src="{{asset('main_assets')}}/images/icon/ticket-recent.svg" alt=""/>
                                </div>
                                <div class="content">
                                    <h4 class="fs-15 fw-500 lh-18 text-para-text pb-5">{{__("Recent Tickets")}}</h4>
                                    <p class="fs-18 fw-500 lh-21 text-title-black">{{$recentTicketCount}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                            <div class="item d-flex flex-row cg-13 rg-13">
                                <div
                                    class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-green-10">
                                    <img src="{{asset('main_assets')}}/images/icon/ticket-assigned.svg" alt=""/>
                                </div>
                                <div class="content">
                                    <h4 class="fs-15 fw-500 lh-18 text-para-text pb-5">{{__("My Assigned Tickets")}}</h4>
                                    <p class="fs-18 fw-500 lh-21 text-title-black">{{$myAssignTicketCount}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                            <div class="item d-flex flex-row cg-13 rg-13">
                                <div
                                    class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-color2-10">
                                    <img src="{{asset('main_assets')}}/images/icon/ticket-resolved.svg" alt=""/>
                                </div>
                                <div class="content">
                                    <h4 class="fs-15 fw-500 lh-18 text-para-text pb-5">{{__("Resolved Tickets")}}</h4>
                                    <p class="fs-18 fw-500 lh-21 text-title-black">{{$onHoldTicketCount}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                            <div class="item d-flex flex-row cg-13 rg-13">
                                <div
                                    class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-color2-10">
                                    <img src="{{asset('main_assets')}}/images/icon/ticket-closed.svg" alt=""/>
                                </div>
                                <div class="content">
                                    <h4 class="fs-15 fw-500 lh-18 text-para-text pb-5">{{__("Closed Tickets")}}</h4>
                                    <p class="fs-18 fw-500 lh-21 text-title-black">{{$closedTicketCount}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- chart start -->
            <div class="pb-30">
                <div class="row rg-24">
                    <div class="col-lg-12 col-xl-8 ">
                        <div class="p-25 bd-one bd-c-stroke bd-ra-10 bg-white h-100">
                            <div class="d-flex justify-content-between align-items-center g-10 pb-20">
                                <h4 class="fs-18 fw-500 lh-22 text-title-black">{{__("Monthly Summery")}}</h4>
                            </div>
                            <div class="single-ticket-count justify-content-center">
                                <div id="container"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-xl-4 ">
                        <div class="p-25 bd-one bd-c-stroke bd-ra-10 bg-white h-100">
                            <div class="d-flex justify-content-between align-items-center g-10 pb-20">
                                <h4 class="fs-18 fw-500 lh-22 text-title-black">{{ __('Summery by Categories') }}</h4>
                            </div>
                            <div class="single-ticket-count justify-content-center ad-pie-chart">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- chart end -->
            <!-- ticket summery area start -->
            <div class="col-lg-12 col-xl-12">
                <div class="p-25 bd-one bd-c-stroke bd-ra-10 bg-white">
                    <div class="d-flex justify-content-between align-items-center g-10 pb-20">
                        <h4 class="fs-18 fw-500 lh-22 text-title-black">{{ __('Active Tickets') }}</h4>
                    </div>
                    <div class="">
                        <input type="hidden" id="ticket-list-route" value="{{ $targetDataUrl }}">
                        <div class="customers__table">
                            <table
                                class="table zTable zTable-last-item-right"
                                id="ticketManagementDataTable">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="text-nowrap">{{ __("Ticket Id") }}</div>
                                    </th>
                                    <th>
                                        <div class="text-nowrap">{{ __('Ticket Details') }}</div>
                                    </th>
                                    <th>
                                        <div class="text-nowrap">{{ __('Created By') }}</div>
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
                </div>
            </div>
        @endif
    </div>

    <!-- Ticket View Modal section start -->
    <div class="modal fade" id="ticket-view-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">
            </div>
        </div>
    </div>
    <!-- Ticket View section end -->
    <input type="hidden" id="ticketAssignToUrl" value="{{ route('admin.tickets.ticketAssignTo') }}">
    <!-- Ticket Assign section start -->
    <div class="modal fade" id="ticketAssignModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">
            </div>
        </div>
    </div>
    <!-- Ticket Assign section end -->
@endsection
@push('script')
    <script src="{{ asset('admin/libs/datatable/datatables.min.js') }}"></script>
    <script src="{{config('app.chart_link')}}"></script>
    <script src="{{asset('assets/js/plugin/anychart.min.js')}}"></script>
    <script>

        $('#ticketManagementDataTable').DataTable({
            pageLength: 25,
            ordering: false,
            serverSide: true,
            processing: true,
            responsive: true,
            searing: false,
            ajax: $('#ticket-list-route').val(),
            language: {
                paginate: {
                    previous: "<span class='iconify' data-icon='material-symbols:chevron-left-rounded'></span>",
                    next: "<span class='iconify' data-icon='material-symbols:chevron-right-rounded'></span>",
                },
                searchPlaceholder: "Search",
                search: ""
            },
            dom: '<>tr<"tableBottom"<"row"<"col-sm-6"i><"col-sm-6"p>>><"clear">',
            columns: [
                {"data": 'ticket_id', "name": 'tracking_no'},
                {"data": "ticket_title", "name": "ticket_title", className: "min-w-300"},
                {"data": "created_by", "name": "users.name"},
                {"data": "updated", "name": "updated", className: "min-w-95", searchable: false, orderable: false},
                {
                    "data": "assigned_to",
                    "name": "assigned_to",
                    searchable: false,
                    orderable: false,
                    className: "min-w-95"
                },
                {"data": "action", searchable: false, orderable: false, responsivePriority: 2},
            ],
            columnDefs: [
                {
                    targets: [3, 4],
                    visible: false,
                },
            ],
        });

        var options = {
            series: [
                    @foreach($chart as $key=>$chartData)
                {
                    name: '{{$key}}',
                    data: [@foreach($chartData as $item) {{$item}},@endforeach]
                },
                @endforeach
            ],

            colors: ['#6659FF', '#17d1dc', '#ffb82a', '#1EBD53', '#FF794D', '#B20FB4'],
            dataLabels: {
                enabled: false,
                textAnchor: "left",
                formatter: function (_val, opt) {
                    let series = opt.w.config.series
                    let idx = opt.dataPointIndex
                    const total = series.reduce((total, self) => total + self.data[idx], 0)
                    return total;
                },
                style: {
                    colors: ["#596680"]
                }
            },
            chart: {
                type: 'bar',
                height: '500px',
                stacked: true,
                toolbar: {
                    show: true
                },
                zoom: {
                    enabled: true
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 10,
                    dataLabels: {
                        total: {
                            enabled: true,
                            style: {
                                fontSize: '13px',
                                fontWeight: 900
                            }
                        }
                    }
                },
            },
            xaxis: {
                categories: [@foreach($day as $item) '{{$item}}',@endforeach],
            },
            legend: {
                position: 'right',
                offsetY: 40
            },
            fill: {
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.querySelector("#container"), options);
        chart.render();
    </script>
    <script>

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'pie',
            responsive: true,
            maintainAspectRatio: false,
            data: {
                labels: [@foreach($categoryChart as $key=>$item) '{{$item['category_name']}}', @endforeach],
                datasets: [{
                    label: 'Chart',
                    data: [@foreach($categoryChart as $key=>$item) '{{$item['total']}}', @endforeach],
                    backgroundColor: [
                        '#6659FF', '#17d1dc', '#ffb82a', '#1EBD53', '#FF794D'
                    ],
                    hoverOffset: 4
                }],
            }

        });
    </script>
@endpush
