@extends('layouts.fontend.app')
@section('title','live Stream')
@push('css')

@endpush
@section('content')
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Live Stream</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"><span>Live Stream</span></li>
            </ul>
        </div>
    </div>
    <!--Inner Banner End-->



    @php


        $time2 = $match->date.' '.$match->time;
        $gmtTimezone = new DateTimeZone('Asia/Dhaka');
        $myDateTime = new DateTime($time2, $gmtTimezone);
        $myDateTime2 = new DateTime($time3, $gmtTimezone);
        $lll=$myDateTime->format('l jS \of F Y,h:i:s A');
        $lll2=$myDateTime2->format('h:i:s A');
        $date=$myDateTime->format('l jS \of F Y');
    @endphp



    <!--Inner Banner End-->
    <div class="kode_content_wrap">
        <section class="nextmatch_page">
            <div class="container">
                <div class="kf_ticketdetail">
                    <div class="ticketdetail_hd">
                        <div class="tkt_date">
                            <span><i class="fa fa-calendar-minus-o"></i>{{$lll}}</span>
                        </div>
                        <div class="tkt_date">
                            <span><i class="fa fa-street-view"></i>
                                @if($match->type == 1 )
                                    <span>Solo</span>
                                @elseif ($match->type == 2)
                                    <span>Duo</span>
                                @elseif ($match->type == 3)
                                    <span>squad</span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <ul class="kf_table table_style3">
                        <li>
                            <div class="table_info">
                                <span><b>Entry Fee:</b> {{$match->entry_fee}}Tk</span>
                            </div>
                            <div class="table_info">
                                <span><b>Date:</b> {{$date}}</span>
                            </div>
                            <div class="table_info">
                                <span><b>joined:</b> {{$match->join}}</span>
                            </div>
                            <div class="table_info">
                                <span><b>Time:</b> {{$lll2}}</span>
                            </div>
                        </li>
                        <li>
                            <div class="table_info">
                                <span><b>Per Kill:</b> {{$match->per_kill}}tk</span>
                            </div>
                            <div class="table_info">
                                <span><b>Platform:</b>
                                    @if($match->platform == 1 )
                                        <span>Mobile</span>
                                    @elseif ($match->platform == 2)
                                        <span>Emulator</span>
                                    @elseif ($match->platform == 3)
                                        <span>Mobile & Emulator</span>
                                    @endif</span>
                            </div>
                            <div class="table_info">
                                <span><b>Game:</b>Pubg Mobile</span>
                            </div>
                            <div class="table_info">
                                <span><b>Version:</b> {{$match->version}}</span>
                            </div>
                        </li>
                        <li>
                            <div class="table_info">
                                <span><b>Win Prize:</b> {{$match->winner}}Tk</span>
                            </div>
                            <div class="table_info">
                                <span><b>Status:</b> Not Running</span>
                            </div>
                            <div class="table_info">
                                <span><b>Stream:</b> Yes</span>
                            </div>
                            <div class="table_info">
                                <span><b>Type:</b>
                                    @if($match->type == 1 )
                                        <span>Solo</span>
                                    @elseif ($match->type == 2)
                                        <span>Duo</span>
                                    @elseif ($match->type == 3)
                                        <span>Squad</span>
                                    @endif</span>
                            </div>
                        </li>
                    </ul>
                </div>


                @if($link == null)
                    <div class="nextmatch_wrap">
                        <div class="nextmatch_dec" style="overflow: hidden">
                            <video autoplay muted loop id="myVideo">
                                <source src="{{asset('public/assets/fontend/video/stream2.mp4')}}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                @else
                    <div class="nextmatch_wrap">
                        <div class="nextmatch_dec">
                            <iframe width="100%" height="100%" src="{{$link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                @endif



                <div class="widget widget_tagcloud">
                    <!--Heading 1 Start-->
                    <h6 class="kf_hd1">
                        <span>Previous Match Videos</span>
                    </h6>
                    <!--Heading 1 END-->
                    <div class="kf_border">

                        @foreach($old_match as $match)

                            @php
                                $time2 = $match->date.' '.$match->time;
                                $gmtTimezone = new DateTimeZone('Asia/Dhaka');
                                $myDateTime = new DateTime($time2, $gmtTimezone);
                                $myDateTime2 = new DateTime($time3, $gmtTimezone);
                                $lll=$myDateTime->format('l jS \of F Y,h:i:s A');
                                $lll2=$myDateTime2->format('h:i:s A');
                                $date=$myDateTime->format('l jS \of F Y');
                            @endphp
                        <!--Tags Start-->
                        <div class="col-md-3 col-sm-6">
                            <!--Featured 3 thumb Start-->
                            <div class="kf_featured_thumb">
                                <figure>
                                    <iframe width="100%" height="100%" src="{{$match->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </figure>
                                <div class="text_wrper">
                                    <div class="text_2">
                                        <a href="{{route('All_match_result_details',$match->id)}}"><span class="label2">{{$match->title}}</span></a>
                                        <em class="kf_date">{{$lll}}</em>
                                    </div>
                                </div>
                            </div>
                            <!--Featured 3 thumb End-->
                        </div>
                        <!--Tags End-->

                        @endforeach




                        <!--Kf Pagination Start-->
                        <div class="kode-pagination text-center">
                            {{ $old_match->links() }}
                        </div>
                        <!--Kf Pagination End-->
                    </div>



                </div>





            </div>
        </section>
    </div>
    <!--Main Content Wrap End-->
@endsection

@push('js')
@endpush
