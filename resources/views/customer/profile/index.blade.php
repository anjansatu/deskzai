@extends('customer.layouts.app')
@push('title')
    {{ __('Profile') }}
@endpush

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <!-- profile information start-->
        <ul class="nav nav-tabs zTab-reset zTab-four flex-wrap pl-sm-20" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="customerProfileInfo-tab" data-bs-toggle="tab"
                        data-bs-target="#customerProfileInfo-tab-pane" type="button" role="tab"
                        aria-controls="customerProfileInfo-tab-pane"
                        aria-selected="true">{{__("Profile Information")}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="customerPassword-tab" data-bs-toggle="tab"
                        data-bs-target="#customerPassword-tab-pane" type="button" role="tab"
                        aria-controls="customerPassword-tab-pane" aria-selected="false">{{__('Password')}}</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="customerProfileInfo-tab-pane" role="tabpanel"
                 aria-labelledby="customerProfileInfo-tab" tabindex="0">
                <div class="bg-white bd-one bd-c-stroke bd-ra-10 p-sm-30 p-15">
                    <form action="{{route('customer.profile.update')}}" method="post" class="form-horizontal"
                          enctype="multipart/form-data">
                        @csrf

                        <!-- Upload Profile Photo Box Start -->
                        <div class="upload-profile-photo-box ">
                            <div class="img-area d-flex align-items-center g-20 pb-24">
                                <div class="profileImgpart rounded-circle overflow-hidden sf-h-100 sf-w-100">
                                    <img id="blah" src="{{ getFileUrl(auth()->user()->image) }}" alt="your image"
                                         class="w-100 h-100 object-fit-cover"/>
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                             viewBox="0 0 30 30"
                                             fill="none">
                                            <circle cx="15" cy="15" r="14.5" fill=#007aff stroke="white"/>
                                            <path
                                                d="M15.0005 18.2C16.1787 18.2 17.1339 17.2449 17.1339 16.0667C17.1339 14.8885 16.1787 13.9334 15.0005 13.9334C13.8223 13.9334 12.8672 14.8885 12.8672 16.0667C12.8672 17.2449 13.8223 18.2 15.0005 18.2Z"
                                                fill="white"/>
                                            <path
                                                d="M19.2664 11.2667H18.0824L17.8531 10.344C17.7663 9.99812 17.5665 9.69113 17.2853 9.47178C17.0041 9.25244 16.6577 9.13333 16.3011 9.13335H13.6984C13.3418 9.13333 12.9954 9.25244 12.7142 9.47178C12.433 9.69113 12.2332 9.99812 12.1464 10.344L11.9171 11.2667H10.7331C10.0258 11.2667 9.34755 11.5476 8.84745 12.0477C8.34736 12.5478 8.06641 13.2261 8.06641 13.9333V18.2C8.06641 18.9073 8.34736 19.5855 8.84745 20.0856C9.34755 20.5857 10.0258 20.8667 10.7331 20.8667H19.2664C19.9737 20.8667 20.6519 20.5857 21.152 20.0856C21.6521 19.5855 21.9331 18.9073 21.9331 18.2V13.9333C21.9331 13.2261 21.6521 12.5478 21.152 12.0477C20.6519 11.5476 19.9737 11.2667 19.2664 11.2667ZM14.9997 19.2667C14.3668 19.2667 13.7482 19.079 13.2219 18.7274C12.6957 18.3758 12.2855 17.876 12.0433 17.2913C11.8011 16.7065 11.7378 16.0631 11.8612 15.4424C11.9847 14.8217 12.2895 14.2515 12.737 13.8039C13.1845 13.3564 13.7547 13.0516 14.3755 12.9282C14.9962 12.8047 15.6396 12.8681 16.2243 13.1103C16.8091 13.3525 17.3088 13.7626 17.6604 14.2889C18.0121 14.8151 18.1997 15.4338 18.1997 16.0667C18.1997 16.9154 17.8626 17.7293 17.2625 18.3294C16.6624 18.9295 15.8484 19.2667 14.9997 19.2667Z"
                                                fill="white"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type='file' id="imgInp" name="profile_image" class="d-none"/>
                                <label for="imgInp"
                                       class="fs-15 fw-500 lh-25 text-main-color py-8 px-10 bd-one bd-c-main-color bd-ra-6 cursor-pointer">{{__("Change Image")}}</label>
                            </div>
                        </div>
                        <!-- Upload Profile Photo Box End -->
                        <div class="row rg-24">
                            <div class="col-md-6">
                                <label class="zForm-label">{{__("Full Name")}} <span>*</span></label>
                                <input type="text" class="zForm-control" placeholder="{{__("Full Name")}}" name="name"
                                       value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-6">
                                <label class="zForm-label">{{__("User Name")}} <span>*</span></label>
                                <input type="text" name="username" class="zForm-control"
                                       placeholder="{{__("User Name")}}" value="{{Auth::user()->username}}">
                            </div>
                            <div class="col-md-6">
                                <label class="zForm-label">{{__("Email address")}} <span>*</span></label>
                                <input type="text" class="zForm-control" disabled placeholder="{{__("Email address")}}"
                                       name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-md-6">
                                <label class="zForm-label">{{__("Phone Number")}}<span>*</span></label>
                                <input type="tel" class="zForm-control" placeholder="{{__("Phone Number")}}"
                                       name="mobile" value="{{Auth::user()->mobile}}">
                            </div>
                            <div class="col-md-6">
                                <label class="zForm-label">{{__("Location")}} <span>*</span></label>
                                <input type="text" class="zForm-control" placeholder="{{__("Location")}}" name="address"
                                       value="{{Auth::user()->address}}">
                            </div>
                            <div class="col-md-6">
                                <label class="zForm-label">{{ __('Time Zone') }} <span>*</span></label>
                                <select name="app_timezone" class="form-control select2">
                                    @foreach($timezones as $timezone)
                                        <option
                                            value="{{ $timezone }}" {{$timezone == auth()->user()->app_timezone? 'selected' : ''}} > {{ $timezone }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit"
                                class="fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{__("Update Profile")}}</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="customerPassword-tab-pane" role="tabpanel"
                 aria-labelledby="customerPassword-tab" tabindex="0">
                <div class="bg-white bd-one bd-c-stroke bd-ra-10 p-sm-30 p-15">
                    <form action="{{route('customer.profile.change-password')}}" method="post" class="form-horizontal">
                        @csrf
                        <div class="row rg-24">
                            <div class="col-md-6">
                                <label class="zForm-label">{{__("Current Password")}} <span>*</span></label>
                                <input type="password" name="old_password" class="zForm-control" placeholder="*******">
                            </div>
                            <div class="col-md-6">
                                <label class="zForm-label">{{__("New Password")}} <span>*</span></label>
                                <input type="password" name="password" class="zForm-control" placeholder="*******">
                            </div>
                            <div class="col-md-6">
                                <label class="zForm-label">{{__("Confirm Password")}} <span>*</span></label>
                                <input type="password" name="password_confirmation" class="zForm-control"
                                       placeholder="*******">
                            </div>
                        </div>
                        <button type="submit"
                                class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{__("Update Password")}}</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- profile information end-->
    </div>

@endsection
@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush
