<header class="kode_header_2">
    <!--Header 2 Top Bar Start-->
    <div class="kf_top_bar">
        <div class="container">
            <div class="pull-left">
                <ul class="kf_social2">
                    <li><a href="https://www.facebook.com/groups/bdgamingzone/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UC_sajSyCMmWCiuW3hmffFyg" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="{{route('clan')}}"><i class="fa fa-gamepad"></i></a></li>
                </ul>
            </div>
            <div class="kf_right_dec">

                @if (!\Illuminate\Support\Facades\Auth::check())
                    <ul class="kf_user">
                        <li><a href="{{ route('register') }}"><i class="fa fa-lock"></i>register</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                @elseif (\Illuminate\Support\Facades\Auth::check())
                    <ul class="kf_topdec">
                        <li>
                            <div class="kf_lung">
                                <span>logged by :</span>
                                <div class="dropdown">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{\Illuminate\Support\Facades\Auth::user()->name}}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li>
                                            <form method="get" action="{{route('author.profile')}}">
                                                <input class="btn btn-success" type="submit" value="Profile">
                                            </form>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <input class="btn btn-warning" type="submit" value="Logout">
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="kf_topdec">
                        <li>
                            <div class="kf_lung">
                                <span>Curreny :</span>
                                <div class="dropdown">
                                    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> TK
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <li>USD</li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <!--<li><a href="{{route('contactUs')}}">Support</a></li>-->
                    </ul>

                @endif
                @if (\Illuminate\Support\Facades\Auth::check())

                    <a href="{{route('author.wallet')}}" class="kode_search"style="font-size:12px">{{\Illuminate\Support\Facades\Auth::user()->account->balance}}Tk</a>

                @endif
            </div>
        </div>
    </div>
    <!--Header 2 Top Bar End-->
    <div class="container">
        <!--Logo Bar Start-->
        <div class="kode_logo_bar">
            <!--Logo Start-->
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('public/assets/fontend/images/logo.jpg')}}" alt="">
                </a>
            </div>
            <!--Logo Start-->
            <!--Navigation Wrap Start-->
            <div class="kode_navigation">
                <!--Navigation Start-->
                <ul class="nav">
                    <li><a href="{{route('home')}}">home</a></li>

                    <li>
                        <a>Match</a>
                        <ul>
                            <li><a href="{{route('shedule.index')}}">Match Schedule</a></li>
                            <li><a href="{{route('running')}}">Running Matches</a></li>

                        </ul>
                    </li>

                    <li>
                        <a>Result</a>
                        <ul>
                            <li><a href="{{route('previous')}}">Recent Finished Match</a></li>
                            <li><a href="{{route('All_match_result')}}">All Match Result</a></li>
                        </ul>
                    </li>

                    <li><a href="{{route('contactUs')}}">Contact Us</a></li>
                    <li><a href="{{route('rules')}}">Rules</a></li>
                </ul>
                <!--DL Menu Start-->
                <div id="kode-responsive-navigation" class="dl-menuwrapper">
                    <button class="dl-trigger">Open Menu</button>
                    <ul class="dl-menu">
                        <li><a href="{{route('home')}}">home</a></li>
                        <li class="menu-item kode-parent-menu">
                            <a href="">Match</a>
                            <ul class="dl-submenu">
                                <li><a href="{{route('shedule.index')}}">Match Schedule</a></li>
                                <li><a href="{{route('running')}}">Running Matches</a></li>
                            </ul>
                        </li>

                        <li class="menu-item kode-parent-menu">
                            <a href="">Result</a>
                            <ul class="dl-submenu">
                                <li><a href="{{route('previous')}}">Recent Finished Match</a></li>
                                <li><a href="{{route('All_match_result')}}">All Match Result</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('contactUs')}}">Contact Us</a></li>
                        <li><a href="{{route('rules')}}">Rules</a></li>
                    </ul>
                </div>
                <!--DL Menu END-->



            @php

                if (empty($match = \App\Match_shedule::where('status','=',true)->orderBy('created_at', 'asc')->first())){
                                    $stream = 0;
                }else{
                            $stream = $match->stream->first()->id;
                }



            @endphp


            <!--Navigation End-->
                <a href="{{route('stream',$stream)}}" class="kf_cart">
                    <i><img src="{{asset('public/assets/fontend/images/pulse.gif')}}" alt=""></i>
                    <div class="text">
                        <span>live <br> stream</span>
                    </div>
                </a>
            </div>
            <!--Navigation Wrap End-->
        </div>
        <!--Logo Bar End-->
    </div>
</header>
<!--Header 2 Wrap End-->
