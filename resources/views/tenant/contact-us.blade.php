@extends('tenant.layouts.app')
@push('title')
    {{ __('Contact Us') }}
@endpush
@section('content')

    <section class="breadcrumb-section bg-main-color py-30 py-sm-150">
        <div class="breadcrumb-content">
            <h4 class="title">{{__("Contact Us")}}</h4>
            <ol class="breadcrumb sf-inner-breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend') }}">{{__("Home")}}</a></li>
                <li class="breadcrumb-item active"><a href="">{{__("Contact Us")}}</a></li>
            </ol>
        </div>
    </section>

    <section class="contact-page-area py-sm-150 py-30">
        <div class="container">
            <div class="text-center pb-55">
                <h4 class="lh-sm-57 lh-44 landing-section-title">{{__('Send Us a Message')}}</h4>
            </div>
            <div class="contactUs-content">
                <div class="pb-md-40 pb-20">
                    <div class="row rg-20 justify-content-center">
                        <div class="col-sm-4 col-6">
                            <div class="contactUs-item">
                                <div class="icon"><img src="{{asset('frontend')}}/assets/images/contactUs-icon-1.svg" alt=""></div>
                                @if($contactUs)
                                    <p class="text">{{ $contactUs->app_email }}</p>
                                @else
                                    <p class="text">{{__('No email found')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="contactUs-item">
                                <div class="icon"><img src="{{asset('frontend')}}/assets/images/contactUs-icon-2.svg" alt=""></div>
                                @if($contactUs)
                                    <p class="text">{{$contactUs->app_contact_number}}</p>
                                @else
                                    <p class="text">{{__('No Contact Number Found')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-6">
                            <div class="contactUs-item">
                                <div class="icon"><img src="{{asset('frontend')}}/assets/images/contactUs-icon-3.svg" alt=""></div>
                                @if($contactUs)
                                    <p class="text">{{$contactUs->app_location}}</p>
                                @else
                                    <p class="text">{{__('No Location Found')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('tenant.contact.us.store') }}" method="POST">
                    @csrf
                    <div class="contactUs-formWrap bg-white bd-one bd-c-stroke bd-ra-10">
                        <div class="row rg-24">
                            <input type="hidden" name="created_by" value={{getUserIdByTenant()}}>

                            <div class="col-md-6">
                                <div class="contact-input mb-5 pb-3">
                                    <label class="zForm-label" for="name">{{__("Your Name")}}</label>
                                    <input value="{{old('name')}}" type="text" class="zForm-control" id="name" name="name" placeholder="{{ __("Your Name") }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-input mb-5 pb-3">
                                    <label class="zForm-label" for="email">{{__('Your Email')}}</label>
                                    <input value="{{old('email')}}" type="email" class="zForm-control" id="email" name="email" placeholder="{{ __('Your Email') }}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-input mb-5 pb-3">
                                    <label class="zForm-label" for="phone">{{__('Phone Number')}}</label>
                                    <input value="{{old('phone')}}" type="text" class="zForm-control" id="phone" name="phone" placeholder="{{ __('Phone Number') }}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-input mb-5 pb-3">
                                    <label class="zForm-label" for="subject">{{__('Your Subject')}}</label>
                                    <input value="{{old('control')}}" type="text" class="zForm-control" id="subject" name="subject"
                                           placeholder="{{ __("Your Subject") }}">
                                    @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="contact-input">
                                    <label class="zForm-label" for="massage">{{__('Write Your Message')}}</label>
                                    <textarea value="{{old('message')}}" class="zForm-control" name="message" id="message" placeholder="{{ __('Enter Your Message') }}"></textarea>
                                    @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <button class="py-17 px-33 bd-ra-48 d-inline-flex border-0 bg-main-color fs-18 fw-600 lh-22 text-white mt-25" type="submit">{{__('Send massage')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
