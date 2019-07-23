@extends('layouts.fontend.app')
@section('title','Home')
@push('css')
<style>
    .table_p p{
        padding: 0px;
        margin: 0px;
        border-bottom: 1px solid #d7d8d8;
        color: #0f0f0f;
    }
    .pad{
        padding: 0px;
    }
</style>
@endpush
@section('content')
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Match Result</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="#">Match</a></li>
                <li class="active"><span>Full Match Result</span></li>
            </ul>
        </div>
    </div>
    <!--Inner Banner End-->
    <div class="kode_content_wrap">
        <section class="roster_page">
            <div class="container">
                <!--Roster Wrap Start-->
                <div class="kf_roster_wrap">



                    <div class="row" <?php if ($match_type == '1' ){?>style="display:none"<?php } ?>>
                        <div class="roster">

                            @foreach ($top_4_palyer as $key=>$rs)


                            <div>
                                <!--Roster Dec Start-->
                                <div class="kf_roster_dec">
                                    <figure>
                                        <img src="{{asset("public/assets/fontend/extra-images/profile-10.png")}}" alt="">
                                    </figure>
                                    <div class="text">
                                        <span>{{$key+1}}</span>
                                        <div class="text_overflow">
                                            <h3><a href="#">
                                                    {{$rs->Participants->user->name}}<span>Win {{$rs->total_win}}Tk</span>
                                                </a></h3>
                                            <em>Total Kill - {{$rs->total_kill}}</em>
                                        </div>
                                    </div>
                                </div>
                                <!--Roster Dec End-->
                            </div>
                            @endforeach
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-4">
                            <div class="roster_sidebar">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1 margin_0">
                                    <span>Winner Of The Match</span>
                                </h6>
                                <!--Heading 1 End-->
                                <!--Roster Dec Start-->
                                <div class="kf_roster_dec">
                                    <figure>
                                        <img src="{{asset("public/assets/fontend/extra-images/chicken-7.png")}}" alt="">
                                    </figure>
                                    <div class="text">
                                        <span>1st</span>
                                        <div class="text_overflow">
                                            <h3><a href="#">
                                                    {{$top_player->Participants->user->name}}<span>win {{$top_player->total_win}}Tk</span>
                                                </a></h3>
                                            <em>Total Kill - {{$top_player->total_kill}}</em>
                                        </div>
                                    </div>
                                </div>

                                <!--Roster Dec End-->
                                <div class="kf_plyer_rating">
                                    <span>
                                        <strong>Palyed</strong>
                                        <b>{{$top_player->Participants->user->profile->match_count}}</b>
                                        <em>Match</em>
                                    </span>
                                    <span>
                                        <strong>Earn</strong>
                                        <b>{{$top_player->Participants->user->account->earn}}Tk</b>
                                        <em>Total</em>
                                    </span>
                                    <span>
                                        <strong>Ranking</strong>
                                        <b>{{$current_rank}}</b>
                                        <em>Total</em>
                                    </span>
                                </div>
                                <ul class="kf_table table_style3" style="padding: 0px;margin: 0px;margin-bottom: 10px">
                                    <li>
                                        <div class="table_info">
                                            <div class="table_info">
                                <span><b>announcement:</b>
                                    <span>{{$match->description}}</span>

                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                {{--<ul class="kf_table2 kf_tableaside">--}}
                                    {{--<li>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--2 Points--}}
                                                {{--<em>In his career</em>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--1250--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--3 Points--}}
                                                {{--<em>In his career</em>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--680--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--2 Points--}}
                                                {{--<em>In his career</em>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--1250--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--3 Points--}}
                                                {{--<em>In his career</em>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--680--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--2 Points--}}
                                                {{--<em>In his career</em>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--1250--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--3 Points--}}
                                                {{--<em>In his career</em>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--680--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--2 Points--}}
                                                {{--<em>In his career</em>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--1250--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--3 Points--}}
                                                {{--<em>In his career</em>--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div>--}}
                                            {{--<span>--}}
                                                {{--680--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}




                                {{--<div class="kf_progress1">--}}
                                    {{--<!--SKILLS PROGRESS START-->--}}
                                    {{--<div class="skill-progress">--}}
                                        {{--<span>Shot Accuracy</span>--}}
                                        {{--<div class="progressbars" progress="65%"></div>--}}
                                    {{--</div>--}}
                                    {{--<!--SKILLS PROGRESS END-->--}}
                                    {{--<!--SKILLS PROGRESS START-->--}}
                                    {{--<div class="skill-progress">--}}
                                        {{--<span>Pass Accuracy</span>--}}
                                        {{--<div class="progressbars" progress="88%"></div>--}}
                                    {{--</div>--}}
                                    {{--<!--SKILLS PROGRESS END-->--}}
                                    {{--<!--SKILLS PROGRESS START-->--}}
                                    {{--<div class="skill-progress">--}}
                                        {{--<span>Total Accuracy</span>--}}
                                        {{--<div class="progressbars" progress="75%"></div>--}}
                                    {{--</div>--}}
                                    {{--<!--SKILLS PROGRESS END-->--}}
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="col-md-8">
                            <!--Overview Contant Start-->
                            <div class="kf_overview_contant">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1 margin_0">
                                    <span>Full Result</span>
                                </h6>
                                <!--Heading 1 End-->



                                <!--Table 2 Start-->
                                <ul class="kf_table2">
                                    <li class="table_head">
                                        <div class="tb2_nbr">
                                            <span>Id</span>
                                        </div>
                                        <div class="tb2_name">
                                            <span>Name</span>
                                        </div>
                                        <div class="tb2_position">
                                            <span>Kill</span>
                                        </div>
                                        <div class="tb2_collage">
                                            <span>Win</span>
                                        </div>
                                        <div class="tb2_weight">
                                            <span>Position</span>
                                        </div>
                                        <div class="tb2_age">
                                            <span>Total Win</span>
                                        </div>
                                    </li>


                                        @foreach($result as $position=>$rs)
                                    <li class="table_p">
                                        <div class="tb2_nbr pad">

                                            @if($match_type == 1)
                                                <span>{{$key++}}</span>
                                            @elseif($match_type == 2)
                                                <p>{{$key++}}</p>
                                                <p>{{$key++}}</p>
                                            @elseif($match_type == 3)
                                                <p>{{$key++}}</p>
                                                <p>{{$key++}}</p>
                                                <p>{{$key++}}</p>
                                                <p>{{$key++}}</p>
                                            @endif

                                        </div>
                                        <div class="tb2_name pad">
                                            @if($match_type == 1)
                                                <span>{{$rs->Participants->p1_name}}</span>
                                            @elseif($match_type == 2)
                                                <p>{{$rs->Participants->p1_name}}</p>
                                                <p>{{$rs->Participants->p2_name}}</p>
                                            @elseif($match_type == 3)
                                                <p>{{$rs->Participants->p1_name}}</p>
                                                <p>{{$rs->Participants->p2_name}}</p>
                                                <p>{{$rs->Participants->p3_name}}</p>
                                                <p>{{$rs->Participants->p4_name}}</p>
                                            @endif

                                        </div>
                                        <div class="tb2_position pad">

                                            @if($match_type == 1)
                                                <span>{{$rs->k1}}</span>
                                            @elseif($match_type == 2)
                                                <p>{{$rs->k1}}</p>
                                                <p>{{$rs->k2}}</p>
                                            @elseif($match_type == 3)
                                                <p>{{$rs->k1}}</p>
                                                <p>{{$rs->k2}}</p>
                                                <p>{{$rs->k3}}</p>
                                                <p>{{$rs->k4}}</p>
                                            @endif

                                        </div>
                                        <div class="tb2_collage pad">

                                            @if($match_type == 1)
                                                <spanp>{{$rs->w1}}tk</spanp>
                                            @elseif($match_type == 2)
                                                <p>{{$rs->w1}}tk</p>
                                                <p>{{$rs->w2}}tk</p>
                                            @elseif($match_type == 3)
                                                <p>{{$rs->w1}}tk</p>
                                                <p>{{$rs->w2}}tk</p>
                                                <p>{{$rs->w3}}tk</p>
                                                <p>{{$rs->w4}}tk</p>
                                            @endif


                                        </div>
                                        <div class="tb2_weight pad">

                                                @if($position+1 == 1)
                                                <span> {{$position+1}}st</span>
                                                    @elseif($position+1 == 2)
                                                <span> {{$position+1}}nd</span>
                                                    @elseif($position+1 == 3)
                                                <span> {{$position+1}}rd</span>
                                                    @else
                                                <span> {{$position+1}}th</span>
                                                @endif

                                        </div>
                                        <div class="tb2_age pad">
                                            <span>{{$rs->total_win}} tk</span>
                                        </div>
                                    </li>

                                    @endforeach
                                </ul>
                                <!--Table 2 End-->


                            </div>
                            <!--Overview Contant End-->
                        </div>
                    </div>
                </div>
                <!--Roster Wrap End-->
            </div>
        </section>
    </div>
    <!--Main Content Wrap End-->

@endsection

@push('js')
@endpush
