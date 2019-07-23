@extends('layouts.fontend.app')
@section('title','Running Match')
@push('css')

@endpush
@section('content')
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Player Profile</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"><span>Profile</span></li>
            </ul>
        </div>
    </div>

<div class="row">
    <aside class="col-md-4">
        <div class="widget kf_roster_dec">
            <!--Heading 1 Start-->
            <h6 class="kf_hd1 margin_0">
                <span>Player Profile</span>
            </h6>
            <!--Heading 1 End-->
            <figure style="margin: 0px">
                <img src="{{asset('public/assets/fontend/extra-images/Pubg-Player-Png-715x925.png')}}" alt="">
            </figure>
            <div class="text">
                <span>{{\Illuminate\Support\Facades\Auth::user()->id}}</span>
                <div class="text_overflow">
                    <h3><a href="#" tabindex="0">
                            <span>{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        </a></h3>
                    <div class="newsletter_dec">
                        <input class="input-btn" type="button" value="Edit Profile"  data-toggle="modal" data-target="#modalRegisterForm">
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <aside class="col-md-8">

        <div class="widget roster_sidebar">
            <!--Heading 1 Start-->
            <h6 class="kf_hd1 margin_0">
                <span>Player Dashbord</span>
            </h6>
            <div class="kf_plyer_rating">
                                <span>
                                    <strong>Balance</strong>
                                    <b>{{$acconts->balance}}</b>
                                    <em>TK</em>
                                </span>
                <span>
                                    <strong>Wining Balance</strong>
                                    <b>{{$acconts->win_amount}}</b>
                                    <em>TK</em>
                                </span>
                <span>
                                    <strong>Total Earn</strong>
                                    <b>{{$acconts->earn}}</b>
                                    <em>TK</em>
                                </span>
            </div>

            <ul class="kf_table2 kf_tableaside">
                <li>
                    <div>
                                            <span>
                                                Total Match Played
                                                <em>{{$profile->match_count}}</em>
                                            </span>
                    </div>

                    <div>
                                            <span>
                                                Total Earn
                                                <em>{{$acconts->earn}}</em>
                                            </span>
                    </div>
                </li>

                <li>
                    <div>
                                            <span>
                                                Your Ranking
                                                <em>{{$current_rank}}</em>
                                            </span>
                    </div>

                    <div>
                                            <span>
                                                WINING BALANCE
                                                <em>{{$acconts->balance}}</em>
                                            </span>
                    </div>
                </li>

                <li>
                    <div>
                                            <span>
                                                Pubg Username
                                                <em>{{$profile->pubg_name}}</em>
                                            </span>
                    </div>

                    <div>
                                            <span>
                                                Pubg Id
                                                <em>{{$profile->pubg_id}}</em>
                                            </span>
                    </div>
                </li>



                        @if (!\Illuminate\Support\Facades\Auth::user()->match->where('status',true)->count() == 0)
                              @php
                                  $running_match = \App\Match_shedule::where('status',true)->first()->id;
                              @endphp
                    <a href="{{route('shedule.show',$running_match)}}">
                        <li style="background: #00cc66">
                  <div>
                                                <span>
                                                    Room ID<br>
                                                    <b style="color: red">{{\Illuminate\Support\Facades\Auth::user()->match->where('status',true)->first()->room_id}}</b>
                                                </span>
                            </div>

                            <div>
                                                <span>
                                                    Room Password<br>
                                                    <b style="color: red">{{\Illuminate\Support\Facades\Auth::user()->match->where('status',true)->first()->room_pass}}</b>
                                                </span>
                            </div>

                            <div>
                                                <span>
                                                    <a href="{{route('shedule.show',$running_match)}}"><button class=" btn btn-success">Show Match Details</button></a>
                                                </span>
                            </div>

                </li>
                    </a>
                @endif
            </ul>

            <div class="kf_progress1">

                <div class="newsletter_dec">
                    <a href="{{route('author.wallet')}}"><input class="input-btn" type="button" value="Wallet"></a>
                </div>

                <div class="newsletter_dec">
                    <a href="" data-toggle="modal" data-target="#convert_balance" ><input class="input-btn" type="button" value="Convert Win balance"></a>

                </div>



            </div>
        </div>
    </aside>
</div>




















    <!-- Modal profile -->
    <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Edit Profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">



                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home_with_icon_title" data-toggle="tab">
                                <div class="newsletter_dec">
                                    <input class="input-btn" type="button" value="Edit Profile">
                                </div>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#profile_with_icon_title" data-toggle="tab">
                                <div class="newsletter_dec">
                                    <input class="input-btn" type="button" value="Chnage Password">
                                </div>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                            <form class="form-horizontal" method="post" action="{{route('author.profile_save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text"  class="form-control" placeholder="Enter your name" value="{{$profile->name}}" name="name" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Email Address</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address_2" class="form-control" placeholder="Enter your email address" name="email" value="{{$profile->email}}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Mobile</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address_2" class="form-control" placeholder="Enter your mobile number" name="mobile" value="{{$profile->mobile}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Pubg Id</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address_2" class="form-control" placeholder="Enter your Pubg Id" name="pubgid" value="{{$profile->pubg_id}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Pubg Username</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address_2" class="form-control" placeholder="Enter your Pubg name" name="pubgname" value="{{$profile->pubg_name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>




                        <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                            <form method="POST" action="{{route('author.password_update')}}" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Old Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="email_address_2" class="form-control" placeholder="Old Password" name="old_password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password">New password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="confirm_password">Confirm password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="confirm_password" class="form-control" placeholder="Enter your password again" name="password_confirmation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">update</button>
                                        </div>
                                    </div>
                                    </div>
                            </form>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

{{--convert balance--}}
    <div class="modal fade" id="convert_balance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">convert the win balance to Main Balance</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="POST" action="{{route('author.convert_win_to_balance')}}" class="form-horizontal">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Amount</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Amount" name="amount" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-success">Convert</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
@endpush
