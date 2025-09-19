<div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
    <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
    <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
</div>
<form class="ajax reset" action="{{ route('admin.tickets.assignTicketsDataStore') }}" method="post"
      data-handler="commonResponseForModal">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" value="{{$singleData->id}}">
        <div class="row">
            <div class="col-12">
                <div class="input__group mb-25">
                    <label class="form-label">{{ __('Group User') }}</label>
                    <div class="input-group">
                        <select name="group_user[]" id="group_user"
                            data-selected-text-format="count" multiple
                            class="sf-select my-custom-select form-select selectpicker w-100 user_role">
                            @foreach ($userList as $user)
                                <option value="{{$user->id}}"
                                    @if(in_array($user->id,$ticketUserData)) selected @endif>{{ $user->email.'('.getRoleName(USER_ROLE_AGENT).')' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="input__group mb-25">
                    <label class="form-label">{{ __('Is Active') }}</label>
                    <div class="input-group">
                        <select name="is_active" class="form-control">
                            <option value="1" selected>{{ __('Active') }}</option>
                            <option value="0" >{{ __('Deactive') }}</option>
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
