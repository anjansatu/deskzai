@extends('agent.layouts.app')
@push('title')
    {{ __('Dashboard') }}
@endpush

@section('content')
    <input type="hidden" id="get-daily-chart-data" value="{{route('agent.dashboard-daily-ticket-chart')}}">
    <input type="hidden" id="get-category-chart-data" value="{{route('agent.dashboard-category-chart')}}">
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">

            <!-- dashboard area start -->
{{--            <section class="dashboard-area">--}}
{{--                <div class="container-fluid">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="dashboard-box">--}}
{{--                                <div class="title-area">--}}
{{--                                    <div class="dashboard-text">--}}
{{--                                        <h2 class="fs-24 fw-600 lh-29 text-title-black">{{__("Analytics2")}}</h2>--}}
{{--                                        <p>{{__("Welcome back")}}, {{auth()->user()->name}}</p>--}}
{{--                                        <img src="{{asset('agent')}}/assets/images/waving-hand 1.png" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
            <!-- dashboard area end -->

        <div class="pb-26">
            <div class="d-flex align-items-center cg-15 pb-16">
                <h4 class="fs-24 fw-600 lh-29 text-title-black">{{__("Analytics2")}}</h4>
                <span class="d-flex"><img src="{{ asset('main_assets/images/icon/hand-wave.svg') }}" alt=""></span>
            </div>
            <p class="">{{__("Welcome back")}}, {{auth()->user()->name}}</p>
        </div>

        <!-- all ticket count start -->
        <div class="mb-30 bd-one bd-c-stroke bd-ra-10 p-30 bg-white">
            <div class="count-item-one">
                <div class="row justify-content-xl-start justify-content-xxl-between rg-13">
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                        <div class="item d-flex flex-row cg-13 rg-13">
                            <div class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-purple-10">
                                <img src="{{asset('main_assets')}}/images/icon/ticket-total.svg" alt="" />
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
                                <img src="{{asset('main_assets')}}/images/icon/ticket-active.svg" alt="" />
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
                                <img src="{{asset('main_assets')}}/images/icon/ticket-recent.svg" alt="" />
                            </div>
                            <div class="content">
                                <h4 class="fs-15 fw-500 lh-18 text-para-text pb-5">{{__("Recent Tickets")}}</h4>
                                <p class="fs-18 fw-500 lh-21 text-title-black">{{$recentTicketCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                        <div class="item d-flex flex-row cg-13 rg-13">
                            <div class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-green-10">
                                <img src="{{asset('main_assets')}}/images/icon/ticket-assigned.svg" alt="" />
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
                                <img src="{{asset('main_assets')}}/images/icon/ticket-resolved.svg" alt="" />
                            </div>
                            <div class="content">
                                <h4 class="fs-15 fw-500 lh-18 text-para-text pb-5">{{__("Resolved Tickets")}}</h4>
                                <p class="fs-18 fw-500 lh-21 text-title-black">{{$onHoldTicketCount}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 col-xxl-auto">
                        <div class="item d-flex flex-row cg-13 rg-13">
                            <div class="icon w-48 h-48 bd-ra-8 flex-shrink-0 d-flex justify-content-center align-items-center bg-color2-10">
                                <img src="{{asset('main_assets')}}/images/icon/ticket-closed.svg" alt="" />
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
        <!-- all ticket count end -->

        <!-- chart start -->
        <div class="pb-30">
            <div class="row rg-24">
                <div class="col-lg-12 col-xl-8">
                    <div class="p-25 bd-one bd-c-stroke bd-ra-10 bg-white h-100">
                        <div class="d-flex justify-content-between align-items-center g-10 pb-20">
                            <h4 class="fs-18 fw-500 lh-22 text-title-black">{{__("Monthly Summery")}}</h4>
                        </div>
                        <div class="single-ticket-count justify-content-center pb-0">
                            <div id="container"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-xl-4">
                    <div class="p-25 bd-one bd-c-stroke bd-ra-10 bg-white h-100">
                        <div class="d-flex justify-content-between align-items-center g-10 pb-20">
                            <h4 class="fs-18 fw-500 lh-22 text-title-black">{{__("Summery by Categories")}}</h4>
                        </div>
                        <div class="single-ticket-count justify-content-center pb-0">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- chart end -->

        <div class="p-25 bd-one bd-c-stroke bd-ra-10 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center g-10 pb-20">
                <h4 class="fs-18 fw-500 lh-22 text-title-black">Active Tickets</h4>
            </div>
{{--            <div class="table-responsive">--}}
{{--                <button class="deleteData" id="deleteData">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"--}}
{{--                         fill="none">--}}
{{--                        <path d="M2 4H3.33333H14" stroke="#737C90" stroke-width="1.4"--}}
{{--                              stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        <path--}}
{{--                            d="M5.33203 4.00004V2.66671C5.33203 2.31309 5.47251 1.97395 5.72256 1.7239C5.9726 1.47385 6.31174 1.33337 6.66536 1.33337H9.33203C9.68565 1.33337 10.0248 1.47385 10.2748 1.7239C10.5249 1.97395 10.6654 2.31309 10.6654 2.66671V4.00004M12.6654 4.00004V13.3334C12.6654 13.687 12.5249 14.0261 12.2748 14.2762C12.0248 14.5262 11.6857 14.6667 11.332 14.6667H4.66536C4.31174 14.6667 3.9726 14.5262 3.72256 14.2762C3.47251 14.0261 3.33203 13.687 3.33203 13.3334V4.00004H12.6654Z"--}}
{{--                            stroke="#737C90" stroke-width="1.4" stroke-linecap="round"--}}
{{--                            stroke-linejoin="round"/>--}}
{{--                        <path d="M6.66797 7.33337V11.3334" stroke="#737C90" stroke-width="1.4"--}}
{{--                              stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                        <path d="M9.33203 7.33337V11.3334" stroke="#737C90" stroke-width="1.4"--}}
{{--                              stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                    </svg>--}}
{{--                    {{__("Delete")}}--}}
{{--                </button>--}}
                <input type="hidden" value="{{route('agent.dashboard')}}" id="ticket-url">

                <form action="{{route('agent.ticket.ticket-multi-delete')}}" method="post"
                      class="form-horizontal"
                      enctype="multipart/form-data" id="deleteForm">
                    @csrf
                    <table class="table zTable zTable-last-item-right" id="ticketsDataTable">
                        <thead>
                            <tr>
    {{--                            <th>--}}
    {{--                                <div class="round">--}}
    {{--                                    <input type="checkbox" id="allCheck"/>--}}
    {{--                                    <label for="allCheck" class="top-0"></label>--}}
    {{--                                </div>--}}
    {{--                            </th>--}}
                                <th><div class="text-nowrap">{{ __('Ticket Id') }}</div></th>
                                <th><div class="text-nowrap">{{ __('Ticket Title') }}</div></th>
                                <th><div class="text-nowrap">{{ __('Created By') }}</div></th>
                                <th><div class="text-nowrap">{{ __('Created By Email') }}</div></th>
                                <th><div>{{ __('Category') }}</div></th>
                                <th><div>{{ __('Updated') }}</div></th>
                                <th><div>{{ __('Assigned') }}</div></th>
                                <th><div>{{ __('Action') }}</div></th>
                            </tr>
                        </thead>
                    </table>
                </form>

{{--            </div>--}}
        </div>

    </div>


@endsection

@push('script')
    <script src="{{asset('admin/libs/datatable/user-tables.min.js')}}"></script>
    <script src="{{config('app.chart_link')}}"></script>
    <script src="{{asset('assets/js/plugin/anychart.min.js')}}"></script>
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{asset('agent/assets/js/custom/tickets.js') }}"></script>
    <script>
        (function($){
            "use strict";

        var options = {
            series: [
                    @foreach($chart as $key=>$chartData)
                {
                    name: '{{$key}}',
                    data: [@foreach($chartData as $item) {{$item}},@endforeach]
                },
                @endforeach
            ],

            colors: ['#6659FF', '#17d1dc', '#ffb82a','#1EBD53','#FF794D','#B20FB4'],
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
                        '#6659FF', '#17d1dc', '#ffb82a','#1EBD53','#FF794D'
                    ],
                    hoverOffset: 4
                }],
            }

        });
        })(jQuery);
    </script>
@endpush
