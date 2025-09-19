@extends('admin.layouts.app')

@section('content')
    <!-- Page content area start -->
    <div data-aos="fade-up" data-aos-duration="1000" class="p-sm-30 p-15">
        <h4 class="fs-24 fw-500 lh-34 text-title-black pb-16">{{__('Create Dynamic Fields For Ticket Create')}}</h4>
        <div class="bd-one bd-c-stroke bd-ra-8 bg-white p-sm-25 p-15">
            <form class="ajax reset" action="{{route('admin.dynamic-fields-store')}}" method="post"
                  data-handler="dynamicFieldResponse">
                @csrf
                <div class="table-responsive">
                    <table class="table zTable zTable-last-item-right" id="myTable">
                        <thead>
                        <tr>
                            <th>
                                <div>{{__("Type")}}</div>
                            </th>
                            <th>
                                <div>{{__("Level")}}</div>
                            </th>
                            <th>
                                <div>{{__("Placeholder")}}</div>
                            </th>
                            <th>
                                <div>{{__("Required")}}</div>
                            </th>
                            <th>
                                <div class="text-nowrap">{{__("Field Width")}}</div>
                            </th>
                            <th>
                                <div>{{__("Order")}}</div>
                            </th>
                            <th>
                                <div>
                                    <button class="w-100 border-0 bd-ra-4 bg-main-color text-white" type="button"
                                            id="addRowBtn"><i class="fa fa-plus"></i></button>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <select class="form-control" name="type[]" disabled>
                                    <option>{{__("Type")}}</option>
                                    <option value="{{TEXT_FIELD_ID}}" selected>{{__("Text")}}</option>
                                    <option value="{{TEXTAREA_FIELD_ID}}">{{__("Textarea")}}</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="level[]" value="{{__('Subject')}}" class="zForm-control"
                                       disabled>
                            </td>
                            <td>
                                <input type="text" name="placeholder[]" value="{{__('Subject')}}" class="zForm-control"
                                       disabled>
                            </td>
                            <td>
                                <select class="form-control" name="required[]" disabled>
                                    <option>{{__("Required")}}</option>
                                    <option value="{{REQUIRED_NO}}">No</option>
                                    <option value="{{REQUIRED_YES}}" selected>Yes</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="width[]" value="65" class="zForm-control" disabled>
                            </td>
                            <td>
                                <input type="number" name="order[]" value="1" class="zForm-control" disabled>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="w-30 h-30 bd-one bd-c-stroke rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-trash df-delete-btn-disable"></i></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <select class="form-control" name="type[]" disabled>
                                    <option>{{__("Type")}}</option>
                                    <option value="" selected>{{__("Option")}}</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="level[]" value="{{__('Category')}}" class="zForm-control"
                                       disabled>
                            </td>
                            <td>
                                <input type="text" name="placeholder[]" value="{{__('Category')}}" class="zForm-control"
                                       disabled>
                            </td>
                            <td>
                                <select class="form-control" name="required[]" disabled>
                                    <option>{{__("Required")}}</option>
                                    <option value="{{REQUIRED_NO}}">No</option>
                                    <option value="{{REQUIRED_YES}}" selected>Yes</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="order[]" value="35" class="zForm-control" disabled>
                            </td>
                            <td>
                                <input type="number" name="order[]" value="2" class="zForm-control" disabled>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <div
                                        class="w-30 h-30 bd-one bd-c-stroke rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa fa-trash df-delete-btn-disable"></i></div>
                                </div>
                            </td>
                        </tr>

                        @foreach($filedList as $item)
                            <tr>
                                <td>
                                    <select class="form-control" name="type[]">
                                        <option
                                            value="{{TEXT_FIELD_ID}}" {{$item->type == TEXT_FIELD_ID?'selected':''}}>
                                            Text
                                        </option>
                                        <option
                                            value="{{TEXTAREA_FIELD_ID}}" {{$item->type == TEXTAREA_FIELD_ID?'selected':''}}>
                                            Textarea
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="level[]" value="{{$item->level}}" class="zForm-control">
                                </td>
                                <td>
                                    <input type="text" name="placeholder[]" value="{{$item->placeholder}}"
                                           class="zForm-control">
                                </td>
                                <td>
                                    <select class="form-control" name="required[]">
                                        <option></option>
                                        <option
                                            value="{{REQUIRED_NO}}" {{$item->required == REQUIRED_NO?'selected':''}}>No
                                        </option>
                                        <option
                                            value="{{REQUIRED_YES}}" {{$item->required == REQUIRED_YES?'selected':''}}>
                                            Yes
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="width[]" value="{{$item->width}}" class="zForm-control">
                                </td>
                                <td>
                                    <input type="number" name="order[]" value="{{$item->order}}" class="zForm-control">
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end">
                                        <div
                                            class="w-30 h-30 bd-one bd-c-stroke rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa fa-trash df-delete-btn-disable"></i></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <button
                    class="py-10 px-26 bg-main-color bd-one bd-c-main-color bd-ra-8 fs-15 fw-600 lh-25 text-white mt-25"
                    type="submit">{{ __('Update') }}</button>

            </form>
        </div>
    </div>
    <!-- Page content area end -->
    <input type="hidden" id="TEXT_FIELD_ID" value="{{TEXT_FIELD_ID}}">
    <input type="hidden" id="TEXTAREA_FIELD_ID" value="{{TEXTAREA_FIELD_ID}}">
    <input type="hidden" id="REQUIRED_NO" value="{{REQUIRED_NO}}">
    <input type="hidden" id="REQUIRED_YES" value="{{REQUIRED_YES}}">
    <input type="hidden" id="fieldCount" value="{{count($filedList)}}">
@endsection
@push('script')
    <script src="{{asset('admin/libs/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/dynamic_field.js')}}"></script>
@endpush
