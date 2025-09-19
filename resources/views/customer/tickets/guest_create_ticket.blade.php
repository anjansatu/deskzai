@extends('tenant.layouts.app')
@push('title')
    {{ __('Create Ticket') }}
@endpush

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote-lite.min.css') }}"/>
@endpush

@section('content')

    <!-- hero area start -->
    <section class="breadcrumb-section bg-main-color py-30 py-sm-150">
        <div class="breadcrumb-content">
            <h4 class="title">{{ $pageTitle }}</h4>
            <ol class="breadcrumb sf-inner-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{ $pageTitle }}</a></li>
            </ol>
        </div>
    </section>
    <!-- hero area end -->

    <!-- Create Ticket start-->
    <section class="py-sm-150 py-31 position-relative z-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="create-ticket">
                        <form action="{{ route('ticket.guest-ticket-submit') }}" method="post" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row rg-24">
                                <input type="hidden" name="guest" value="1">
                                <div class="col-md-6">
                                    <div class="user-info-from">
                                        <label class="zForm-label">{{__("Subject")}} <span>*</span></label>
                                        <input type="text" placeholder="{{__("Subject")}}" class="zForm-control" name="subject">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="user-info-from">
                                        <label class="zForm-label w-100">{{__("Category")}} <span>*</span></label>
                                        <select id="" class="form-select zForm-control" name="category">
                                            <option>{{ __('Select Category') }}</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if (count($dynamicFields) > 0)
                                    <div class="col-12">
                                        @foreach ($dynamicFields as $field)
                                            <div class="zi-lg-w-100"
                                                style="width: {{ $field->width != null ? $field->width : 100 }}%;">
                                                <div class="user-info-from">
                                                    @if ($field->type == TEXT_FIELD_ID)
                                                        <label class="zForm-label">{{ $field->level }} <span>{{ $field->required == REQUIRED_YES ? '*' : '' }}</span></label>
                                                        <input type="text" placeholder="{{ $field->placeholder }}" class="zForm-control" name="{{ $field->name }}">
                                                    @elseif($field->type == TEXTAREA_FIELD_ID)
                                                        <label class="zForm-label">{{ $field->level }} <span>{{ $field->required == REQUIRED_YES ? '*' : '' }}</span></label>
                                                        <textarea class="zForm-control mb-3 text-h" placeholder="{{ $field->placeholder }}" name="{{ $field->name }}"></textarea>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif


                                @if ($envato?->enable_purchase_code == 1)
                                    <div class="col-lg-6">
                                        <div class="user-info-from">
                                            <label class="zForm-label">{{ __('Purchase Code') }} <span>*</span></label>
                                            <input type="text" placeholder="8c3b8f37-34bd-4d4c-71da-331abb35ecc9" class="zForm-control" name="purchase_code">
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-6">
                                    <div class="user-info-from">
                                        <label class="zForm-label">{{ __('Email') }} <span>*</span></label>
                                        <input type="text" placeholder="example@email.com" class="zForm-control" name="email">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="user-info-from">
                                        <label class="zForm-label">{{ __('Description') }} <span>*</span></label>
                                        <textarea class="zForm-control" placeholder=" Massage" name="details"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="file-upload">
                                        <div class="ticket-upload-box pb-12">
                                            <div class="ticket-upload-btn-box">
                                                <p class="fs-15 fw-600 lh-24 text-para-text pb-12">{{__("Upload file (JPG, JPEG, PNG, ZIP, MP4, GIF, DOC)")}}</p>
                                                <div class="choose-file-border file-upload-one">
                                                    <label class="upload__btn" for="ticket-upload-img">
                                                        <p class="fs-12 fw-500 lh-16 text-para-text">{{ __('Choose files to upload') }}</p>
                                                        <p class="fs-12 fw-500 lh-16 text-white browse-file">{{ __('Browse File') }}</p>
                                                    </label>
                                                    <input type="file" multiple="" data-max_length="20" id="ticket-upload-img"
                                                           name="file[]" class="ticket-img-input d-none">
                                                </div>
                                            </div>
                                            <div class="ticket-upload-img-wrap"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="agree-box align-items-start">
                                <div class="agree-left zForm-wrap-checkbox">
                                    <input type="checkbox" id="service">
                                    <label for="service"> {{ __('I agree with') }} <a href="#" class="text-main-color text-decoration-underline">{{ __('Terms & Service') }}</a></label>
                                </div>
                                <button id="submit-btn" class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white mt-25" disabled="disabled">{{ __('Create Ticket') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Create Ticket end-->

@endsection


@push('script')
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/summernote-init.js') }}"></script>
    <script src="{{ asset('customer/assets/js/custom/tickets.js') }}"></script>
@endpush
