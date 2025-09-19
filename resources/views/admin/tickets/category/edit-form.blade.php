<div class="p-sm-25 p-15">
    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Update') }}</h5>
        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
    </div>
    <form class="ajax reset" action="{{ route('admin.tickets.category-store') }}" method="post"
          data-handler="commonResponseForModal">
        @csrf

            <input type="hidden" name="id" value="{{$singleData->id}}">
            <div class="row rg-24">
                <div class="col-12">
                    <label for="title">{{ __('Name') }} <span class="text-danger">*</span></label>
                    <input class="zForm-control" type="text" name="name" placeholder="{{ __('Name') }}" value="{{$singleData->name}}">
                </div>
                <div class="col-12">
                    <label for="title">{{ __('Code') }} <span class="text-danger">*</span></label>
                    <input class="zForm-control" type="text" name="code" placeholder="" value="{{$singleData->code}}">
                </div>

                <div class="col-12">
                    <label class="zForm-label">{{ __('Group User') }}</label>
                    <select name="group_user[]" class="form-control js-example-basic-multiple-edit" multiple="multiple">
                        @foreach($userList as $user)
                            <option value="{{$user->id}}" {{in_array($user->id, $categoryUserData)?'selected':''}}>{{ $user->email.'('.getRoleName(USER_ROLE_AGENT).')' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label class="zForm-label">{{ __('Is Ticket Prefix') }}</label>
                    <select name="is_ticket_prefix" class="form-select zForm-control">
                        <option value="1" {{$singleData->is_ticket_prefix == 1?'selected':''}}>{{ __('Active') }}</option>
                        <option value="0" {{$singleData->is_ticket_prefix == 0?'selected':''}}>{{ __('Deactive') }}</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="zForm-label">{{ __('Status') }}</label>
                    <select name="status" class="form-select zForm-control">
                        <option value="1" {{$singleData->status == 1?'selected':''}}>{{ __('Active') }}</option>
                        <option value="0" {{$singleData->status == 0?'selected':''}}>{{ __('Deactive') }}</option>
                    </select>
                </div>

            </div>

        <button type="submit" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12 mt-20">{{ __('Update') }}</button>
    </form>
</div>
