@extends('admin.layouts.app')
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <div class="row">
            <div class="col-xl-2">
                @include('admin.setting.partials.general-sidebar')
            </div>
            <div class="col-xl-10">
                <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                    <h4 class="fs-18 fw-600 lh-22 text-title-black pb-25">{{ $pageTitle }}</h4>
                    <div class="pb-25">
                        <h4 class="fs-16 fw-600 lh-22 text-title-black pb-10">{{ __('Instructions') }}: </h4>
                        <p class="fs-12 fw-400 lh-22 text-para-text pb-10">{{ __("You need to follow some instruction after maintenance mode changes. Instruction list given below-") }}</p>
                        <div class="fs-12 fw-400 lh-22 text-para-text pb-10">
                            <li>{{ __("If you select maintenance mode") }} <b>{{ __("Maintenance O") }}n</b>,
                                {{__("you need to input secret key for maintenance work. Otherwise you can't work this website. And your created secret key helps you to work under
                                maintenance.")}}
                            </li>
                            <li>{{ __("After created maintenance key, you can use this website secretly through this ur") }}
                                l <span class="iconify"
                                        data-icon="arcticons:url-forwarder"></span> <span
                                    class="text-primary">{{ url('/') }}/(Your created secret key)</span></li>
                            <li>{{__("Only one time url is browsing with secret key, and you can browse your site in maintenance mode. When maintenance mode on, any user can see
                                    maintenance mode error message.")}}
                            </li>
                            <li>{{ __("Unfortunately you forget your secret key and try to connect with your website.") }}
                                <br> {{ __("Then you go to your project folder location") }}
                                <b>{{ __("Main Files") }}</b>{{ __("(where your file in cpanel or your hosting)") }}
                                <span class="iconify"
                                      data-icon="arcticons:url-forwarder"></span><b>{{ __("storage") }}</b>
                                <span class="iconify"
                                      data-icon="arcticons:url-forwarder"></span><b>{{ __("framework") }}</b>. {{ __("You can see 2 files and need to delete 2 files. Files are:") }}
                                <br>
                                {{ __("1. down") }} <br>
                                {{ __("2. maintenance.php") }}
                            </li>
                        </div>
                    </div>

                    <form class="ajax" action="{{route('admin.setting.maintenance.change')}}" method="POST"
                          enctype="multipart/form-data" data-handler="settingCommonHandler">
                        @csrf
                        <div class="row rg-24">
                            <div class="col-lg-4 col-sm-6">
                                <label class="zForm-label">{{ __('Maintenance Mode') }} <span
                                        class="text-danger">*</span></label>
                                <select name="maintenance_mode" id=""
                                        class="form-select zForm-control maintenance_mode">
                                    <option value="">--{{ __('Select Option') }}--</option>
                                    <option value="1"
                                            @if(getOption('maintenance_mode') == 1) selected @endif>{{ __('Maintenance On') }}</option>
                                    <option value="2"
                                            @if(getOption('maintenance_mode') != 1) selected @endif>{{ __('Live') }}</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <label class="zForm-label">{{ __('Maintenance Mode Secret Key') }}</label>
                                <input type="text" name="maintenance_secret_key"
                                       value="{{ getOption('maintenance_secret_key') }}" minlength="6"
                                       class="zForm-control maintenance_secret_key">
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <label class="zForm-label">{{ __('Maintenance Mode Url') }} </label>
                                <input type="text" name="" value="" class="zForm-control maintenance_mode_url" disabled>
                            </div>
                        </div>

                        <button type="submit"
                                class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Page content area end -->
@endsection
@push('script')
    <script>
        'use strict'
        let getUrl = "{{ url('') }}";
        const maintenanceSecretKey = "{{ getOption('maintenance_secret_key') }}";
        const maintenanceModeConst = "{{ getOption('maintenance_mode') }}";
    </script>
    <script src="{{ asset('admin/js/custom/maintenance-mode.js') }}"></script>
@endpush
