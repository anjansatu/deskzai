@extends('agent.layouts.app')
@push('title')
    {{ __('Deleted Ticket') }}
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!-- Title - Search -->
        <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
            <h4 class="fs-24 fw-500 lh-34 text-black">{{ $pageTitle }}</h4>
            <div class="flex-grow-1 max-w-282">
                <div class="search-one flex-grow-1">
                    <input type="text" id="ticketsDeletedDataTableSearch" placeholder="{{__('Search here')}}..."/>
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

        <!-- dashboard area start -->

        {{--            <section class="dashboard-area">--}}
        {{--                <div class="container-fluid">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="col-md-12">--}}
        {{--                            <div class="dashboard-box">--}}
        {{--                                <div class="title-area mb-0">--}}
        {{--                                    <div class="dashboard-text">--}}
        {{--                                        <h2>{{$pageTitle}}</h2>--}}
        {{--                                    </div>--}}
        {{--                                    <div class="ticket-btu">--}}
        {{--                                        <a class="ticket-btu-com"--}}
        {{--                                           href="{{route('agent.ticket.create-ticket')}}"> {{__("Create Ticket")}}</a>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </section>--}}

        <!-- dashboard area end -->


        {{--        <div class="container-fluid">--}}
        {{--            <div class="row">--}}

        <!-- ticket summery area start -->


        {{--                <div class="col-lg-12 col-xl-12">--}}
        {{--                    <div class="content-wrap">--}}
        {{--                        <div class="section-top-title">--}}
        {{--                            <h2 class="title">{{$pageTitle}}</h2>--}}
        {{--                        </div>--}}
        {{--                        <div class="table-responsive">--}}
        {{--                                <button class="deleteData" id="deleteData"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">--}}
        {{--                                        <path d="M2 4H3.33333H14" stroke="#737C90" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>--}}
        {{--                                        <path d="M5.33203 4.00004V2.66671C5.33203 2.31309 5.47251 1.97395 5.72256 1.7239C5.9726 1.47385 6.31174 1.33337 6.66536 1.33337H9.33203C9.68565 1.33337 10.0248 1.47385 10.2748 1.7239C10.5249 1.97395 10.6654 2.31309 10.6654 2.66671V4.00004M12.6654 4.00004V13.3334C12.6654 13.687 12.5249 14.0261 12.2748 14.2762C12.0248 14.5262 11.6857 14.6667 11.332 14.6667H4.66536C4.31174 14.6667 3.9726 14.5262 3.72256 14.2762C3.47251 14.0261 3.33203 13.687 3.33203 13.3334V4.00004H12.6654Z" stroke="#737C90" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>--}}
        {{--                                        <path d="M6.66797 7.33337V11.3334" stroke="#737C90" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>--}}
        {{--                                        <path d="M9.33203 7.33337V11.3334" stroke="#737C90" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>--}}
        {{--                                    </svg> {{__("Delete")}}</button>--}}
        <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <input type="hidden" value="{{route('agent.ticket.deleted-tickets')}}" id="ticket-url">
            <form action="{{route('agent.ticket.deleted-tickets')}}" method="post"
                  class="form-horizontal"
                  enctype="multipart/form-data" id="deleteForm">
                @csrf
                <table class="table zTable zTable-last-item-right" id="ticketsDeletedDataTable">
                    <thead>
                    <tr>
                        <th>
                            <div class="text-nowrap">{{ __('Ticket Id') }}</div>
                        </th>
                        <th>
                            <div class="text-nowrap">{{ __('Ticket Title') }}</div>
                        </th>
                        <th>
                            <div class="text-nowrap">{{ __('Created By') }}</div>
                        </th>
                        <th>
                            <div class="text-nowrap">{{ __('Created By Email') }}</div>
                        </th>
                        <th>
                            <div>{{ __('Category') }}</div>
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
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        <!-- ticket summery area end -->

    </div>
@endsection

@push('script')
    <script src="{{asset('admin/libs/datatable/user-tables.min.js')}}"></script>
    <script src="{{asset('agent/assets/js/custom/tickets.js') }}"></script>
@endpush
