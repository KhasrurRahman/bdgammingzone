@extends('layouts.fontend.app')
@section('title','Previous Match')
@push('css')

@endpush
@section('content')

    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Previous Match</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="#">match</a></li>
                <li class="active"><span>Previous Match</span></li>
            </ul>
        </div>
    </div>
    <!--Inner Banner End-->
    <div class="kode_content_wrap">
        <section>
            <div class="container">
                <div class="kf_ticket2_wrap">
                    <ul>
                        @if ($matchs->count() > 0)
                            @foreach($matchs as $match)

                                @php
                                    $time2 = $match->date.' '.$match->time;
                                    $time3 =$match->time;
                                    $gmtTimezone = new DateTimeZone('Asia/Dhaka');
                                    $myDateTime = new DateTime($time2, $gmtTimezone);
                                    $myDateTime2 = new DateTime($time3, $gmtTimezone);
                                    $lll=$myDateTime->format('jS \of F Y,h:i:s A');
                                    $lll2=$myDateTime2->format('h:i A');
                                @endphp
                                <li>
                                    <!--Ticket 2 Start-->
                                    <div class="ticket_dec2">
                                <span class="ticket_date">
                                    <b>#{{$match->id}}</b>
                                    <small>{{$lll}}</small>
                                </span>
                                        <div class="kf_opponents_wrap2">
                                            <div class="kf_opponents_wrap">
                                                <p style="font-weight: bold;">(Entry Free={{$match->entry_fee}}tk),(per_kill={{$match->per_kill}}tk),(winner={{$match->winner}}tk)</p>
                                                <div class="kf_opponents_dec">
                                                    <span><img src="{{asset('public/assets/fontend/extra-images/pubg.jpg')}}" alt=""></span>
                                                    <div class="text">
                                                        <h6><a href="#">Pubg<br> Mobile</a></h6>
                                                        @if($match->type == 1 )
                                                            <span class="icon_tag">Solo</span>
                                                        @elseif ($match->type == 2)
                                                            <span class="icon_tag">Duo</span>
                                                        @elseif ($match->type == 3)
                                                            <span class="icon_tag">squard</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="kf_opponents_dec span_right">
                                                    @if($match->map == 1 )
                                                        <span><img src="{{asset('public/assets/backend/images/map/pubg/erangel.jpg')}}"></span>
                                                        <div class="text">
                                                            <h6><a href="#">Erangel</a></h6>
                                                        </div>
                                                    @elseif ($match->map == 2)
                                                        <span><img src="{{asset('public/assets/backend/images/map/pubg/miramar.jpeg')}}"></span>
                                                        <div class="text">
                                                            <h6><a href="#">Miramer</a></h6>
                                                        </div>
                                                    @elseif ($match->map == 3)
                                                        <span><img src="{{asset('public/assets/backend/images/map/pubg/sanhok.jpg')}}"></span>
                                                        <div class="text">
                                                            <h6><a href="#">Sanhok</a></h6>
                                                        </div>
                                                    @elseif ($match->map == 4)
                                                        <span><img src="{{asset('public/assets/backend/images/map/pubg/vikindi.png')}}"></span>
                                                        <div class="text">
                                                            <h6><a href="#">Vikendi</a></h6>
                                                        </div>
                                                    @endif
                                                    <div class="text">
                                                        @if($match->platform == 1 )
                                                            <span class="icon_tag">Mobile Only<i class="fa fa-map-marker"></i></span>
                                                        @elseif ($match->platform == 2)
                                                            <span class="icon_tag">Emulator Only<i class="fa fa-map-marker"></i></span>
                                                        @elseif ($match->platform == 3)
                                                            <span class="icon_tag">Both<i class="fa fa-map-marker"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ticket_button">
                                                <a href="{{route('single_mathc_result',$match->id)}}"><button>View Full Result</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Ticket 2 End-->
                                </li>
                            @endforeach


                            @else

                            <ul class="breadcrumb">
                                <li class="active" style="text-align: center"><H1>No Match here</H1></li>
                            </ul>
                        @endif

                    </ul>


                    <!--Kf Pagination Start-->
                    <div class="kode-pagination">
                        {{ $matchs->links() }}
                    </div>
                    <!--Kf Pagination End-->
                </div>
            </div>
        </section>
    </div>
    <!--Main Content Wrap End-->




@endsection

@push('js')
@endpush
