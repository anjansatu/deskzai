@extends('admin.layouts.app')

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
            <div class="row rg-20">
                <div class="col-xl-3">
                    @include('admin.setting.partials.general-sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                        <h4 class="fs-18 fw-600 lh-22 text-title-black pb-25">{{ $pageTitle }}</h4>
                        <div class="pb-25">
                            <h5 class="fs-16 fw-600 lh-22 text-title-black pb-10">{{ __('Instructions') }}: </h5>
                            <p class="fs-12 fw-400 lh-22 text-para-text pb-10">{{ __('You need to click on') }}
                                <strong>{{ __(' "Storage Link"') }}</strong> {{ __(' button, after change ') }}
                                <strong>{{ __('"Storage Driver"') }}</strong></p>

                            <a href="{{route('admin.setting.storage.link')}}" class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white d-inline-block">{{__(' Storage
                                    Link')}}</a>
                        </div>

                        <form class="ajax" action="{{route('admin.setting.storage.update')}}" method="POST"
                              enctype="multipart/form-data" data-handler="settingCommonHandler">
                            @csrf
                            <div class="pb-25">
                                <label class="zForm-label">{{ __('Storage Driver') }} <span class="text-danger">*</span></label>

                                <select name="STORAGE_DRIVER" id="storage_driver" class="form-select form-control" required>
                                    <option
                                        value="{{ STORAGE_DRIVER_PUBLIC }}" {{  env('STORAGE_DRIVER') == STORAGE_DRIVER_PUBLIC ?  'selected':'' }}>{{__('Public')}}</option>
                                    <option
                                        value="{{ STORAGE_DRIVER_AWS }}" {{  env('STORAGE_DRIVER') == STORAGE_DRIVER_AWS ?  'selected':'' }}>{{__('AWS')}}</option>
                                    <option
                                        value="{{ STORAGE_DRIVER_WASABI }}" {{ env('STORAGE_DRIVER') == STORAGE_DRIVER_WASABI ?  'selected':'' }}>{{__('Wasabi')}}</option>
                                    <option
                                        value="{{ STORAGE_DRIVER_VULTR }}" {{  env('STORAGE_DRIVER') == STORAGE_DRIVER_VULTR ?  'selected':'' }}>{{__('Vultr')}}</option>
{{--                                        <option value="{{ STORAGE_DRIVER_DO }}" {{  env('STORAGE_DRIVER') == STORAGE_DRIVER_DO ?  'selected':'' }}>{{__('Digital Ocean (DO)')}}</option>--}}
                                </select>

                            </div>
                            <div class="d-none storage-driver" id="aws">
                                <div class="row rg-24 pb-25">
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('AWS Access Key ID') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="AWS_ACCESS_KEY_ID" value="{{ env('AWS_ACCESS_KEY_ID') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('AWS Secret Access Key') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="AWS_SECRET_ACCESS_KEY" value="{{ env('AWS_SECRET_ACCESS_KEY') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('AWS Default Region') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="AWS_DEFAULT_REGION" value="{{ env('AWS_DEFAULT_REGION') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('AWS Bucket') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="AWS_BUCKET" value="{{ env('AWS_BUCKET') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('AWS URL') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="AWS_URL" value="{{ env('AWS_URL') }}" class="zForm-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-none storage-driver" id="wasabi">
                                <div class="row rg-24 pb-25">
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('WAS Access Key ID') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="WASABI_ACCESS_KEY_ID" value="{{ env('WASABI_ACCESS_KEY_ID') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('WAS Secret Access Key') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="WASABI_SECRET_ACCESS_KEY" value="{{ env('WASABI_SECRET_ACCESS_KEY') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('WAS Default Region') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="WASABI_DEFAULT_REGION" value="{{ env('WASABI_DEFAULT_REGION') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('WAS Bucket') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="WASABI_BUCKET" value="{{ env('WASABI_BUCKET') }}" class="zForm-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-none storage-driver" id="vultr">
                                <div class="row rg-24 pb-25">
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('VULTR Access Key') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="VULTR_ACCESS_KEY_ID" value="{{ env('VULTR_ACCESS_KEY') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('VULTR Secret Key') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="VULTR_SECRET_ACCESS_KEY" value="{{ env('VULTR_SECRET_KEY') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('VULTR Region') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="VULTR_DEFAULT_REGION" value="{{ env('VULTR_REGION') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('VULTR Bucket') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="VULTR_BUCKET" value="{{ env('VULTR_BUCKET') }}" class="zForm-control">
                                    </div>
                                </div>
                            </div>

                            <div class="d-none storage-driver" id="do">
                                <div class="row rg-24 pb-25">
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="col-lg-3">{{ __('DO Access Key ID') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="DO_ACCESS_KEY_ID" value="{{ env('DO_ACCESS_KEY_ID') }}" class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('DO Secret Access Key') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="DO_SECRET_ACCESS_KEY" value="{{ env('DO_SECRET_ACCESS_KEY') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('DO Default Region') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="DO_DEFAULT_REGION" value="{{ env('DO_DEFAULT_REGION') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('DO Bucket') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="DO_BUCKET" value="{{ env('DO_BUCKET') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('DO Folder') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="DO_FOLDER" value="{{ env('DO_FOLDER') }}" class="zForm-control">
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <label class="zForm-label">{{ __('DO CDN ID') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="DO_CDN_ID" value="{{ env('DO_CDN_ID') }}" class="zForm-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>

    </div>
    <!-- Page content area end -->
@endsection
@push('script')
    <script src="{{ asset('admin/js/custom/storage-settings.js') }}"></script>
    <script>
            $(function () {
                var value = $('#storage_driver').val();
                storage(value)
            })

            $('#storage_driver').on('change', function () {
                var value = this.value
                storage(value)
            })

            function storage(STORAGE_DRIVER) {
                if (STORAGE_DRIVER == 'public') {
                    $('#aws').addClass('d-none');
                    $('#wasabi').addClass('d-none');
                    $('#vultr').addClass('d-none');
                    $('#do').addClass('d-none');
                } else if (STORAGE_DRIVER == 's3') {
                    $('#aws').removeClass('d-none');
                    $('#wasabi').addClass('d-none');
                    $('#vultr').addClass('d-none');
                    $('#do').addClass('d-none');
                } else if (STORAGE_DRIVER == 'wasabi') {
                    $('#aws').addClass('d-none');
                    $('#wasabi').removeClass('d-none');
                    $('#vultr').addClass('d-none');
                    $('#do').addClass('d-none');
                } else if (STORAGE_DRIVER == 'vultr') {
                    $('#aws').addClass('d-none');
                    $('#wasabi').addClass('d-none');
                    $('#vultr').removeClass('d-none');
                    $('#do').addClass('d-none');
                }
            }
        </script>
@endpush


