@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote-lite.min.css') }}"/>
@endpush

@section('content')
    <!-- Page content area start -->
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-24 fw-500 lh-34 text-title-black pb-12">{{ __("Announcement") }}</h4>
        <div class="bd-one bd-c-stroke bd-ra-10 p-sm-25 p-15 bg-white">
            <form class="ajax" action="{{ route('admin.setting.announcement-store') }}" method="POST"
                  enctype="multipart/form-data" data-handler="settingCommonHandler">

                @csrf

                <input type="hidden" name="id" value="{{$announcementData?->id}}">

                <label class="zForm-label">{{__('Customer Announcement')}}</label>
                <textarea name="customer_announcement" class="summernoteOne"
                          placeholder="{{ __("Customer Announcement") }}"> {{$announcementData?->customer_announcement}} </textarea>

                <button type="submit"
                        class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white mt-25">{{__('Update')}}</button>

            </form>
        </div>
        <div class="modal fade" id="add-modal" aria-hidden="true" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                    <div class="p-sm-24 p-15">
                        <div
                            class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                            <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add New') }}</h5>
                            <button type="button"
                                    class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                    data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i>
                            </button>
                        </div>

                        <form class="ajax reset" action="{{ route('admin.setting.frontend.faq.store') }}" method="post"
                              data-handler="commonResponseForModal">
                            @csrf


                            <button type="submit"
                                    class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white mt-25">{{ __('Save') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Page content area end -->

@endsection

@push('script')
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/blogs.js') }}"></script>
@endpush
