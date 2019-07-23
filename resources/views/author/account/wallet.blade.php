@extends('layouts.fontend.app')
@section('title','wallet')
@push('css')

@endpush
@section('content')
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>wallet</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"><span>wallet</span></li>
            </ul>
        </div>
    </div>

    <div class="kode_content_wrap">
        <section class="kf_overview margin-0">
            <div class="container">


                <div class="kf_overview_nav">
                    <ul class="row" role="tablist">
                        <li role="presentation" class="active col-md-2">
                            <a href="#Deposit" aria-controls="overview" role="tab" data-toggle="tab">
                                <span>Deposit</span>
                            </a>
                        </li>
                        <li role="presentation" class="col-md-2">
                            <a href="#Withdraw" aria-controls="roster" role="tab" data-toggle="tab">
                                <span>Withdraw</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="Deposit">
                        <div class="overview_wrap">
                            <div class="row">
                                    <div class="kode_content_wrap">
                                            <div class="container">
                                                <div class="widget widget_newsletter">
                                                    <!--Heading 1 Start-->
                                                    <h6 class="kf_hd1 margin_0">
                                                        <span>Deposit</span>
                                                        <a class="prv_btn btn btn-sq-lg btn-success" href="#" data-toggle="modal" data-target="#pyment" >How to payment?</a>
                                                    </h6>

                                                    <div class="kf_form">
                                                        <div class="row">
                                                            <div class="col-lg-12">

                                                                <p style="color: red;font-weight: bold;margin: 0px;    border: 1px solid;">minimum deposit amount is 20Tk</p>
                                                                <p style="color: green;font-weight: bold;    border: 1px solid;margin-top: 5px">Current Balance {{\Illuminate\Support\Facades\Auth::user()->account->balance}}Tk</p>




                                                                <p>
                                                                    <a class="btn btn-sq-lg btn-success" data-toggle="modal" data-target="#bkash" style="margin-bottom: 10px"><img src="{{asset('public/assets/fontend/extra-images/bkash2.png')}}" style="height: 140px;">
                                                                    <span>bkash</span>
                                                                    </a>

                                                                    <a class="btn btn-sq-lg btn-success" data-toggle="modal" data-target="#rocket"  style="margin-bottom: 10px"><img src="{{asset('public/assets/fontend/extra-images/rocket.jpg')}}" style="height: 140px;">
                                                                        <span>Rocket</span>
                                                                    </a>

                                                                    <a class="btn btn-sq-lg btn-success" data-toggle="modal" data-target="#nagad"  style="margin-bottom: 10px"><img src="{{asset('public/assets/fontend/extra-images/nogod.jpg')}}" style="height: 140px;">
                                                                        <span>Nagad</span>
                                                                    </a>

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>


                            </div>
                        </div>
                    </div>

{{--withdraw table--}}
                    <div role="tabpanel" class="tab-pane" id="Withdraw">
                        <div class="overview_wrap">
                            <div class="row">

                                <div class="kode_content_wrap">
                                        <div class="container">
                                            <div class="widget widget_newsletter">
                                                <!--Heading 1 Start-->
                                                <h6 class="kf_hd1">
                                                    <span>Withdraw</span>
                                                </h6>
                                                <!--Heading 1 END-->
                                                <div class="kf_form">
                                                    <div class="kf_form_hd">
                                                        <p style="color: green;font-weight: bold">You can withdraw only Winning amount</p>

                                                        <p style="color: deeppink;font-weight: bold">Minimum mobile top up amount 20Tk <i class="fa fa-chevron-right"></i><span><button class="btn btn-success btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">mobile top up<up></up></button></span></p>

                                                        <p style="color: red;font-weight: bold">Minimum Withdraw amount 100Tk</p>

                                                        <p style="color: rebeccapurple;font-weight: bold">Current Winning Balance {{\Illuminate\Support\Facades\Auth::user()->account->win_amount}}Tk</p>
                                                    </div>

                                                    <form action="{{route('author.withdraw_confirm')}}" method="post">
                                                        @csrf
                                                        <div class="input_dec">
                                                            <input placeholder="Amount" type="number" name="amount" class="form-control" min="100" required>
                                                        </div>

                                                        <div class="input_dec">
                                                            <input placeholder="Mobile Number" type="number" name="mobile" class="form-control" required>
                                                        </div>
                                                        <div class="select_dec .input_dec">
                                                            <select name="methoddd" required>
                                                                <option disabled="" value="" selected="true">select a payment method</option>
                                                                <option value="bikash">Bikash</option>
                                                                <option value="roket">Roket</option>
                                                            </select>
                                                        </div>
                                                        {{--<input class="input-btn" type="submit" value="Withdraw NOW">--}}
                                                        <button type="submit" class="input-btn waves-effect">Withdraw NOW</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>



{{--//mobile recharge model--}}
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Mobile Recharge</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="POST" action="{{route('author.withdraw_confirm')}}" class="form-horizontal">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Amount</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Amount" name="amount" min="20" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Mobile Number" name="mobile" required>
                                    </div>
                                </div>

                                <div class="form-group" style="display: none">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Amount" name="methoddd" value="topup">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-success">Withdraw</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--bkash--}}
    <div class="modal fade" id="bkash" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Payment By Bkash</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="POST" action="{{route('author.deposit_confirm')}}" class="form-horizontal">
                        @csrf
                        <div class="modal-body" style="padding-top: 0px">
                            <p><img src="{{asset('public/assets/fontend/extra-images/bikash.png')}}" style="height: 26px">
                                <span><b>{{$payment_number->bkash}} (BdGamingZone Bkash personal number)</b></span><br>
                                <small>First send money to BdGamingZone Bkash personal number Then Verify your payment by entering your mobile number</small>
                            </p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Amount</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Amount" name="amount" min="20" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Mobile Number</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Mobile number" name="mobile" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display: none">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Amount" name="methoddd" value="Bkash">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-success">Deposit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--roket--}}
    <div class="modal fade" id="rocket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Payment By Rocket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="POST" action="{{route('author.deposit_confirm')}}" class="form-horizontal">
                        @csrf

                        <div class="modal-body" style="padding-top: 0px">
                            <p><img src="{{asset('public/assets/fontend/extra-images/roket.jpg')}}" style="height: 26px">
                            <span><b>{{$payment_number->roket}} (BdGamingZone Rocket number)</b></span><br>
                                <small>First send money to BdGamingZone rocket number Then Verify your payment by entering your mobile number</small>
                            </p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Amount</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Amount" name="amount" min="20" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Mobile Number</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Mobile number" name="mobile" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" style="display: none">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Amount" name="methoddd" value="roket">
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-success">Deposit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--nagad--}}
    <div class="modal fade" id="nagad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment By nagad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Comming Soon</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


{{--how to payment--}}
    <div class="modal fade" id="pyment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">How To payment?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color: red"><h3>Follow below steps:</h3> <br />1. Select Send Money Option <br />2. Enter BdGamingZone Personal Number. <br />3. Enter total order amount<br />4. Verify your payment by entering your PIN. <br />5. After successful payment verify your payment by entering your mobile account number.<br />6. Once BdgamingZone verify your payment details within 1 hours your money will be added</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
@endpush
