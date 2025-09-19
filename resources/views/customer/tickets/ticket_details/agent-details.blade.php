<div class="p-sm-25 p-15 bd-one bd-c-stroke bd-ra-10 bg-white">
    <div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-17 mb-17">
        <h4 class="fs-18 fw-600 lh-22 text-title-black">{{__('Agent Details')}}</h4>
    </div>
    <ul class="zList-pb-16">
        @forelse($ticketUserData as $assignedAgent)
            <li>
                <div class="d-flex g-10 align-items-center flex-wrap">
                    <div class="w-55 h-55 rounded-circle overflow-hidden">
                        @if( $assignedAgent['image'] == null)
                            <img title="{{$assignedAgent['name']}}" src="{{ getFileUrl($assignedAgent['image']) }}" alt="img" class="w-100 h-100 object-fit-cover">
                        @else
                            <img title="{{$assignedAgent['name']}}" class="rounded-circle avatar-xs fit-image" src={{ getFileUrl($assignedAgent['image']) }} alt="img">
                        @endif
                    </div>
                    <div class="ticket-user-name">
                        <h5 class="fs-14 fw-500 lh-17 text-title-black pb-8">{{getAgentFakeNameConfig2($assignedAgent['tenant_id'])==1?$assignedAgent['username']??"No Name":$assignedAgent['name']}}</h5>
                        <p class="fs-12 fw-500 lh-18 text-para-text">{{getRoleName($assignedAgent['role'])}}</p>
                        @if(getOption('agent_rating_status') == 1)
                            @php
                                $rating = round(getAgentRatingById($assignedAgent['id'])['rating_avg']);
                            @endphp

                            <div class="rating-view-container d-flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if($i<=$rating)
                                        <div class="rating-view-select">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    @else
                                        <div class="rating-view-init">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        @endif
                    </div>
                </div>
            </li>
        @empty
            <li>
                <div class="d-flex flex-column align-items-center g-20 py-20">
                    <div class="notes-not-img">
                        <img src="../../../assets/images/no-data.png" alt="">
                    </div>
                    <h5 class="fs-24 fw-500 lh-30 text-title-black text-center">{{__('Don’t have any agent yet.')}}</h5>
                    <p class="fs-14 fw-500 lh-17 text-para-text">{{__('Add your agent here.')}}</p>
                </div>
            </li>
        @endforelse
    </ul>
</div>
