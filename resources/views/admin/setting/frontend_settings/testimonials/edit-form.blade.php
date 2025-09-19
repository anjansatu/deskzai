<div class="p-sm-25 p-15">
    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>
    <form class="ajax reset" action="{{ route('admin.setting.frontend.testimonial.update', $testimonial->id) }}"
          method="post"
          data-handler="commonResponseForModal">
        @csrf

        <input type="hidden" name="id" value="{{$testimonial->id}}">
        <div class="row rg-24">
            <div class="col-12">
                <label class="zForm-label" for="title">{{ __('Client Name') }} <span class="text-danger">*</span></label>
                <input class="zForm-control" type="text" name="name" placeholder="{{ __('Client Name') }}" id="title" value="{{$testimonial->name}}"/>
            </div>
            <div class="col-12">
                <label class="zForm-label" for="description">{{ __('Designation') }} <span class="text-danger">*</span></label>
                <textarea class="zForm-control" name="designation" placeholder="{{ __('Designation') }}" id="">{{$testimonial->designation}}</textarea>
            </div>
            <div class="col-12">
                <label class="zForm-label" for="description">{{ __('Comment') }} <span class="text-danger">*</span></label>
                <textarea class="zForm-control" name="comment" id="">{{$testimonial->comment}}</textarea>
            </div>
            <div class="col-12">
                <label class="zForm-label" for="description">{{ __('Review') }} <span class="text-danger">*</span></label>
                <input type="number" name="star" class="zForm-control" value="{{$testimonial->star}}">
            </div>
            <div class="col-12">
                <label class="zForm-label">{{ __('Status') }}</label>
                <select name="status" class="form-select zForm-control">
                    <option value="1" {{$testimonial->status == 1?'selected':''}}>{{ __('Active') }}</option>
                    <option value="0" {{$testimonial->status == 0?'selected':''}}>{{ __('Deactive') }}</option>
                </select>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-12">
                        <label for="icon" class="zForm-label"> {{__('Client Image')}} <span class="text-danger">*</span></label>
                        <div class="upload-img-box">
                            <img src="{{ getFileUrl($testimonial->image) }}">
                            <input type="file" name="image" accept="image/*" onchange="previewFile(this)">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-12">
                        <label for="icon" class="zForm-label"> {{__('Company Logo')}} <span class="text-danger">*</span></label>
                        <div class="upload-img-box">
                            <img src="{{ getFileUrl($testimonial->logo) }}">
                            <input type="file" name="logo" accept="image/*" onchange="previewFile(this)">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Update') }}</button>
    </form>
</div>
