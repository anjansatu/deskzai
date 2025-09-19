@php
    $counter = 1;
@endphp
@foreach($conversationData as $conversation)
    <div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
        <div class="view-post  @if($conversation->user->role == USER_ROLE_ADMIN) admin @elseif($conversation->user->role == USER_ROLE_AGENT) maintainer @else customer @endif ">
            <div class="single-post-view">
                <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-17 mb-17 fs-18 fw-600 lh-22 text-title-black">
                    <!-- Author -->
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center g-10 flex-sm-wrap">
                        <div class="w-30 h-30 rounded-circle overflow-hidden">
                            <img src="{{ getFileUrl($conversation->user->image) }}" alt=""
                                 class="w-100 h-100 object-fit-cover">
                        </div>
                        <div class="">
                            <h4 class="fs-14 fw-600 lh-22 text-title-black">{{getAgentFakeNameConfig2($conversation->user->tenant_id)==1?$conversation->user->username??"No Name":$conversation->user->name}}</h4>
                            <p class="roll fs-14 fw-400 lh-24 text-para-text">{{getRoleName($conversation->user->role)}}</p>
                        </div>
                    </div>
                    <!--  -->
                    <div class="d-flex flex-sm-row flex-column-reverse align-items-end align-items-sm-center g-10">
                        <div class="post-date">
                            <p class="fs-14 fw-400 lh-24 text-para-text">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $conversation->created_at)->format('Y-m-d')}}
                                | {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $conversation->created_at)->format('g:i A')}}</p>
                            <p class="fs-14 fw-400 lh-24 text-para-text text-end">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $conversation->created_at )->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>

                <div>
                    {!!$conversation->body!!}
                </div>

                <div class="image-type">
                    @if($conversation->file_id)
                        <div class="d-flex g-10 flex-wrap">
                            @foreach(json_decode($conversation->file_id) as $key=>$fileData)
                                @if(in_array(getFileType($fileData), ['image/jpeg','image/jpg','image/png','image/webp']))
                                    <a class="test-popup-link w-40 h-40 bd-one bd-c-stroke bd-ra-4"
                                       href="{{ getFileUrl($fileData) }}"><img src="{{ getFileUrl($fileData) }}" alt="" class="w-100 h-100 object-fit-cover"></a>
                                @else
                                    <a href="{{ getFileUrl($fileData) }}" target="_blank" class="text-para-text">
                                        <span>{{getFileName($fileData)}}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @php
        $counter++;
    @endphp
@endforeach

