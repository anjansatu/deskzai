@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/summernote/summernote-lite.min.css') }}" />
@endpush
@section('content')

    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
            <div class="row rg-20">
                <input type="hidden" id="news-list-route" value="{{ route('admin.setting.frontend.knowledge.index') }}">
                <div class="col-xl-3">
                    @include('admin.setting.partials.frontend-sidebar')
                </div>
                <div class="col-xl-9">
                    <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
                        <!-- Search - Add -->
                        <div class="d-flex flex-column-reverse flex-sm-row justify-content-center justify-content-md-between align-items-center flex-wrap g-10 pb-18">
                            <div class="flex-grow-1">
                                <div class="search-one flex-grow-1 max-w-282">
                                    <input type="text" id="knowledgeAdminSearch" placeholder="{{__('Search here')}}..."/>
                                    <button class="icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.71401 15.7857C12.6194 15.7857 15.7854 12.6197 15.7854 8.71428C15.7854 4.80884 12.6194 1.64285 8.71401 1.64285C4.80856 1.64285 1.64258 4.80884 1.64258 8.71428C1.64258 12.6197 4.80856 15.7857 8.71401 15.7857Z"
                                                stroke="#707070" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.3574 18.3571L13.8574 13.8571" stroke="#707070" stroke-width="1.35902"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <button class="d-inline-flex bd-ra-8 bg-main-color py-8 px-26 fs-15 fw-600 lh-25 text-white add-knowledge-modal" type="button" data-bs-toggle="modal" data-bs-target="#add-modal">
                                    {{ __('+ Add New') }}
                            </button>
                        </div>
                            <table class="table zTable zTable-last-item-right" id="knowledgeDataTable">
                                <thead>
                                    <tr>
                                        <th><div class="text-nowrap">{{ __('Category Name') }}</div></th>
                                        <th><div>{{ __('Title') }}</div></th>
                                        <th><div>{{ __('Status') }}</div></th>
                                        <th><div>{{ __('Action') }}</div></th>
                                    </tr>
                                </thead>
                            </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="add-modal" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                        <div class="p-sm-25 p-15">
                            <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                                <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add New') }}</h5>
                                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form class="ajax reset" action="{{ route('admin.setting.frontend.knowledge.store') }}"
                                  method="post"
                                  data-handler="commonResponseForModal" id="knowledgeAddForm">
                                <input type="hidden" name="knowledge_category_id" value="{{ $knowledge }}">
                                @csrf

                                    <div class="row rg-24">
                                        <div class="col-12">
                                            <label class="zForm-label">{{ __('Knowledge Category') }}</label>
                                            <select name="knowledge_category_id" class="form-select zForm-control" required>
                                                <option value="" disabled selected>{{__('Select a category')}}</option>
                                                @foreach ($knowledge as $knowledges)
                                                    <option value="{{ $knowledges->id }}">{{ $knowledges->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="zForm-label">{{ __('Title') }}<span class="text-danger">*</span></label>
                                            <input type="text" name="title" class="zForm-control" placeholder="{{ __('Title') }}">
                                        </div>
                                        <div class="col-12">
                                            <label class="zForm-label">{{__('Description')}} <span class="text-danger">*</span></label>
                                            <textarea name="description" class="summernoteOne" placeholder="{{ __("Description") }}"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label class="zForm-label">{{ __('Status') }}</label>
                                            <select name="status" class="form-select zForm-control">
                                                <option value="1">{{ __('Active') }}</option>
                                                <option value="0">{{ __('Deactive') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Modal section start -->
            <div class="modal fade" id="edit-modal" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                    </div>
                </div>
            </div>

    </div>
@endsection
@push('script')
    <script src="{{ asset('admin/libs/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom/knowledge.js') }}"></script>
    <script src="{{ asset('admin/js/custom/blogs.js') }}"></script>
@endpush
