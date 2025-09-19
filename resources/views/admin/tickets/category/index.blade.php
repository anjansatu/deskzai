@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/image-preview.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom/frontend.css') }}"/>
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!-- Search - Add -->
        <div
            class="d-flex flex-column-reverse flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
            <div class="flex-grow-1">
                <div class="search-one flex-grow-1 max-w-282">
                    <input type="text" id="categoryListAdminTableSearch" placeholder="{{__('Search here')}}..."/>
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
            <!--  -->
            <button class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white" type="button"
                    data-bs-toggle="modal" data-bs-target="#add-modal">{{ __('+ Add New') }}</button>
        </div>

        <div class="bg-white bd-one bd-c-stroke bd-ra-10 p-sm-30 p-15">
            <input type="hidden" id="news-list-route" value="{{ route('admin.tickets.category') }}">
            <table class="table zTable zTable-last-item-right" id="ticketCategoryDataTable">
                <thead>
                <tr>
                    <th>
                        <div>{{ __('Name') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Code') }}</div>
                    </th>
                    <th>
                        <div class="text-nowrap">{{ __('Is Ticket Prefix') }}</div>
                    </th>
                    <th>
                        <div>{{ __('Status') }}</div>
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

    <!-- Add Modal section start -->
    <div class="modal fade" id="add-modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                <div class="p-sm-25 p-15">
                    <div
                        class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add New') }}</h5>
                        <button type="button"
                                class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                    </div>

                    <form class="ajax reset" action="{{ route('admin.tickets.category-store') }}" method="post"
                          data-handler="commonResponseForModal">
                        @csrf

                        <div class="row rg-24">
                            <div class="col-12">
                                <label for="title">{{ __('Name') }} <span class="text-danger">*</span></label>
                                <input class="zForm-control" type="text" name="name" placeholder="{{ __('Name') }}">
                            </div>

                            <div class="col-12">
                                <label for="title">{{ __('Code') }} <span class="text-danger">*</span></label>
                                <input class="zForm-control" type="text" name="code" placeholder="">
                            </div>

                            <div class="col-12">
                                <label class="zForm-label">{{ __('Group User') }}</label>
                                <select name="group_user[]" class="form-control js-example-basic-multiple"
                                        multiple="multiple">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="zForm-label">{{ __('Is Ticket Prefix') }}</label>
                                <select name="is_ticket_prefix" class="form-select zForm-control">
                                    <option value="1">{{ __('Active') }}</option>
                                    <option value="0">{{ __('Deactivate') }}</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="zForm-label">{{ __('Status') }}</label>
                                <select name="status" class="form-select zForm-control">
                                    <option value="1">{{ __('Active') }}</option>
                                    <option value="0">{{ __('Deactivate') }}</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit"
                                class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Save') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal section end -->

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
    <script src="{{ asset('admin/libs/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/ticketCategory.js') }}"></script>
    <script src="{{ asset('admin/js/custom/image-preview.js') }}"></script>

@endpush
