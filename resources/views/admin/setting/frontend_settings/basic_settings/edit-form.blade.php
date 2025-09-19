<div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
    <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
    <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<form class="ajax reset" action="{{ route('admin.setting.frontend.feature.update', $feature->id) }}" method="post"
      data-handler="commonResponseForModal">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$feature->id}}">
        <div class="row">
            <div class="col-12">
                <div class="input__group mb-25">
                    <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                    <input type="text" name="title" placeholder="{{ __('Title') }}" value="{{$feature->title}}">
                </div>
            </div>
            <div class="col-12">
                <div class="input__group mb-25">
                    <label for="description">{{ __('Description') }} <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="description" rows="5"
                              id="">{{$feature->description}}</textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="input__group mb-25">
                    <label for="icon" class="text-lg-right text-black"> {{__('Icon')}} <span
                            class="text-danger">*</span></label>
                    <div class="upload-img-box">
                        <img src="{{ getFileUrl($feature->icon) }}">
                        <input type="file" name="icon" accept="image/*" onchange="previewFile(this)">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="input__group mb-25">
                    <label class="form-label">{{ __('Status') }}</label>
                    <div class="input-group">
                        <select name="status" class="form-select zForm-control">
                            <option value="1" {{$feature->status == 1?'selected':''}}>{{ __('Active') }}</option>
                            <option value="0" {{$feature->status == 0?'selected':''}}>{{ __('Deactive') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
    </div>
</form>
