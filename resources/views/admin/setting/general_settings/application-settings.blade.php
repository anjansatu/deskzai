@extends('admin.layouts.app')
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
            <div class="row rg-20">
                <div class="col-xl-3">
                    @include('admin.setting.partials.general-sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                        <form class="ajax" action="{{route('admin.setting.application-settings.update')}}" method="POST"
                              enctype="multipart/form-data" data-handler="settingCommonHandler">
                            @csrf
                            <div class="row rg-24">
                                <div class="col-xxl-4 col-md-6">
                                    <label class="zForm-label">{{__('App Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="app_name" value="{{isset($general_setting_data->app_name)?$general_setting_data->app_name:''}}" class="zForm-control" required>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <label class="zForm-label">{{__('App Email')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="app_email" value="{{isset($general_setting_data->app_email)?$general_setting_data->app_email:''}}" class="zForm-control" required>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <label class="zForm-label">{{__('App Contact Number')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="app_contact_number" value="{{isset($general_setting_data->app_contact_number)?$general_setting_data->app_contact_number:''}}" class="zForm-control" required>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <label class="zForm-label">{{__('App Location')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="app_location" value="{{isset($general_setting_data->app_location)?$general_setting_data->app_location:''}}" class="zForm-control" required>
                                </div>

                                @if(auth()->user()->role == USER_ROLE_SUPER_ADMIN)
                                    <div class="col-xxl-4 col-md-6">
                                        <label class="zForm-label">{{__('App Copyright')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="app_copyright" value="{{isset($general_setting_data->app_copyright)?$general_setting_data->app_copyright:''}}" class="zForm-control" required>
                                    </div>
                                    <div class="col-xxl-4 col-md-6">
                                        <label class="zForm-label">{{__('Developed By')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="app_developed" value="{{isset($general_setting_data->app_developed)?$general_setting_data->app_developed:''}}" class="zForm-control" required>
                                    </div>
                                @endif


                                <div class="col-xxl-4 col-md-6">
                                    <label for="app_timezone" class="zForm-label">{{__('Timezone')}} <span class="text-danger">*</span></label>
                                    <select name="app_timezone" class="form-control">
                                        @foreach($timezones as $timezone)
                                            <option value="{{ $timezone }}" {{isset($general_setting_data->app_timezone) && $timezone == $general_setting_data->app_timezone ? 'selected' : ''}} > {{ $timezone }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if(getOption('ZAIDESKTENANCY_build_version') !=null && getOption('ZAIDESKTENANCY_build_version') > 0)
                                    @if(auth()->user()->role == USER_ROLE_SUPER_ADMIN)
                                        <div class="col-xxl-4 col-md-6">
                                            <label for="APP_DEBUG" class="zForm-label">{{__('App Debug')}}</label>
                                            <select name="app_debug" class="form-control select2">
                                                <option value="true" {{isset($general_setting_data->app_debug) && $general_setting_data->app_debug == true ? 'selected' : ''}} >{{ __('True') }}</option>
                                                <option value="false" {{isset($general_setting_data->app_debug) && $general_setting_data->app_debug == false ? 'selected' : ''}} > {{ __('False') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-xxl-4 col-md-6">
                                            <label for="app_date_format" class="zForm-label">{{__('App Date Format')}}</label>
                                            <select name="app_date_format" class="form-control select2">
                                                @foreach(getDateFormatList() as $dateFormat)
                                                    <option value="{{ $dateFormat }}" {{isset($general_setting_data->app_date_format) && $general_setting_data->app_date_format = $dateFormat ? 'selected' : ''}} > {{ $dateFormat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xxl-4 col-md-6">
                                            <label for="app_time_format" class="zForm-label">{{__('App Time Format')}}</label>
                                            <select name="app_time_format" class="form-control select2">
                                                @foreach(getTimeList() as $timeFormat)
                                                    <option value="{{ $timeFormat }}" {{isset($general_setting_data->app_time_format) && $general_setting_data->app_time_format == $timeFormat ? 'selected' : ''}} > {{ $timeFormat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                @endif
                            </div>

                            <div class="general-settings-btn">
                                <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{__('Update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </div>
    <!-- Page content area end -->
@endsection

@push('script')
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
@endpush
