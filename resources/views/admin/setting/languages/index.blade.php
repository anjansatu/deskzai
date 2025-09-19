@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!-- Search - Add -->
        <div
            class="d-flex flex-column-reverse flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
            <div class="flex-grow-1">
                <div class="search-one flex-grow-1 max-w-282">
                    <input type="text" id="languageAdminDatatableSearch" placeholder="{{__('Search here')}}..."/>
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
            <button class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white" type="button"
                    data-bs-toggle="modal" data-bs-target="#add-modal">
                <i class="fa fa-plus"></i> {{ __('Add Language') }}
            </button>
        </div>
        <input type="hidden" id="language-route" value="{{ route('admin.setting.languages.index') }}">
        <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <table class="table zTable zTable-last-item-right" id="commonDataTable">
                <thead>
                <tr>
                    <th>
                        <div>{{ __("Flag") }}</div>
                    </th>
                    <th>
                        <div>{{ __("Language") }}</div>
                    </th>
                    <th>
                        <div class="text-nowrap">{{ __("ISO code") }}</div>
                    </th>
                    <th>
                        <div>{{ __("RTL") }}</div>
                    </th>
                    <th>
                        <div>{{ __("Font") }}</div>
                    </th>
                    <th>
                        <div>{{ __("Action") }}</div>
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
                        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add Language') }}</h5>
                        <button type="button"
                                class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                                data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                    </div>
                    <form class="ajax reset" action="{{ route('admin.setting.languages.store') }}" method="post"
                          data-handler="languageHandler" enctype="multipart/form-data">
                        @csrf

                        <div class="row rg-24">
                            <div class="col-12">
                                <label class="zForm-label" for="language">{{ __('Language') }} <span
                                        class="text-danger">*</span></label>
                                <input class="zForm-control" type="text" name="language"
                                       placeholder="{{ __("Type Language Name") }}" required>
                            </div>
                            <div class="col-12">
                                <label class="zForm-label" for="iso_code">{{ __('ISO Code') }} <span
                                        class="text-danger">*</span></label>
                                <select name="iso_code" class="form-control" required>
                                    <option value="">--{{ __('Select ISO Code') }}--</option>
                                    @foreach(languageIsoCode() as $code => $isoCountryName)
                                        <option value="{{$code}}">{{ $isoCountryName.'('.$code.')' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="flag" class="zForm-label"> {{__('Flag')}} <span class="text-danger">*</span>
                                </label>
                                <div class="upload-img-box">
                                    <img src="{{ getDefaultImage() }}">
                                    <input type="file" name="flag" accept="image/*" onchange="previewFile(this)">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="zForm-label" for="font">{{ __('Font File') }}</label>
                                <input type="file" name="font" class="form-control" placeholder="{{ __("Font") }}"
                                       accept="file/ttf,file/otf,file/woff,file/woff2">
                                @if ($errors->has('font'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('font') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <label class="zForm-label" for="rtl">{{ __('RTL Supported') }} <span
                                        class="text-danger">*</span></label>
                                <select name="rtl" class="form-control" required>
                                    <option value="0">{{__("No")}}</option>
                                    <option value="1">{{__("Yes")}}</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input name="default" class="form-check-input" type="checkbox" value="1"
                                           id="flexCheckChecked">
                                    <label class="form-check-label p-1" for="flexCheckChecked">
                                        {{ __('Default Language') }}
                                    </label>
                                </div>
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
    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/languages.js')}}"></script>
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush
