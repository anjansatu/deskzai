@extends('customer.layouts.app')
@push('title')
    {{ __('Dashboard') }}
@endpush
@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="d-flex justify-content-between align-items-start flex-wrap g-20 pb-26">
            <div class="">
                <div class="d-flex align-items-center cg-15 pb-16">
                    <h4 class="fs-24 fw-600 lh-29 text-title-black">{{auth()->user()->name}}</h4>
                    <span class="d-flex"><img src="{{ asset('main_assets/images/icon/hand-wave.svg') }}" alt=""></span>
                </div>
                <p class="">{{__("Welcome back")}}</p>
            </div>
            <a class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white d-none d-sm-inline-flex align-items-center g-10"
               href="{{route('customer.ticket.create-ticket')}}"> {{__("Create Ticket")}}</a>
        </div>

        <!-- dashboard area start -->
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

        <!-- ticket summery area start -->
        <div class="p-25 bd-one bd-c-stroke bd-ra-10 bg-white h-100">
            <div class="d-flex justify-content-between align-items-center g-10 pb-20">
                <h2 class="fs-18 fw-500 lh-22 text-title-black">{{__("Ticket Summery")}}</h2>
            </div>
            <input type="hidden" value="{{route('customer.dashboard')}}" id="ticket-url">

            <form action="{{route('customer.ticket.ticket-multi-delete')}}" method="post" class="form-horizontal"
                  enctype="multipart/form-data" id="deleteForm">
                @csrf
                <table class="table zTable zTable-last-item-right" id="ticketsDataTable">
                    <thead>
                    <tr>
                        <th>
                            <div class="text-nowrap">{{ __('Ticket Id') }}</div>
                        </th>
                        <th>
                            <div class="text-nowrap">{{ __('Ticket Title') }}</div>
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
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{asset('admin/libs/datatable/user-tables.min.js')}}"></script>
    <script src="{{asset('customer/assets/js/custom/tickets.js') }}"></script>

@endpush


