@extends('layouts.fontend.app')
@section('title','Home')
@push('css')

@endpush
@section('content')
    <!--Banner Map Wrap Start-->
    <div class="kode_banner_1">
        <div class="main_banner">
            <div>
                <!--Banner Thumb START-->
                <div class="thumb">
                    <video autoplay muted loop id="myVideo">
                        <source src="{{asset('public/assets/fontend/video/2.mp4')}}" type="video/mp4">
                    </video>
                    <div class="container">
                        <div class="banner_caption text-center">
                            <span style="text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;">Next Match Start In</span>
                            <div id="clockdiv">
                                <h1 id="demo" style="text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;"></h1>

                            <br>

                            <a href="@if($match_shedule->count() !== 0 )
                                        {{route('shedule.show',$match_shedule->first()->id)}}
                                    @endif
                                " class="btn-1" style="margin-top: 20px;text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;">Join now
                            </a>
                        </div>

                            <p id="demo" ></p>
                    </div>
                </div>
                <!--Banner Thumb End-->
            </div>
        </div>
    </div>
    <!--Banner Map Wrap End-->
    {{--<div class="kf_ticker-wrap">--}}
        {{--<div class="container">--}}
            {{--<div class="kf_ticker">--}}
                {{--<span>Breaking News</span>--}}
                {{--<div class="kf_ticker_slider">--}}
                    {{--<ul class="ticker">--}}
                        {{--<li><p>Sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p></li>--}}
                        {{--<li><p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p></li>--}}
                        {{--<li><p>Sanctus est Lorem ipsum dolor sit amet. </p></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

        <div class="kode_content_wrap">

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <!--Featured Slider Start-->
                            <div class="kf_featured_slider">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1">
                                    <span>upcoming matches</span>
                                </h6>
                                <!--Heading 1 END-->
                            </div>
                            <!--Featured Slider End-->

                            <!--Featured 2 Slider Start-->
                            @if($match_shedule->count() == 0)
                                <div class="kf_featured_wrap2">
                                <div class="kf_featured_thumb">
                                    <figure>
                                        <img src="{{asset('public/assets/backend/images/map/pubg/erangel.jpg')}}" alt="">
                                    </figure>
                                    <div class="text_wrper">
                                        <div class="text">
                                            <h6>Next Match Will Start Soon</h6>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                @else

                                <div class="kf_featured_wrap2">
                                    <!--Featured 2 thumb Start-->
                                    @foreach($match_shedule as $match)
                                        @php
                                            $time2 = $match->date.' '.$match->time;
                                            $gmtTimezone = new DateTimeZone('Asia/Dhaka');
                                            $myDateTime = new DateTime($time2, $gmtTimezone);
                                            $lll=$myDateTime->format('jS \of F Y,h:i:s A');
                                        @endphp

                                        <div class="kf_featured_thumb">
                                            <figure>
                                                @if($match->map == 1 )
                                                    <img src="{{asset('public/assets/backend/images/map/pubg/erangel.jpg')}}">
                                                @elseif ($match->map == 2)
                                                    <img src="{{asset('public/assets/backend/images/map/pubg/miramar.jpeg')}}">
                                                @elseif ($match->map == 3)
                                                    <img src="{{asset('public/assets/backend/images/map/pubg/sanhok.jpg')}}">
                                                @elseif ($match->map == 4)
                                                    <img src="{{asset('public/assets/backend/images/map/pubg/vikindi.png')}}">
                                                @endif
                                            </figure>
                                            <div class="text_wrper">
                                                <div class="text">
                                                    <h6 style="margin: 0px">{{$match->title}}</h6>
                                                    <h6><a href="{{route('shedule.show',$match->id)}}"></a> <small>Entry Fee: </small>{{$match->entry_fee}}tk<a href="{{route('shedule.show',$match->id)}}"></a></h6>
                                                    <p>{{$lll}}</p>
                                                    @if($match->platform == 1 )
                                                        <span>platform: Mobile</span>
                                                    @elseif ($match->platform == 2)
                                                        <span>platform: Emulator</span>
                                                    @elseif ($match->platform == 3)
                                                        <span>platform: Mobile & Emulator</span>
                                                        @endif

                                                        @if($match->map == 1 )
                                                            <span>Map:Erangel</span>
                                                        @elseif ($match->map == 2)
                                                            <span>Map:miramar</span>
                                                        @elseif ($match->map == 3)
                                                            <span>Map:sanhok</pspan
                                                        @elseif ($match->map == 4)
                                                            <span>Map:vikindi</span>
                                                        @endif

                                                        @if($match->type == 1 )
                                                            <span>Type:Solo</span>
                                                        @elseif ($match->type == 2)
                                                            <span>Type:Duo</span>
                                                        @elseif ($match->type == 3)
                                                            <span>Type:Squard</span>
                                                        @endif

                                                        <span>Per Kill: {{$match->per_kill}}tk</span>
                                                        <span>Winner: {{$match->winner}}tk</span>
                                                        <span class="progress_precent">Join: {{$match->join}}/100</span>
                                                        @if ($match->join == 100)
                                                            <div class="ticket_button">
                                                                <a href="#"><button style="
                                                        background: black;color: white" disabled>--Match Full--</button></a>
                                                            </div>
                                                        @else

                                                            <div class="ticket_button">
                                                                <a href="{{route('shedule.show',$match->id)}}"><button style="
                                                        background: #ffbe00" >---Join Now---</button></a>
                                                            </div>
                                                        @endif
                                                </div>
                                            </div>
                                        </div>

                                @endforeach
                                <!--Featured 2 thumb End-->
                                </div>

                            @endif





                            <!--Featured 2 Slider Start-->
                            <div class="kf_featured_wrap2">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1">
                                    <span>Running match</span>
                                </h6>
                                <!--Heading 1 END-->
                                <!--Featured 4 Wraper Start-->
                                <div class="kf_featured_wrap4">
                                    <div class="row">
                                        @if($running_match->count() == 0)
                                            <div class="col-md-6">
                                                <!--Featured 4 Thumb Start-->
                                                <div class="kf_featured_thumb4">
                                                    <figure>

                                                            <img src="{{asset('public/assets/backend/images/map/pubg/erangel.jpg')}}">
                                                    </figure>
                                                    <div class="text">
                                                        <h5 class="lable_1">No match running right now</h5>
                                                    </div>
                                                </div>
                                                <!--Featured 4 Thumb End-->
                                            </div>
                                            @else
                                            @foreach($running_match as $match)
                                                @php
                                                    $time2 = $match->date.' '.$match->time;
                                                    $gmtTimezone = new DateTimeZone('Asia/Dhaka');
                                                    $myDateTime = new DateTime($time2, $gmtTimezone);
                                                    $lll=$myDateTime->format('jS \of F Y,h:i:s A');
                                                @endphp
                                            <div class="col-md-6">
                                                <!--Featured 4 Thumb Start-->
                                                <div class="kf_featured_thumb4">
                                                    <figure>
                                                        @if($match->map == 1 )
                                                            <img src="{{asset('public/assets/backend/images/map/pubg/erangel.jpg')}}">
                                                        @elseif ($match->map == 2)
                                                            <img src="{{asset('public/assets/backend/images/map/pubg/miramar.jpeg')}}">
                                                        @elseif ($match->map == 3)
                                                            <img src="{{asset('public/assets/backend/images/map/pubg/sanhok.jpg')}}">
                                                        @elseif ($match->map == 4)
                                                            <img src="{{asset('public/assets/backend/images/map/pubg/vikindi.png')}}">
                                                        @endif
                                                    </figure>
                                                    <div class="text">
                                                        <h5 class="lable_1">{{$lll}}</h5>
                                                        <h6><a href="{{route('shedule.show',$match->id)}}">{{$match->title}}</a></h6>
                                                        @if($match->type == 1 )
                                                            <p>Solo</p>
                                                        @elseif ($match->type == 2)
                                                            <p>Duo</p>
                                                        @elseif ($match->type == 3)
                                                            <p>Squard</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--Featured 4 Thumb End-->
                                            </div>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <!--Featured 4 Wraper End-->

                            </div>
                            <!--Featured 2 Wraper End-->
                            <!--Add Banner Start-->

                            @php
                                if (empty($match = \App\Match_shedule::where('status','=',true)->orderBy('created_at', 'asc')->first())){
                                                    $stream = 0;
                                }else{
                                            $stream = $match->stream->first()->id;
                                }
                            @endphp
                            <div class="add_banner">
                                <a href="{{route('stream',$stream)}}"><img src="{{asset('public/assets/fontend/extra-images/live_banner.jpg')}}" alt=""></a>
                            </div>
                            <!--Add Banner End-->
                        </div>







                        <aside class="col-md-4">
                            <!--Widget Ranking Start-->
                            <div class="widget widget_ranking">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1">
                                    <span>Top Players</span>
                                </h6>
                                <!--Heading 1 END-->
                                <div class="kf_border">
                                    <!--Table Wrap Start-->
                                    <ul class="kf_table">
                                        @foreach($top_palyer as $key=>$user)
                                            <li>
                                                <div class="table_no">
                                                    <span>{{$key+1}}.</span>
                                                </div>
                                                <div class="team_logo">
                                                    <p>{{$user->user->name}}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!--Table Wrap End-->
                                </div>
                            </div>
                            <!--Widget Ranking End-->
                            <div class="widget widget_ranking widget_league_table">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1">
                                    <span>Last Match Result</span>
                                </h6>
                                <!--Heading 1 END-->
                                <div class="kf_border">
                                    <!--Table Wrap Start-->
                                    <ul class="kf_table">
                                        <li class="table_head">
                                            <div class="team_name">
                                                <strong>ID</strong>
                                            </div>
                                            <div class="team_logo">
                                            </div>
                                            <div class="match_win">
                                                <strong>Total win</strong>
                                            </div>
                                            <div class="match_loss">
                                                <strong>Total Kill</strong>
                                            </div>

                                        </li>

                                        @if($result == null)
                                            <p>No Result Found</p>
                                        @else
                                            @foreach($result as $key=>$rs)
                                                <li>
                                                    <div class="table_no">
                                                        <span>{{$key++}}</span>
                                                    </div>
                                                    <div class="team_logo">
                                                        <p>{{$rs->Participants->p1_name}}</p>
                                                    </div>
                                                    <div class="match_win">
                                                        <span>{{$rs->total_win}}</span>
                                                    </div>
                                                    <div class="match_win">
                                                        <span>{{$rs->total_kill}}</span>
                                                    </div>
                                                </li>

                                            @endforeach
                                        @endif

                                    </ul>
                                    <!--Table Wrap End-->
                                </div>
                            </div>
                            <!--Widget Ranking End-->

                            <!--Widget Add 3 Strat-->
                            <div class="widget widget_add">
                                <div class="add_banner">
                                    <a href="https://www.youtube.com/channel/UC_sajSyCMmWCiuW3hmffFyg" target="_blank"><img src="{{asset('public/assets/fontend/extra-images/youtube3.gif')}}" alt=""></a>
                                </div>
                            </div>
                            <!--Widget Add 3 End-->
                        </aside>
                    </div>
                </div>
            </section>


        </div>
@endsection

@push('js')
            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("{{$time}}").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get todays date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Output the result in an element with id="demo"
                    document.getElementById("demo").innerHTML = days + " d: " + hours + " h: "
                        + minutes + " m: " + seconds + " s ";

                    // If the count down is over, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo").innerHTML = "Next Match Will Start Soon";
                    }
                }, 1000);
            </script>
@endpush
