<div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
    <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
    <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<form class="ajax reset" action="{{ route('admin.group.store') }}" method="post"
      data-handler="commonResponseForModal">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$singleData->id}}">
        <div class="row">
            <div class="col-12">
                <div class="input__group mb-25">
                    <label for="title">{{ __('Name') }} <span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="" value="{{$singleData->name}}">
                </div>
            </div>
            <div class="col-12">
                <div class="input__group mb-25">
                    <label class="form-label">{{ __('Group User') }}</label>
                    <div class="input-group ">
                        <select name="group_user[]" class="form-control js-example-basic-multiple" multiple="multiple">
                            @foreach($userList as $user)
                                    <option value="{{$user->id}}" {{in_array($user->id,json_decode($singleData->user_id))?'selected':''}}>{{ $user->email.'('.getRoleName(USER_ROLE_AGENT).')' }}</option>
                            @endforeach
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
