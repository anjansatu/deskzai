<div class="p-sm-25 p-15">
    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update Section') }}</h5>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13"
                data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>
    <form class="ajax reset" action="{{ route('admin.setting.frontend.section.update') }}" method="post"
          data-handler="settingCommonHandler">
        @csrf
        <input type="hidden" name="slug" value="{{ $section->slug }}">

        <div class="row rg-24">
            <input name="id" type="hidden" value="{{ $section->id }}">
            @if($section->slug != 'growing_company')
                <div class="col-12">

                    <label class="zForm-label">{{ __('Title') }}<span class="text-danger">*</span></label>
                    <input class="zForm-control" type="text" name="title" placeholder="{{ __('Title') }}"
                           value="{{ $section->title }}">

                </div>
                <div class="col-12">

                    <label class="zForm-label">{{ __('Description') }}<span class="text-danger">*</span></label>
                    <textarea name="description" class="zForm-control"
                              placeholder="{{ __('Description') }}">{{ $section->description }}</textarea>

                </div>
            @endif
            <div class="col-12">

                <label class="zForm-label">{{ __('Status') }}<span class="text-danger">*</span></label>
                <select name="status" class="form-select zForm-control">
                    <option {{ $section->status == 1 ? 'selected' : '' }} value="1">{{ __('Active') }}
                    </option>
                    <option {{ $section->status == 0 ? 'selected' : '' }} value="0">{{ __('Deactivate') }}
                    </option>
                </select>

            </div>
            @if ($section->has_image == STATUS_ACTIVE)
                <div class="col-12">

                    <label for="image" class="zForm-label">{{ __('Image') }} <span class="text-danger">*</span></label>
                    <div class="upload-img-box">
                        <img src="{{ getFileUrl($section->image) }}">
                        <input type="file" name="image" accept="image/*" onchange="previewFile(this)">
                    </div>

                </div>
            @endif
        </div>


        <button type="submit"
                class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Update') }}</button>

    </form>
</div>
