@extends('admin.layouts.app')

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-24 fw-500 lh-34 text-black pb-18">{{ __('Ticket Configuration') }}</h4>
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-20">
            <input type="hidden" id="update-country-Route" value="{{ route('admin.setting.country.update') }}">
            <form class="ajax reset" action="{{route('admin.setting.tracking-no-pre-fixed-store')}}"
                  method="post"
                  data-handler="commonResponse">
                @csrf
                <input type="hidden" value="{{auth()->id()}}" name="user_id">
                <div class="row rg-24">
                    <div class="col-md-12">

                        <label class="zForm-label" for="user_role">{{__('Tracking Number Pre Fixed')}} <span
                                class="text-danger">*</span></label>
                        <input type="text" name="pre_fixed"
                               value="{{isset($configData->ticket_tracking_no_pre_fixed)?$configData->ticket_tracking_no_pre_fixed:''}}"
                               class="zForm-control">

                    </div>

                    <div class="col-md-12">
                        <label class="zForm-label" for="user_role">{{__('Agent Fake Name')}} <span
                                class="text-danger">*</span></label>
                        <div class="zCheck form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="agentFakeName"
                                   name="agentFakeName"
                                   @if(isset($configData->agent_fake_name) && $configData->agent_fake_name == 1) checked="" @endif >
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
