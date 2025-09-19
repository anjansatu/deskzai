<div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white mb-24">
    <div class="view-assign">
        <div class="ticket-details">
            <h3 class="fs-18 fw-600 lh-22 text-title-black pb-8">#{{$ticketData->tracking_no??""}}-{{$ticketData->ticket_title??""}}</h3>
            <div class="fs-14 fw-400 lh-24 text-para-text pb-8">
                <p>{!! nl2br($ticketData->ticket_description)??"" !!}</p>
            </div>
            @isset($existingTagsData['names'])
                <div class="tag-key-word d-flex flex-wrap g-10">
                    @foreach($existingTagsData['names'] as $tagNames)
                        <span>{{$tagNames}}</span>
                    @endforeach
                </div>
            @endisset
        </div>

        <div class="">
            @if($ticketData->file_id)
                <div class="d-flex g-10 flex-wrap">
                    @foreach(json_decode($ticketData->file_id) as $key=>$fileData)
                        @if(in_array(getFileType($fileData), ['image/jpeg','image/jpg','image/png','image/webp']))
                            <a class="test-popup-link w-40 h-40 bd-one bd-c-stroke bd-ra-4" href="{{ getFileUrl($fileData) }}">
                                <img src="{{ getFileUrl($fileData) }}" alt="" class="w-100 h-100 object-fit-cover">
                            </a>
                        @else
                            <a href="{{ getFileUrl($fileData) }}" target="_blank">
                                <button>{{getFileName($fileData)}}</button>
                            </a>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
