@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-18 fw-600 lh-20 text-title-black pb-17">{{__($pageTitle)}}</h4>
        <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
            <form action="{{route('admin.user.update')}}" method="post" class="form-horizontal"
                  enctype="multipart/form-data">
                @csrf

                <div class="row rg-24">
                    <input type="hidden" value="{{$user->id}}" name="id">
                    <div class="col-md-6">

                        <label class="zForm-label" for="name">{{__('Name')}} <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" value="{{$user->name}}" placeholder="{{__('Name')}}"
                               class="zForm-control">
                        @if ($errors->has('name'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                        @endif

                    </div>
                    <div class="col-md-6">

                        <label class="zForm-label" for="contact_number">{{__('Mobile Number')}} <span
                                class="text-danger">*</span></label>
                        <input type="text" name="mobile" id="contact_number" value="{{$user->mobile}}"
                               placeholder="{{__('Contact Number')}}" class="zForm-control">
                        @if ($errors->has('mobile'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('mobile') }}</span>
                        @endif

                    </div>

                    <div class="col-md-6">

                        <label class="zForm-label" for="email">{{__('Email')}} <span
                                class="text-danger">*</span></label>
                        <input type="text" name="email" id="email" value="{{$user->email}}"
                               placeholder="{{__('Email')}}" class="zForm-control" readonly>
                        @if ($errors->has('email'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email') }}</span>
                        @endif

                    </div>

                    <div class="col-md-6">

                        <label class="zForm-label" for="dob">{{__('Date of Birth')}} <span class="text-danger">*</span></label>
                        <input type="date" name="dob" id="dob" value="{{$user->dob}}"
                               placeholder="{{__('Date of Birth')}}" class="form-control">
                        @if ($errors->has('dob'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('dob') }}</span>
                        @endif

                    </div>

                    <div class="col-md-6">

                        <label class="zForm-label" for="gender">{{__('Select Gender')}} <span
                                class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">{{ __('Select') }}</option>
                            <option value="male" {{$user->gender == 'male'?'selected':''}}>{{ __('Male') }}</option>
                            <option
                                value="female" {{$user->gender == 'female'?'selected':''}}>{{ __('Female') }}</option>
                            <option
                                value="others" {{$user->gender == 'others'?'selected':''}}>{{ __('Others') }}</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('gender') }}</span>
                        @endif

                    </div>

                    <div class="col-md-6">

                        <label class="zForm-label" for="address">{{__('Address')}} <span
                                class="text-danger">*</span></label>
                        <textarea name="address" id="address" class="zForm-control"
                                  placeholder="{{__('Address')}}">{{$user->address}}</textarea>
                        @if ($errors->has('address'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('address') }}</span>
                        @endif

                    </div>
                    <div class="col-md-6">

                        <label class="zForm-label" for="phone_verification_status">{{__('Mobile No Verification')}}
                            <span class="text-danger">*</span></label>
                        <select name="phone_verification_status" id="phone_verification_status" class="form-control">
                            <option
                                value="0" {{$user->phone_verification_status == 0?'selected':''}}>{{ __('No') }}</option>
                            <option
                                value="1" {{$user->phone_verification_status == 1?'selected':''}}>{{ __('Yes') }}</option>
                        </select>
                        @if ($errors->has('mobile_no_verification'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('mobile_no_verification') }}</span>
                        @endif

                    </div>

                    <div class="col-md-6">

                        <label class="zForm-label" for="email_verification_status">{{__('Email Verification')}} <span
                                class="text-danger">*</span></label>
                        <select name="email_verification_status" id="email_verification_status" class="form-control">
                            <option
                                value="0" {{$user->email_verification_status == 0?'selected':''}}>{{ __('No') }}</option>
                            <option
                                value="1" {{$user->email_verification_status == 1?'selected':''}}>{{ __('Yes') }}</option>
                        </select>
                        @if ($errors->has('email_verification_status'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('email_verification_status') }}</span>
                        @endif

                    </div>

                    <div class="col-md-6">

                        <label class="zForm-label" for="status">{{__('Status')}} <span
                                class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control">
                            <option value="">{{ __('Select') }}</option>
                            <option value="1" {{$user->status == 1?'selected':''}}>{{ __('Active') }}</option>
                            <option value="0" {{$user->status == 0?'selected':''}}>{{ __('Inactive') }}</option>
                        </select>
                        @if ($errors->has('status'))
                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
                        @endif

                    </div>

                    @if(isAddonInstalled('DESKSAAS') > 0)
                        @if(auth()->user()->role == USER_ROLE_ADMIN && auth()->user()->tenant_id != null)
                            <div class="col-md-6">

                                <label class="zForm-label" for="user_role">{{__('User Role')}} <span
                                        class="text-danger">*</span></label>
                                <select name="user_role" id="user_role" class="form-control">
                                    <option
                                        value="{{USER_ROLE_AGENT}}" {{$user->role == USER_ROLE_AGENT?'selected':''}}>{{ __('Agent') }}</option>
                                    <option
                                        value="{{USER_ROLE_CUSTOMER}}" {{$user->role == USER_ROLE_CUSTOMER?'selected':''}}>{{ __('Customer') }}</option>
                                </select>
                                @if ($errors->has('user_role'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('user_role') }}</span>
                                @endif

                            </div>
                        @endif
                    @else
                        <div class="col-md-6">

                            <label class="zForm-label" for="user_role">{{__('User Role')}} <span
                                    class="text-danger">*</span></label>
                            <select name="user_role" id="user_role" class="form-control">
                                <option
                                    value="{{USER_ROLE_AGENT}}" {{$user->role == USER_ROLE_AGENT?'selected':''}}>{{ __('Agent') }}</option>
                                <option
                                    value="{{USER_ROLE_CUSTOMER}}" {{$user->role == USER_ROLE_CUSTOMER?'selected':''}}>{{ __('Customer') }}</option>
                            </select>
                            @if ($errors->has('user_role'))
                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('user_role') }}</span>
                            @endif

                        </div>
                    @endif

                    <div class="col-md-6">
                        <label class="zForm-label" for="address">{{__('Profile Image')}} </label>
                        <div class="upload-img-box mb-25 overflow-hidden">
                            <img src="{{ getFileUrl($user->image) }}" alt="img" class="img-fluid">
                            <input type="file" name="profile_image" id="profile_image" accept="image/*"
                                   onchange="previewFile(this)">
                            <div class="upload-img-box-icon">
                                <i class="fa fa-camera"></i>
                                <p class="m-0">{{__('Image')}}</p>
                            </div>
                        </div>
                        <p class="fs-12 fw-400 lh-24 text-main-color">{{ __('Accepted Image Files') }}
                            : {{__('JPEG, JPG, PNG')}}<br> {{ __('Recommend Size') }}: 300 x 300 (1MB)</p>
                    </div>
                </div>

                <div class="d-flex justify-content-center justify-content-sm-start flex-wrap g-14 pt-24">
                    <a href="{{route('admin.user.list')}}"
                       class="bd-one bd-c-para-text bd-ra-8 py-10 px-26 bg-white fs-15 fw-600 lh-25 text-para-text">{{ __('Back') }}</a>
                    <button
                        class="bd-one bd-c-main-color bd-ra-8 py-10 px-26 bg-main-color fs-15 fw-600 lh-25 text-white"
                        type="submit">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Page content area end -->

@endsection

@push('script')

    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/user.js')}}"></script>
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>

@endpush
