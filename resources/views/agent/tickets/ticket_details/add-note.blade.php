<form action="{{route('agent.notes.noteStore')}}" method="post" class="form-horizontal" enctype="multipart/form-data" data-handler="commonResponseForModal">
    @csrf
    <div class="modal fade" id="noteAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bd-c-stroke bd-one bd-ra-10">
                <div class="p-sm-25 p-15">

                    <div class="d-flex justify-content-between align-items-center g-10 pb-20 mb-17 bd-b-one bd-c-stroke">
                        <h5 class="fs-18 fw-600 lh-22 text-title-black">{{ __('Add Ticket Note') }}</h5>
                        <button type="button" class="bd-one bd-c-stroke rounded-circle w-24 h-24 bg-transparent text-para-text fs-13" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-times"></i></button>
                    </div>
                    <input type="hidden" name="ticket_id" value="" id="noteTickeId">
                    <input type="hidden" name="id" value="" id="noteId">
                    <div class="noteIntoPart">
                        <label class="zForm-label">{{__('Note Details')}}:</label>
                        <textarea name="note_details" id="note_details" class="zForm-control" placeholder="{{__('Note Details')}}"></textarea>
                    </div>
                    <div class="d-flex g-12 mt-20">
                        <input type="hidden" name="note_id" value="{{$roles->id ?? ''}}" id="note_id">
                        <button type="button" class="py-10 px-26 bg-white bd-one bd-c-para-text bd-ra-8 fs-15 fw-600 lh-25 text-para-text" data-bs-dismiss="modal">{{__('Back')}}</button>
                        <button type="submit" data-bs-dismiss="modal" class="m-0 fs-15 border-0 fw-500 lh-25 text-white py-10 px-26 bg-main-color bd-ra-12">{{__('Add Note')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

