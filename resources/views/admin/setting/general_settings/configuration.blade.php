@extends('admin.layouts.app')
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">

        <h4 class="fs-24 fw-500 lh-34 text-black pb-16">{{ $pageTitle }}</h4>
        <div class="bg-white p-sm-25 p-15 bd-one bd-c-stroke bd-ra-8">
            <input type="hidden" id="statusChangeRoute"
                   value="{{ route('admin.setting.configuration-settings.update') }}">
            <input type="hidden" id="configureUrl"
                   value="{{ route('admin.setting.configuration-settings.configure') }}">
            <input type="hidden" id="helpUrl" value="{{ route('admin.setting.configuration-settings.help') }}">
            <form class="ajax" action="{{route('admin.setting.configuration-settings.update')}}" method="POST"
                  enctype="multipart/form-data" data-handler="settingCommonHandler">
                @csrf
                <div class="table-responsive zTable-responsive">
                    <table class="table zTable zTable-last-item-right">
                        <thead>
                        <tr>
                            <th>
                                <div>{{ __("Extension") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Status") }}</div>
                            </th>
                            <th>
                                <div>{{ __("Action") }}</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <h6>{{ __('Email Verification') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable Email Verification, new user have to verify the email to access this system.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'email_verification_status')" value="1"
                                           {{ getOption('email_verification_status') == STATUS_ACTIVE ? 'checked' : '' }} name="email_verification_status"
                                           type="checkbox" role="switch" id="email_verification_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('email_verification_status')"
                                            title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('email_verification_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>{{ __('E-mail credentials status') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable for sending email')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'app_mail_status')" value="1"
                                           {{ getOption('app_mail_status') == STATUS_ACTIVE ? 'checked' : '' }} name="app_mail_status"
                                           type="checkbox" role="switch" id="app_mail_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('app_mail_status')" title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('app_mail_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="d-none">
                            <td>
                                <h6>{{ __('SMS credentials status') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable for sending sms')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'app_sms_status')" value="1"
                                           {{ getOption('app_sms_status') == STATUS_ACTIVE ? 'checked' : '' }} name="app_sms_status"
                                           type="checkbox" role="switch" id="app_sms_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('app_sms_status')" title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('app_sms_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <h6>{{ __('Pusher credentials status') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable for pusher')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'pusher_status')" value="1"
                                           {{ getOption('pusher_status') == STATUS_ACTIVE ? 'checked' : '' }} name="pusher_status"
                                           type="checkbox" role="switch" id="pusher_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('pusher_status')" title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('pusher_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>{{ __('Social Login (Google)') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable for Google. User can use our gmail account and sign in ')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'google_login_status')" value="1"
                                           {{ getOption('google_login_status') == STATUS_ACTIVE ? 'checked' : '' }} name="google_login_status"
                                           type="checkbox" role="switch" id="google_login_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('google_login_status')"
                                            title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('google_login_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>{{ __('Social Login (Facebook)') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable for Facebook. User can use our facebook account and sign in')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'facebook_login_status')" value="1"
                                           {{ getOption('facebook_login_status') == STATUS_ACTIVE ? 'checked' : '' }} name="facebook_login_status"
                                           type="checkbox" role="switch" id="facebook_login_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('facebook_login_status')"
                                            title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('facebook_login_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>{{ __('Google Recaptcha Credentials') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('f you enable this. The system will enable for google recaptcha credentials ')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'google_recaptcha_status')" value="1"
                                           {{ getOption('google_recaptcha_status') == STATUS_ACTIVE ? 'checked' : '' }} name="google_recaptcha_status"
                                           type="checkbox" role="switch" id="google_recaptcha_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('google_recaptcha_status')"
                                            title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('google_recaptcha_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>{{ __('Google Analytics') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable for google analytics.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'google_analytics_status')" value="1"
                                           {{ getOption('google_analytics_status') == STATUS_ACTIVE ? 'checked' : '' }} name="google_analytics_status"
                                           type="checkbox" role="switch" id="google_analytics_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('google_analytics_status')"
                                            title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('google_analytics_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>{{ __('Chat GTP-4 Api Key') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable for Chat Gtp-4 Api Key. User Can manage Chat Gtp-4 Api key')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'chat_gpt_api_key_status')" value="1"
                                           {{ getOption('chat_gpt_api_key_status') == STATUS_ACTIVE ? 'checked' : '' }} name="chat_gpt_api_key_status"
                                           type="checkbox" role="switch" id="chat_gpt_api_key_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('chat_gpt_api_key_status')"
                                            title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('chat_gpt_api_key_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="">
                            <td>
                                <h6>{{ __('Chat Setting') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable for Chat Settings. User Can manage Chat Settings.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'chat_setting_status')" value="1"
                                           {{ getOption('chat_setting_status') == STATUS_ACTIVE ? 'checked' : '' }} name="chat_setting_status"
                                           type="checkbox" role="switch" id="chat_setting_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('chat_setting_status')"
                                            title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('chat_setting_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <tr class="d-none">
                            <td>
                                <h6>{{ __('Registration Approval') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable preloader, the preloader will be show before load the content.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'registration_approval')" value="1"
                                           {{ getOption('registration_approval') == STATUS_ACTIVE ? 'checked' : '' }} name="registration_approval"
                                           type="checkbox" role="switch" id="registration_approval">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('registration_approval')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="d-none">
                            <td>
                                <h6>{{ __('Force secure password') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable preloader, the preloader will be show before load the content.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'force_secure_password')" value="1"
                                           {{ getOption('force_secure_password') == STATUS_ACTIVE ? 'checked' : '' }} name="force_secure_password"
                                           type="checkbox" role="switch" id="force_secure_password">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('force_secure_password')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="d-none">
                            <td>
                                <h6>{{ __('Agree Policy') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable preloader, the preloader will be show before load the content.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'show_agree_policy')" value="1"
                                           {{ getOption('show_agree_policy') == STATUS_ACTIVE ? 'checked' : '' }} name="show_agree_policy"
                                           type="checkbox" role="switch" id="show_agree_policy">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('show_agree_policy')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="d-none">
                            <td>
                                <h6>{{ __('Enable Force SSL') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable preloader, the preloader will be show before load the content.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'enable_force_ssl')" value="1"
                                           {{ getOption('enable_force_ssl') == STATUS_ACTIVE ? 'checked' : '' }} name="enable_force_ssl"
                                           type="checkbox" role="switch" id="enable_force_ssl">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('enable_force_ssl')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="d-none">
                            <td>
                                <h6>{{ __('Enable Dark Mode') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable preloader, the preloader will be show before load the content.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'enable_dark_mode')" value="1"
                                           {{ getOption('enable_dark_mode') == STATUS_ACTIVE ? 'checked' : '' }} name="enable_dark_mode"
                                           type="checkbox" role="switch" id="enable_dark_mode">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('enable_dark_mode')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="d-none">
                            <td>
                                <h6>{{ __('Show Language Switcher') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable preloader, the preloader will be show before load the content.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'show_language_switcher')" value="1"
                                           {{ getOption('show_language_switcher') == STATUS_ACTIVE ? 'checked' : '' }} name="show_language_switcher"
                                           type="checkbox" role="switch" id="show_language_switcher">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('show_language_switcher')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td>
                                <h6>{{ __('Email Ticket Configuration') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable this. The system will enable email ticket.')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'email_ticket_config_status')" value="1"
                                           {{ getOption('email_ticket_config_status') == STATUS_ACTIVE ? 'checked' : '' }} name="email_ticket_config_status"
                                           type="checkbox" role="switch" id="email_ticket_config_status">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-wrap g-10">
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                            onclick="configureModal('email_ticket_config_status')"
                                            title="{{ __('Configure') }}">
                                        {{ __('Configure') }}
                                    </button>
                                    <button type="button"
                                            class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-black hover-bg-one border-0 bd-ra-8"
                                            onclick="helpModal('email_ticket_config_status')" title="{{ __('Help') }}">
                                        {{ __('Help') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>{{ __('Preloader') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable preloader, the preloader will be show before load the content. ')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'app_preloader_status')" value="1"
                                           {{ getOption('app_preloader_status') == STATUS_ACTIVE ? 'checked' : '' }} name="app_preloader_status"
                                           type="checkbox" role="switch" id="app_preloader_status">
                                </div>
                            </td>
                            <td class="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h6>{{ __('Agent Rating Enable / Disable') }}</h6>
                                <small
                                    class="fst-italic fw-normal">({{ __('If you enable Agent Rating, then show this section in customer end and customer provide a rating. ')}}
                                    )</small>
                            </td>
                            <td>
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeSettingStatus(this,'agent_rating_status')" value="1"
                                           {{ getOption('agent_rating_status') == STATUS_ACTIVE ? 'checked' : '' }} name="agent_rating_status"
                                           type="checkbox" role="switch" id="agent_rating_status">
                                </div>
                            </td>
                            <td class="">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
    <!-- Page content area end -->
    <!-- Configuration section start -->
    <div class="modal fade main-modal" id="configureModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-sm-25 p-15">

            </div>
        </div>
    </div>
    <!-- Configuration section end -->

    <!-- Help section start -->
    <div class="modal fade main-modal" id="helpModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-sm-25 p-15">

            </div>
        </div>
    </div>
    <!-- Help section end -->

    <!-- Test Email section start -->
    <div class="modal fade" id="sendTestMail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-sm-25 p-15">
                <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                    <h5 class="fs-18 fw-600 lh-22 text-title-black" id="exampleModalLabel">{{__('Test Mail')}}</h5>
                    <button type="button"
                            class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                            data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                </div>
                <form method="POST" action="{{route('admin.setting.mail.test')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 text-black">
                            <label for="to" class="col-form-label">{{__('Recipient')}}:</label>
                            <input type="email" name="to" class="form-control" id="to"
                                   placeholder="{{__('Recipient Mail')}}" required>
                        </div>
                        <div class="mb-3 text-black">
                            <label for="to" class="col-form-label">{{__('Subject')}}:</label>
                            <input type="text" name="subject" class="form-control" id="to"
                                   placeholder="{{__('Subject')}}" value="Test Mail" required>
                        </div>
                        <div class="mb-3 text-black">
                            <label for="message" class="col-form-label">{{ __('Your Message') }}:</label>
                            <textarea name="message" class="form-control"
                                      id="message-text">{{ __('Hi, This is a test mail') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer button__list">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-blue mx-2">{{ __('Send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- TEST EMail section end -->

    <!-- TEST SMS section start -->
    <div class="modal fade" id="sendTestSMS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 bd-ra-4 p-sm-25 p-15">
                <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                    <h5 class="fs-18 fw-600 lh-22 text-title-black" id="exampleModalLabel">{{__('Test SMS')}}</h5>
                    <button type="button"
                            class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                            data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                </div>
                <form class="ajax reset" action="{{ route('admin.setting.sms.test') }}" method="post"
                      data-handler="commonResponse">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 text-black">
                            <label for="to" class="col-form-label">{{__('Recipient Number')}}:</label>
                            <input type="text" name="to" class="form-control" id="to"
                                   placeholder="{{__('Recipient Number')}}" required>
                        </div>
                        <div class="mb-3 text-black">
                            <label for="message" class="col-form-label">{{ __('Your Message') }}:</label>
                            <textarea name="message" class="form-control"
                                      id="message-text">{{ __('Hi, This is a test sms') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer button__list">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-blue mx-2">{{ __('Send') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- TEST SMS section end -->
@endsection
@push('script')
    <script src="{{ asset('admin/js/configuration.js') }}"></script>
@endpush
