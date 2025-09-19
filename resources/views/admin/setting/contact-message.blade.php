@extends('admin.layouts.app')

@section('content')
<div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
    <input type="hidden" id="contact-messages" value="{{ route('admin.setting.contact.sms.index') }}">
    <h4 class="fs-24 fw-500 lh-34 text-title-black pb-16">{{__('Contact Messages')}}</h4>
    <div class="bd-one bd-c-stroke bd-ra-8 bg-white p-sm-25 p-15">
        <table class="table zTable zTable-last-item-right" id="commonDataTable">
            <thead>
                <tr>
                    <th><div>{{ __("SL") }}</div></th>
                    <th><div>{{ __("Name") }}</div></th>
                    <th><div>{{ __("Email") }}</div></th>
                    <th><div>{{ __("Subject") }}</div></th>
                    <th><div>{{ __("Phone") }}</div></th>
                    <th><div>{{ __("Content") }}</div></th>
                    <th><div>{{ __("Action") }}</div></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<!-- Page content area end -->

@endsection

@push('script')
    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/frontend/contact-messages.js')}}"></script>
@endpush
