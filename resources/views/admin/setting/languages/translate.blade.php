@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush
@section('content')
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-24 fw-500 lh-34 text-title-black pb-16">{{ $pageTitle }}</h4>
        <div class="bg-white p-sm-25 p-15 bd-one bd-c-stroke bd-ra-8">
            <input type="hidden" id="language-route" value="{{ route('admin.setting.languages.index') }}">
            <div class="d-flex flex-wrap gap-2 item-title justify-content-between mb-20">
                <button type="button" class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white"
                        data-bs-toggle="modal"
                        data-bs-target="#importModal" title="Import Keywords">
                    {{__('Import Keywords')}}
                </button>
                <button type="button"
                        class="border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white addmore"><i
                        class="fa fa-plus"></i>
                    {{__('Add More')}}
                </button>
            </div>
            <div class="customers__table">
                <table class="table zTable zTable-last-item-right">
                    <thead>
                    <tr>
                        <th>
                            <div>{{ __('Key') }}</div>
                        </th>
                        <th>
                            <div>{{ __('Value') }}</div>
                        </th>
                        <th>
                            <div>{{ __('Action') }}</div>
                        </th>
                    </tr>
                    </thead>
                    <tbody id="append">
                    @foreach ($translators as $key => $value)
                        <tr>
                            <td>
                                            <textarea type="text" class="key form-control" readonly
                                                      required>{!! $key !!}</textarea>
                            </td>
                            <td>
                                <input type="hidden" value="0"
                                       class="is_new">
                                <textarea type="text" class="val form-control"
                                          required>{!! $value !!}</textarea>
                            </td>
                            <td>
                                <button type="button"
                                        class="updateLangItem border-0 bg-main-color py-8 px-26 bd-ra-8 fs-15 fw-600 lh-25 text-white"
                                >{{ __('Update') }}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal section start -->
    <div class="modal fade" id="importModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                <form class="ajax" action="{{ route('admin.setting.languages.import') }}" method="POST"
                      data-handler="languageHandler">
                    @csrf
                    <input type="hidden" name="current" value="{{ $language->iso_code }}">
                    <div
                        class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Import Language') }}</h5>
                        <button type="button" class="btn-close modal-close-btn-2" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-inner-form-box">
                            <div class="row">
                                <div class="mb-30">
                                    <span
                                        class="text-danger text-center">{{ __('Note: If you import keywords, your current keywords will be deleted and replaced by the imported keywords.') }}</span>
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label for="status" class="label-text-title color-heading font-medium mb-2">
                                        {{ __('Language') }} </label>
                                    <select name="import" class="form-select flex-shrink-0 export shadow-none"
                                            id="inputGroupSelect02">
                                        <option value=""> {{ __('Select Option') }} </option>
                                        @foreach ($languages as $lang)
                                            <option value="{{ $lang->iso_code }}">{{ __($lang->language) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-start g-16">
                        <button type="button" class="theme-btn-back btn btn-secondary" data-bs-dismiss="modal"
                                title="Back">{{ __('Back') }}</button>
                        <button type="submit" class="theme-btn btn btn-primary"
                                title="Submit">{{ __('Import') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="updateLangItemRoute"
           value="{{ route('admin.setting.languages.update.translate', [$language->id]) }}">
@endsection

@push('script')
    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/languages.js')}}"></script>
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush
