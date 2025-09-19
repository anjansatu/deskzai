@extends('customer.layouts.app')
@push('title')
    {{ __('View Tickets') }}
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="page-content">
            <!-- View Ticket start-->
            <section class="view-ticket-area">
                <div class="row rg-24">
                    <div class="col-lg-8">
                        <div class="allPostUser">
                            <!-- Ticket Assign Tags Start -->
                            @include('customer.tickets.ticket_details.assign-tag')
                            <!-- Ticket Assign Tags End -->
                            <!-- Ticket Conversation Start -->
                            @include('customer.tickets.ticket_details.conversation')
                            <!-- Ticket Conversation End -->
                        </div>
                        <!-- Conversation List Start -->
                        <div class="d-flex flex-column g-24">
                            @include('customer.tickets.ticket_details.conversation-list')
                        </div>
                        <!-- Conversation List End -->
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column g-16">
                            <!-- Ticket Info Start -->
                            @include('customer.tickets.ticket_details.ticket-info')
                            <!-- Ticket Info end -->
                            <!-- Customer Details Start -->
                            @include('customer.tickets.ticket_details.agent-details')
                            <!-- Customer Details end -->
                        </div>
                    </div>
                    <span id="instantnoneClick"></span>
                </div>
            </section>
        </div>
        <!-- View Ticket end-->
    </div>
    <!--ticketReview modal area start -->
    @if(getOption('agent_rating_status') == 1)
        @include('customer.tickets.ticket_details.rating-modal')
    @endif
    <!--ticketReview modal area end -->
@endsection

@push('script')
    <script src="{{asset('admin/libs/datatable/user-tables.min.js')}}"></script>
    <script src="{{asset('customer/assets/js/custom/tickets.js') }}"></script>
    <script type="text/javascript" src="{{ asset('agent/assets/js/custom.js')}}"></script>
    <script src="{{ asset('admin/js/custom/ticket-details.js') }}"></script>
@endpush
