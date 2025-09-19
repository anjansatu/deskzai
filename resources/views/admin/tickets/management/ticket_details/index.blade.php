@extends('admin.layouts.app')
@push('style')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('common/css/summernote/summernote-lite.min.css')}}"/>
@endpush

@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">

        <div>
            <!-- View Ticket start-->
            <section class="view-ticket-area">
                <div class="row rg-24">
                    <div class="col-lg-8">
                        <div class="allPostUser">
                            <!-- Ticket Assign Tags Start -->
                            @include('admin.tickets.management.ticket_details.assign-tag')
                            <!-- Ticket Assign Tags End -->
                            <!-- Ticket Conversation Start -->
                            @include('admin.tickets.management.ticket_details.conversation')
                            <!-- Ticket Conversation End -->
                        </div>
                        <!-- Conversation List Start -->
                        <div class="d-flex flex-column g-24">
                            @include('admin.tickets.management.ticket_details.conversation-list')
                        </div>
                        <!-- Conversation List End -->
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex flex-column g-16">
                            <!-- Ticket Info Start -->
                            @include('admin.tickets.management.ticket_details.ticket-info')
                            <!-- Ticket Info end -->
                            <!-- Customer Details end -->
                            <!-- all notes start -->
                            @include('admin.tickets.management.ticket_details.all-notes')
                            <!-- all notes end -->
                        </div>
                    </div>
                    <span id="instantnoneClick"></span>
                </div>
                <span id="notfioverlay"></span>
            </section>
        </div>
        <!--  Ticket Note model start -->
        @include('admin.tickets.management.ticket_details.add-note')
        <!--  Ticket Note model end -->

        <!--  Add Instant Reply model start -->
        @include('admin.tickets.management.ticket_details.add-instant-message')

        <!--  Update Instant Reply model start -->
        @include('admin.tickets.management.ticket_details.update-instant-message')
        <!--  Update Instant Reply model end -->

        <!--  Add Category model start -->
        <form class="ajax reset" action="{{ route('admin.tickets.categoryUpdate') }}" method="post"
              data-handler="commonResponseForModal">
            @csrf
            <div class="modal fade" id="categorymodel" tabindex="-3" aria-labelledby="categorModalLabel"
                 aria-hidden="true">
                <input type="hidden" name="category_ticket_id" value="{{ $ticketData->id }}">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                        <div class="p-sm-25 p-15">
                            <div
                                class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                                <h5 class="fs-18 fw-600 lh-22 text-title-black"
                                    id="categorModalLabel">{{__('Category')}}</h5>
                                <button type="button"
                                        class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                        data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i>
                                </button>
                            </div>
                            <div class="noteIntoPart">
                                <select class="category zForm-control" name="ticket_category">
                                    @isset($ticketCategory)
                                        @foreach ($ticketCategory as $category )
                                            <option @if($ticketData->category->id==$category->id) selected
                                                    @endif value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="d-flex g-12 mt-25">
                                <button type="button"
                                        class="py-10 px-26 bg-white bd-one bd-c-para-text bd-ra-8 fs-15 fw-600 lh-25 text-para-text noteIntoPartBtuBorder"
                                        data-bs-dismiss="modal">{{__('Back')}}</button>
                                <button type="submit" data-bs-dismiss="modal"
                                        class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 submit-btu">{{__('Save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--  Add Category model end -->

        <!--  Add priority start -->
        <form class="ajax reset" action="{{ route('admin.tickets.priorityUpdate') }}" method="post"
              data-handler="commonResponseForModal">
            @csrf
            <input type="hidden" name="priority_ticket_id" value="{{ $ticketData->id }}">
            <div class="modal fade" id="prioritymodel" tabindex="-3" aria-labelledby="priorityModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                        <div class="p-sm-25 p-15">
                            <div
                                class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                                <h5 class="fs-18 fw-600 lh-22 text-title-black"
                                    id="priorityModalLabel">{{__('Priority')}}</h5>
                                <button type="button"
                                        class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                        data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i>
                                </button>
                            </div>
                            <div class="noteIntoPart">
                                <select class="category zForm-control" name="ticket_priority">
                                    @foreach($priorities as $value=>$key)
                                        )
                                        <option @if($ticketData->priority==$value) selected
                                                @endif value="{{$value}}">{{$key}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex g-12 mt-25">
                                <button type="button"
                                        class="py-10 px-26 bg-white bd-one bd-c-para-text bd-ra-8 fs-15 fw-600 lh-25 text-para-text noteIntoPartBtuBorder"
                                        data-bs-dismiss="modal">{{__('Back')}}</button>
                                <button type="submit" data-bs-dismiss="modal"
                                        class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 submit-btu">{{__('Save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--  Add priority end -->

        <!--  edit conversion modal start -->
        <form class="ajax reset" action="{{ route('admin.conversations.conversation-update') }}" method="post"
              data-handler="commonResponseForModal">
            @csrf
            <div class="modal fade" id="conversionEditmodel" tabindex="-3" aria-labelledby="conversionEditmodelLabel"
                 aria-hidden="true">
                <input type="hidden" name="conversion_id" id="conversion_id" value="">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                        <div class="p-sm-25 p-15">
                            <div
                                class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                                <h5 class="fs-18 fw-600 lh-22 text-title-black"
                                    id="categorModalLabel">{{__('Edit Conversion')}}</h5>
                                <button type="button"
                                        class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                        data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i>
                                </button>
                            </div>

                            <div class="noteIntoPart">
                                <textarea class="summernoteOne" name="conversation_details"
                                          id="conversation_details_edit"></textarea>
                            </div>
                            <div class="d-flex g-12 mt-25">
                                <button type="button"
                                        class="py-10 px-26 bg-white bd-one bd-c-para-text bd-ra-8 fs-15 fw-600 lh-25 text-para-text"
                                        data-bs-dismiss="modal">{{__('Back')}}</button>
                                <button type="submit" data-bs-dismiss="modal"
                                        class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12">{{__('Save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--  edit conversion modal end -->

        <!--  details dynamic field data edit start -->
        <form class="ajax reset" action="{{ route('admin.dynamic-fields-data-update') }}" method="post"
              data-handler="commonResponseForModal">
            @csrf
            <div class="modal fade" id="detailsInfoModel" tabindex="-3" aria-labelledby="detailsInfoModelLabel"
                 aria-hidden="true">
                <input type="hidden" name="id" id="dynamic_field_data_id" value="">
                <input type="hidden" name="required" id="required" value="">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                        <div class="p-sm-25 p-15">

                            <div
                                class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                                <h5 class="fs-18 fw-600 lh-22 text-title-black"
                                    id="categorModalLabel">{{__('Edit Data')}}</h5>
                                <button type="button"
                                        class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                        data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i>
                                </button>
                            </div>

                            <div class="noteIntoPart">
                                <div class="text-field d-none">
                                    <label class="zForm-label">Domain Name <span
                                            class="text-field-required">*</span></label>
                                    <input type="text" class="zForm-control" name="text_field_value" value=""
                                           id="text-field">
                                </div>

                                <div class="textarea-field d-none">
                                    <label class="zForm-label"><span class="textarea-field-required"></span></label>
                                    <textarea class="zForm-control" name="textarea_field_value"
                                              id="textarea-field"></textarea>
                                </div>

                            </div>
                            <div class="d-flex g-12 mt-25">
                                <button type="button"
                                        class="py-10 px-26 bg-white bd-one bd-c-para-text bd-ra-8 fs-15 fw-600 lh-25 text-para-text"
                                        data-bs-dismiss="modal">{{__('Back')}}</button>
                                <button type="submit"
                                        class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12">{{__('Save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--  details dynamic field data edit edit -->

        <!--  license field data edit start -->
        <form class="ajax reset" action="{{ route('admin.tickets.license-data-update') }}" method="post"
              data-handler="commonResponseForModal">
            @csrf
            <div class="modal fade" id="licenseEditModel" tabindex="-3" aria-labelledby="detailsInfoModelLabel"
                 aria-hidden="true">
                <input type="hidden" name="ticket_id" id="tickeId" value="">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                        <div class="p-sm-25 p-15">

                            <div
                                class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                                <h5 class="fs-18 fw-600 lh-22 text-title-black"
                                    id="categorModalLabel">{{__('Edit License')}}</h5>
                                <button type="button"
                                        class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                        data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i>
                                </button>
                            </div>

                            <div class="noteIntoPart">
                                <div class="text-field ">
                                    <input type="text" class="zForm-control" name="license" value="" id="licenseField">
                                </div>
                            </div>

                            <div class="d-flex g-12 mt-25">
                                <button type="button"
                                        class="py-10 px-26 bg-white bd-one bd-c-para-text bd-ra-8 fs-15 fw-600 lh-25 text-para-text"
                                        data-bs-dismiss="modal">{{__('Back')}}</button>
                                <button type="submit"
                                        class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12">{{__('Save')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--  license field data edit edit end -->

    </div>
@endsection
@push('script')
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/ticket-details.js') }}"></script>
    <script type="text/javascript" src="{{ asset('agent/assets/js/coustom.js')}}"></script>
@endpush
