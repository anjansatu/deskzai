<div class="">
    <div class="bd-b-one bd-c-stroke pb-20 mb-20 d-flex align-items-center flex-wrap justify-content-between g-10">
        <h4 class="fs-18 fw-600 lh-22 text-title-black">{{__('Chat Configuration')}}</h4>
        <button type="button" class="bd-one bd-c-border-color rounded-circle w-25 h-25 bg-transparent text-border-color" data-bs-dismiss="modal" aria-label="Close">
            <i class="fa-solid fa-times"></i>
        </button>
    </div>
    <form action="{{ route('admin.setting.chat.configur') }}" method="post"
          class="form-horizontal" data-handler="commonResponseForModal">
        @csrf
        <div class="form-group text-black mb-10">
            <label class="w-100 mb-10">{{ __('Need Help?') }} </label>
            <input type="text" min="0" max="100" step="any" @if (!empty($chatConfigurData->chat_title)) value="{{$chatConfigurData->chat_title}}" @endif  name="chat_title" class="form-control">
        </div>
        <div class="form-group text-black mb-10">
            <label class="w-100 mb-10">{{ __('Send Us a Message') }} </label>
            <input type="text" min="0" max="100" step="any" @if (!empty($chatConfigurData->message_title)) value="{{$chatConfigurData->message_title}}" @endif name="message_title" class="form-control">
        </div>
        <div class="form-group text-black mb-10">
            <label class="w-100 mb-10">{{ __('We typically reply in a few hours') }} </label>
            <input type="text" min="0" max="100" step="any" @if (!empty($chatConfigurData->message_title)) value="{{$chatConfigurData->message_discription}}" @endif name="message_discription" class="form-control">
        </div>
        <div class="row text-end justify-content-end">
            <div class="col-md-12">
                <button class="btn btn-blue" type="submit">{{ __('Update') }}</button>
            </div>
        </div>
    </form>
</div>


