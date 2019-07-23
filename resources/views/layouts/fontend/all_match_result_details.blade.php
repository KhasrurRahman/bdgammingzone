@extends('layouts.fontend.app')
@section('title','Match Result')
@push('css')
    <style type="text/css">
        #accordion .panel {
            border-radius: 0;
            border: 0;
            margin-top: 0px;
        }
        #accordion a {
            display: block;
            padding: 10px 15px;
            border-bottom: 1px solid #b42b2b;
            text-decoration: none;
        }
        #accordion .panel-heading a.collapsed:hover,
        #accordion .panel-heading a.collapsed:focus {
            background-color: #b42b2b;
            color: white;
            transition: all 0.2s ease-in;
        }
        #accordion .panel-heading a.collapsed:hover::before,
        #accordion .panel-heading a.collapsed:focus::before {
            color: white;
        }
        #accordion .panel-heading {
            padding: 0;
            border-radius: 0px;
            text-align: center;
        }
        #accordion .panel-heading a:not(.collapsed) {
            color: white;
            background-color: #b42b2b;
            transition: all 0.2s ease-in;
        }

        /* Add Indicator fontawesome icon to the left */
        #accordion .panel-heading .accordion-toggle::before {
            font-family: 'FontAwesome';
            content: '\f00d';
            float: left;
            color: white;
            font-weight: lighter;
            transform: rotate(0deg);
            transition: all 0.2s ease-in;
        }
        #accordion .panel-heading .accordion-toggle.collapsed::before {
            color: #444;
            transform: rotate(-135deg);
            transition: all 0.2s ease-in;
        }

        .custom-counter {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .custom-counter li {
            counter-increment: step-counter;
            margin-bottom: 10px;
        }

        .custom-counter li::before {
            content: counter(step-counter);
            margin-right: 5px;
            font-size: 80%;
            background-color: rgb(0,200,200);
            color: white;
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 3px;
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
                <li class="active"><span>Match detail</span></li>
            </ul>
        </div>
    </div>

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
                <div class="nextmatch_wrap">
                    <div class="nextmatch_dec">
                        <iframe width="100%" height="100%" src="{{$match->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>





            </div>
        </section>
    </div>
    <!--Main Content Wrap End-->






@endsection
<script type="text/javascript">
    $("#acchead").on('mouseover click',function() {
        $("#accbody").toggle("show");
    });
</script>
@push('js')
@endpush
