<div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
    <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-17 mb-17">
        <h4 class="fs-18 fw-600 lh-22 text-title-black">{{__('All Notes')}}</h4>
        <div class="max-w-26">
            <img src="{{ asset('agent/assets/images/pin.png')}}" alt="">
        </div>
    </div>
    @php
        $counter = 1;
    @endphp
    <ul class="zList-pb-16">
        @forelse($noteData as $note)
            <li>
                <div class="p-15 bd-ra-8 bg-body-bg" id="note_{{$note->id}}">
                    <div class="d-flex justify-content-between gap-2">
                        <p class="fs-14 fw-400 lh-24 text-para-text" id="note_body_{{$note->id}}">{!! nl2br(strip_tags($note->body)) !!}</p>
                        <div class="dropdown dropdown-one">
                            <button class="dropdown-toggle p-0 bg-transparent w-30 h-30 ms-auto bd-one bd-c-stroke rounded-circle d-flex justify-content-center align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                            <ul class="dropdown-menu dropdownItem-two">
                                <li>
                                    <a href="#" class="d-flex align-items-center cg-8 editNoteBtn" data-id="{{$note->id}}" data-body="{{$note->body}}" data-ticket_id="{{$note->ticket_id}}">
                                        <div class="d-flex">
                                            <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.5 8C8.60457 8 9.5 7.10457 9.5 6C9.5 4.89543 8.60457 4 7.5 4C6.39543 4 5.5 4.89543 5.5 6C5.5 7.10457 6.39543 8 7.5 8Z" fill="#5D697A"></path>
                                                <path d="M14.9698 5.83C14.3817 4.30882 13.3608 2.99331 12.0332 2.04604C10.7056 1.09878 9.12953 0.561286 7.49979 0.5C5.87005 0.561286 4.29398 1.09878 2.96639 2.04604C1.6388 2.99331 0.617868 4.30882 0.0297873 5.83C-0.00992909 5.93985 -0.00992909 6.06015 0.0297873 6.17C0.617868 7.69118 1.6388 9.00669 2.96639 9.95396C4.29398 10.9012 5.87005 11.4387 7.49979 11.5C9.12953 11.4387 10.7056 10.9012 12.0332 9.95396C13.3608 9.00669 14.3817 7.69118 14.9698 6.17C15.0095 6.06015 15.0095 5.93985 14.9698 5.83ZM7.49979 9.25C6.857 9.25 6.22864 9.05939 5.69418 8.70228C5.15972 8.34516 4.74316 7.83758 4.49718 7.24372C4.25119 6.64986 4.18683 5.99639 4.31224 5.36596C4.43764 4.73552 4.74717 4.15642 5.20169 3.7019C5.65621 3.24738 6.23531 2.93785 6.86574 2.81245C7.49618 2.68705 8.14965 2.75141 8.74351 2.99739C9.33737 3.24338 9.84495 3.65994 10.2021 4.1944C10.5592 4.72886 10.7498 5.35721 10.7498 6C10.7485 6.86155 10.4056 7.68743 9.79642 8.29664C9.18722 8.90584 8.36133 9.24868 7.49979 9.25Z" fill="#5D697A"></path>
                                            </svg>
                                        </div>
                                        <p class="fs-14 fw-500 lh-17 text-para-text">{{__('Edit')}}</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="deleteNote('{{route('agent.notes.note-delete',$note->id)}}',{{$note->id}})" class="d-flex align-items-center cg-8">
                                        <div class="d-flex">
                                            <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.76256 2.51256C6.09075 2.18437 6.53587 2 7 2C7.46413 2 7.90925 2.18437 8.23744 2.51256C8.4448 2.71993 8.59475 2.97397 8.67705 3.25H5.32295C5.40525 2.97397 5.5552 2.71993 5.76256 2.51256ZM3.78868 3.25C3.89405 2.57321 4.21153 1.94227 4.7019 1.4519C5.3114 0.84241 6.13805 0.5 7 0.5C7.86195 0.5 8.6886 0.84241 9.2981 1.4519C9.78847 1.94227 10.106 2.57321 10.2113 3.25H13C13.4142 3.25 13.75 3.58579 13.75 4C13.75 4.41422 13.4142 4.75 13 4.75H12V13C12 13.3978 11.842 13.7794 11.5607 14.0607C11.2794 14.342 10.8978 14.5 10.5 14.5H3.5C3.10217 14.5 2.72064 14.342 2.43934 14.0607C2.15804 13.7794 2 13.3978 2 13V4.75H1C0.585786 4.75 0.25 4.41422 0.25 4C0.25 3.58579 0.585786 3.25 1 3.25H3.78868ZM5 6.37646C5.34518 6.37646 5.625 6.65629 5.625 7.00146V11.003C5.625 11.3481 5.34518 11.628 5 11.628C4.65482 11.628 4.375 11.3481 4.375 11.003V7.00146C4.375 6.65629 4.65482 6.37646 5 6.37646ZM9.625 7.00146C9.625 6.65629 9.34518 6.37646 9 6.37646C8.65482 6.37646 8.375 6.65629 8.375 7.00146V11.003C8.375 11.3481 8.65482 11.628 9 11.628C9.34518 11.628 9.625 11.3481 9.625 11.003V7.00146Z" fill="#5D697A"></path>
                                            </svg>
                                        </div>
                                        <p class="fs-14 fw-500 lh-17 text-para-text">{{__('Delete')}}</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex g-10 align-items-center flex-wrap mt-20">
                        <div class="w-55 h-55 rounded-circle overflow-hidden">
                            <img class="w-100 h-100 object-fit-cover" src="{{ getFileUrl($note->user->image) }}" alt="">
                        </div>
                        <div class="">
                            <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{$note->user->name}}</h5>
                            <p class="fs-12 fw-500 lh-18 text-para-text">({{getRoleName($note->user->role)}})</p>
                        </div>
                    </div>
                </div>
            </li>
            @php
                $counter++;
            @endphp
        @empty
            <div class="d-flex flex-column align-items-center g-20 py-20">
                <div class="notes-not-img">
                    <img src="../../../assets/images/no-data.png" alt="">
                </div>
                <h5 class="fs-24 fw-500 lh-30 text-title-black text-center">{{__('Don’t have any notes yet.')}}</h5>
                <p class="fs-14 fw-500 lh-17 text-para-text">{{__('Add your notes here.')}}</p>
            </div>
        @endforelse
    </ul>
</div>
