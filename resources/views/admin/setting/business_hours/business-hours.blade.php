@extends('admin.layouts.app')

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-24 fw-500 lh-34 text-black pb-18">{{ __('Section Configuration') }}</h4>
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-20">
            <input type="hidden" id="update-country-Route" value="{{ route('admin.setting.country.update') }}">

            <form class="ajax reset" action="{{route('admin.setting.business-hours-section-data-store')}}" method="post"
                  data-handler="commonResponse">
                @csrf
                <input type="hidden" value="{{auth()->id()}}" name="user_id">
                <div class="row rg-24">
                    <div class="col-md-6">
                        <label class="zForm-label" for="user_role">{{__('Title')}} <span
                                class="text-danger">*</span></label>
                        <input type="text" name="schedule_title"
                               value="{{isset($configData->schedule_title)?$configData->schedule_title:''}}"
                               class="zForm-control">
                    </div>
                    <div class="col-md-6">
                        <label class="zForm-label" for="user_role">{{__('Short Description')}} <span
                                class="text-danger">*</span></label>
                        <input type="text" name="schedule_desc"
                               value="{{isset($configData->schedule_desc)?$configData->schedule_desc:''}}"
                               class="zForm-control">
                    </div>
                </div>
                <button class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20"
                        type="submit">{{ __('Update') }}</button>
            </form>

        </div>
        <h4 class="fs-24 fw-500 lh-34 text-black pb-18">{{ __('Schedule') }}</h4>
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <input type="hidden" id="country-route" value="{{ route('admin.setting.country.list') }}">
            <input type="hidden" id="update-country-Route" value="{{ route('admin.setting.country.update') }}">

            <form class="ajax reset" action="{{route('admin.setting.business-hours-store')}}" method="post"
                  data-handler="commonResponse">
                @csrf
                <input type="hidden" value="{{auth()->id()}}" name="user_id">
                <div class="row rg-24">
                    <div class="col-md-3">
                        <div class="d-flex flex-column rg-24">
                            @if(count($businessHours)>0)

                                @foreach($businessHours as $key=>$item)
                                    @if($key==0)
                                        <div>
                                            <label class="zForm-label" for="user_role">{{__('User Role')}} <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="day[]" value="{{$item->days}}"
                                                   class="zForm-control">
                                        </div>
                                    @else
                                        <input type="text" name="day[]" value="{{$item->days}}" class="zForm-control">
                                    @endif
                                @endforeach

                            @else
                                <div>
                                    <label class="zForm-label" for="user_role">{{__('User Role')}} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="day[]" value="" class="zForm-control">
                                </div>

                                <input type="text" name="day[]" value="" class="zForm-control">

                                <input type="text" name="day[]" value="" class="zForm-control">

                                <input type="text" name="day[]" value="" class="zForm-control">

                                <input type="text" name="day[]" value="" class="zForm-control">

                                <input type="text" name="day[]" value="" class="zForm-control">

                                <input type="text" name="day[]" value="" class="zForm-control">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex flex-column rg-24">
                            @if(count($businessHours)>0)
                                @foreach($businessHours as $key=>$item)
                                    @if($key==0)
                                        <div class="">
                                            <label class="zForm-label" for="status">{{__('Status(Open/Close)')}} <span
                                                    class="text-danger">*</span></label>
                                            <select name="status[]" id="status" class="zForm-control">
                                                <option value="">{{ __('Select') }}</option>
                                                <option
                                                    value="Opened" {{$item->status == 'Opened'?'selected':''}}>
                                                    Opened
                                                </option>
                                                <option
                                                    value="Closed" {{$item->status == 'Closed'?'selected':''}}>
                                                    Closed
                                                </option>
                                            </select>
                                        </div>
                                    @else
                                        <select name="status[]" class="zForm-control">
                                            <option value="">{{ __('Select') }}</option>
                                            <option
                                                value="Opened" {{$item->status == 'Opened'?'selected':''}}>
                                                Opened
                                            </option>
                                            <option
                                                value="Closed" {{$item->status == 'Closed'?'selected':''}}>
                                                Closed
                                            </option>
                                        </select>
                                    @endif
                                @endforeach
                            @else
                                <div>
                                    <label for="status">{{__('Status(Open/Close)')}} <span class="text-danger">*</span></label>
                                    <select name="status[]" id="status" class="zForm-control">
                                        <option value="">{{ __('Select') }}</option>
                                        <option value="Opened">Opened</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>

                                <select name="status[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="Opened">Opened</option>
                                    <option value="Closed">Closed</option>
                                </select>

                                <select name="status[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="Opened">Opened</option>
                                    <option value="Closed">Closed</option>
                                </select>

                                <select name="status[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="Opened">Opened</option>
                                    <option value="Closed">Closed</option>
                                </select>

                                <select name="status[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="Opened">Opened</option>
                                    <option value="Closed">Closed</option>
                                </select>

                                <select name="status[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="Opened">Opened</option>
                                    <option value="Closed">Closed</option>
                                </select>

                                <select name="status[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    <option value="Opened">Opened</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex flex-column rg-24">
                            @if(count($businessHours)>0)
                                @foreach($businessHours as $key=>$item)
                                    @if($key==0)
                                        <div>
                                            <label class="zForm-label" for="start_time">{{__('Status Time')}} <span
                                                    class="text-danger">*</span></label>
                                            <select name="start_time[]" id="start_time" class="zForm-control">
                                                <option value="">{{ __('Select') }}</option>
                                                @foreach($timeArray as $time)
                                                    <option
                                                        value="{{$time}}" {{$item->start_time == $time?'selected':''}}>{{$time}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else

                                        <select name="start_time[]" class="zForm-control">
                                            <option value="">{{ __('Select') }}</option>
                                            @foreach($timeArray as $time)
                                                <option
                                                    value="{{$time}}" {{$item->start_time == $time?'selected':''}}>{{$time}}</option>
                                            @endforeach
                                        </select>

                                    @endif
                                @endforeach
                            @else
                                <div>
                                    <label class="zForm-label" for="start_time">{{__('Status Time')}} <span
                                            class="text-danger">*</span></label>
                                    <select name="start_time[]" id="start_time" class="zForm-control">
                                        <option value="">{{ __('Select') }}</option>
                                        @foreach($timeArray as $time)
                                            <option value="{{$time}}">{{$time}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <select name="start_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="start_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="start_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="start_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="start_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="start_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                            @endif
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="d-flex flex-column rg-24">
                            @if(count($businessHours)>0)
                                @foreach($businessHours as $key=>$item)
                                    @if($key==0)
                                        <div>
                                            <label class="zForm-label" for="end_time">{{__('Status Time')}} <span
                                                    class="text-danger">*</span></label>
                                            <select name="end_time[]" id="end_time" class="zForm-control">
                                                <option value="">{{ __('Select') }}</option>
                                                @foreach($timeArray as $time)
                                                    <option
                                                        value="{{$time}}" {{$item->end_time == $time?'selected':''}}>{{$time}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else

                                        <select name="end_time[]" class="zForm-control">
                                            <option value="">{{ __('Select') }}</option>
                                            @foreach($timeArray as $time)
                                                <option
                                                    value="{{$time}}" {{$item->end_time == $time?'selected':''}}>{{$time}}</option>
                                            @endforeach
                                        </select>

                                    @endif
                                @endforeach
                            @else
                                <div>
                                    <label class="zForm-label" for="end_time">{{__('Status Time')}} <span
                                            class="text-danger">*</span></label>
                                    <select name="end_time[]" id="end_time" class="zForm-control">
                                        <option value="">{{ __('Select') }}</option>
                                        @foreach($timeArray as $time)
                                            <option value="{{$time}}">{{$time}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <select name="end_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="end_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="end_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="end_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="end_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>

                                <select name="end_time[]" class="zForm-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($timeArray as $time)
                                        <option value="{{$time}}">{{$time}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                    </div>
                </div>
                <button class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20"
                        type="submit">{{ __('Update') }}</button>
            </form>

        </div>

    </div>
    <!-- Page content area end -->
@endsection
@push('script')
    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/country.js')}}"></script>
@endpush
