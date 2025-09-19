<form action="{{route('admin.conversations.instantMessage')}}" method="post" class="ajax form-horizontal" enctype="multipart/form-data" data-handler="commonResponseForModal">
    @csrf
    <div class="modal fade" id="InstantModal" tabindex="-2" aria-labelledby="InstantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content bd-c-stroke bd-one bd-ra-10">
          <div class="p-sm-25 p-15">

              <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                  <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add Instant Reply') }}</h5>
                  <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
              </div>

            <div class="row rg-24">
                <input type="hidden" value="" name="id" class="ir-id">
                <div class="col-12">
                  <label class="zForm-label">{{__('Title:')}}</label>
                  <input type="text" placeholder="{{__('Title')}}" name="title" id="title" class="zForm-control">
                </div>
                <div class="col-12">
                  <label class="zForm-label">{{__('Message:')}}</label>
                  <textarea name="message" id="message" class="zForm-control" placeholder="{{__('Message:')}}"></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-center justify-content-sm-start flex-wrap g-14 pt-25">
              <button type="button" class="bd-one bd-c-para-text bd-ra-8 py-10 px-26 bg-white fs-15 fw-600 lh-25 text-para-text" data-bs-dismiss="modal">{{__('Back')}}</button>
              <button type="submit" class="bd-one bd-c-main-color bd-ra-8 py-10 px-26 bg-main-color fs-15 fw-600 lh-25 text-white" id="InstantModalButton">{{__('Add Reply')}}</button>
            </div>

          </div>
      </div>
    </div>
  </div>
</form>

