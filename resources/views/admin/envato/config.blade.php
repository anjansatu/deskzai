@extends('admin.layouts.app')
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-24 fw-500 lh-34 text-black pb-18">{{ $pageTitle }}</h4>
        <div class="p-sm-30 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-20">
            <input type="hidden" id="statusChangeRoute" value="{{ route('admin.envato.config-store') }}">
            <input type="hidden" id="configureUrl" value="{{ route('admin.envato.config-modal') }}">
            <input type="hidden" id="helpUrl" value="{{ route('admin.envato.config-help') }}">
            <form class="ajax" action="{{route('admin.envato.config-store')}}" method="POST"
                  enctype="multipart/form-data" data-handler="settingCommonHandler">
                @csrf

                <table class="table zTable zTable-last-item-right">
                    <thead>
                    <tr>
                        <th>
                            <div>{{ __("Extension") }}</div>
                        </th>
                        <th>
                            <div>{{ __("Action") }}</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td id="licence-enable">
                            <h6>{{ __('Enable purchase code to New Ticket') }}</h6>
                            <small
                                class="fst-italic fw-normal">({{ __('If you enable this, Customer can see the purchase code field when create ticket.')}}
                                )</small>
                        </td>
                        <td>
                            <div class="action__buttons d-flex justify-content-end">
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeEnvatoSettingStatus(this,'enable_purchase_code')"
                                           value="1"
                                           {{ isset($envatoConfigData->enable_purchase_code) && $envatoConfigData->enable_purchase_code == STATUS_ACTIVE ? 'checked' : '' }} name="enable_purchase_code"
                                           type="checkbox" role="switch"
                                           id="enable_purchase_code">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr id="licence-details"
                        class="{{ isset($envatoConfigData->enable_purchase_code) && $envatoConfigData->enable_purchase_code == STATUS_ACTIVE ? '' : 'd-none' }}">
                        <td>
                            <h6>{{ __('Envato Licence Details') }}</h6>
                            <small
                                class="fst-italic fw-normal">({{ __('If you enable this Envato Expired switch, Agent & author can see his licence Details.')}}
                                )</small>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <div class="zCheck form-switch">
                                    <input class="form-check-input mt-0"
                                           onchange="changeEnvatoSettingStatus(this,'envato_expired_on')"
                                           value="1"
                                           {{ isset($envatoConfigData->envato_expired_on) && $envatoConfigData->envato_expired_on == STATUS_ACTIVE ? 'checked' : '' }} name="envato_expired_on"
                                           type="checkbox" role="switch" id="envato_expired_on">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr id="licence-api-tocken">
                        <td>
                            <h6>{{ __('Envato Personal Api Token') }}</h6>
                        </td>
                        <td>
                            <div class="d-flex justify-content-end g-10">
                                <button type="button"
                                        class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                        onclick="configureModal('api_token_config')" title="{{ __('Configure') }}">
                                    {{ __('Configure') }}
                                </button>
                                <button type="button"
                                        class="d-inline-block fs-15 fw-500 lh-25 text-white py-6 px-15 bg-main-color hover-bg-one border-0 bd-ra-8"
                                        onclick="helpModal('api_token_config')" title="{{ __('Help') }}">
                                    {{ __('Help') }}
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>

    </div>
    <!-- Page content area end -->
    <!-- Configuration section start -->
    <div class="modal fade main-modal" id="configureModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">

            </div>
        </div>
    </div>
    <!-- Configuration section end -->
    <!-- Help section start -->
    <div class="modal fade main-modal" id="helpModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">

            </div>
        </div>
    </div>
    <!-- Help section end -->

@endsection
@push('script')
    <script src="{{ asset('admin/js/custom/envato_configuration.js') }}"></script>
@endpush
