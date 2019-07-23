@extends('layouts.fontend.app')
@section('title','Match schedule')
@push('css')

@endpush
@section('content')

    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Match Schedule</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="#">Match</a></li>
                <li class="active"><span>Match Schedule</span></li>
            </ul>
        </div>
    </div>
    <!--Inner Banner End-->
    <div class="kode_content_wrap">
        <section class="kf_overview_page">
            <div class="container">
                <div class="overview_wrap">
                    <div class="row">
                        <div class="col-md-12">
                            @if($matchs->count() == 0)
                                <ul class="breadcrumb" style="text-align: center;border: 1px solid;">
                                    <li class="active"><H1>Next match schedule will create soon</H1></li>
                                </ul>
                            @endif
                            @foreach($matchs as $match)

                                @php
                                    $time2 = $match->date.' '.$match->time;
                                    $time3 =$match->time;
                                    $gmtTimezone = new DateTimeZone('Asia/Dhaka');
                                    $myDateTime = new DateTime($time2, $gmtTimezone);
                                    $myDateTime2 = new DateTime($time3, $gmtTimezone);
                                    $lll=$myDateTime->format('l jS \of F Y,h:i:s A');
                                    $lll2=$myDateTime2->format('h:i A');
                                @endphp
                            <div class="kf_overview kf_current_match_wrap">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1 margin_0">
                                    <span>Match ID= #{{$match->id}}</span>
                                </h6>
                                <!--Heading 1 End-->
                                <!--Kf Opponents Outer Start-->
                                <div class="kf_opponents_outerwrap">
                                    <h6 class="kf_h4">
                                        <span>{{$match->title}}</span>
                                        <em>{{$lll}}</em>
                                    </h6>
                                    <!--Kf Opponents Start-->
                                    <div class="kf_opponents_wrap">
                                        <div class="kf_opponents_dec">
                                            <span><img src="{{asset('public/assets/fontend/extra-images/pubg.jpg')}}" alt=""></span>
                                            <div class="text">
                                                <h6><a href="#">Pubg</a></h6>
                                                @if($match->platform == 1 )
                                                    <p>Mobile</p>
                                                @elseif ($match->platform == 2)
                                                    <p>Emulator</p>
                                                @elseif ($match->platform == 3)
                                                    <p>Mobile & Emulator</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="kf_opponents_gols">
                                            <h5>{{$lll2}}</h5>
                                            @if($match->type == 1 )
                                                <p>Solo</p>
                                            @elseif ($match->type == 2)
                                                <p>Duo</p>
                                            @elseif ($match->type == 3)
                                                <p>Squard</p>
                                            @endif
                                        </div>
                                        <div class="kf_opponents_dec span_right">
                                            @if($match->map == 1 )
                                                <span><img src="{{asset('public/assets/backend/images/map/pubg/erangel.jpg')}}"></span>
                                                <div class="text">
                                                    <h6><a href="#">Map</a></h6>
                                                    <p>Erangel</p>
                                                </div>
                                            @elseif ($match->map == 2)
                                                <span><img src="{{asset('public/assets/backend/images/map/pubg/miramar.jpeg')}}"></span>
                                                <div class="text">
                                                    <h6><a href="#">Map</a></h6>
                                                    <p>Miramar</p>
                                                </div>
                                            @elseif ($match->map == 3)
                                                <span><img src="{{asset('public/assets/backend/images/map/pubg/sanhok.jpg')}}"></span>
                                                <div class="text">
                                                    <h6><a href="#">Map</a></h6>
                                                    <p>Sanhok</p>
                                                </div>
                                            @elseif ($match->map == 4)
                                                <span><img src="{{asset('public/assets/backend/images/map/pubg/vikindi.png')}}"></span>
                                                <div class="text">
                                                    <h6><a href="#">Map</a></h6>
                                                    <p>Vikendi</p>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                    <!--Kf Opponents End-->
                                    <!--Kf Score Card Start-->
                                    <div class="kf_scorecard">
                                        <div class="kf_progress_wrap">
                                            <div class="kf_progress">
                                                <span class="progress_label">Joined</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$match->join}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$match->join}}%;">
                                                    </div>
                                                </div>
                                                <span class="progress_precent">{{$match->join}}/100</span>
                                            </div>

                                        </div>
                                        <ul class="kf_table2">
                                            <li>
                                                <div class="table_info">
                                                    <span><b>Entry Fee</b></span>
                                                </div>
                                                <div class="table_info">
                                                    <span><b>{{$match->entry_fee}}tk</b></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="table_info">
                                                    <span><b>Per Kill</b></span>
                                                </div>
                                                <div class="table_info">
                                                    <b><span>{{$match->per_kill}}tk</span></b>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="table_info">
                                                    <span><b>Winner</b></span>
                                                </div>
                                                <div class="table_info">
                                                    <span><b>{{$match->winner}}tk</b></span>
                                                </div>
                                            </li>

                                        </ul>
                                        <div class="">
                                            <div class="ticket_button">
                                                <a href="{{route('shedule.show',$match->id)}}"><button style="background: #ffbe00">Show Details</button></a>
                                            </div>

                                        </div>
                                        <div class="">
                                            @if ($match->join == 100)
                                                <div class="ticket_button">
                                                    <a href="#"><button style="
                                                        background: black;color: white" disabled>--Match Full--</button></a>
                                                </div>
                                            @else

                                                <div class="ticket_button">
                                                    <a href="{{route('author.confirm_join',$match->id)}}"><button style="
                                                        background: #ffbe00" >---Join Now---</button></a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!--Kf Score Card End-->
                                </div>
                                <!--Kf Opponents Outer End-->
                            </div>
                            @endforeach

                            <div class="kode-pagination text-center">
                                {{ $matchs->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>




@endsection

@push('js')
@endpush
