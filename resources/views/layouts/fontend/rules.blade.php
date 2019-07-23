@extends('layouts.fontend.app')
@section('title','Rules')
@push('css')

@endpush
@section('content')
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Rules And Regulations</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="#">Match</a></li>
                <li class="active"><span>Rules And Regulations</span></li>
            </ul>
        </div>
    </div>

    <div class="kode_content_wrap">
        <section class="kf_overview_page">
            <div class="container">
                <div class="overview_wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget widget_teamnews">
                                <!--Heading 1 Start-->
                                <h6 class="kf_hd1">
                                    <span>RULES AND REGULATIONS</span>
                                </h6>
                                <!--Heading 1 END-->
                                <div class="kf_border">
                                    <!--Recent Post Dec Start-->
                                    <div class="recentpost_dec">
                                        <span>1.</span>
                                        <p>If in anyway you fail to join the room by the match start
                                            time then we aren't responsible for it. Refund in such cases
                                            won't be processed. So make sure to join on time.</p>
                                    </div>
                                    <div class="recentpost_dec">
                                        <span>2.</span>
                                        <p>Do not share the Room ID & Password with anyone who
                                            has not joined the match. if you are doing so, your account
                                            may get terminated and all the winnings will be lost.</p>
                                    </div>
                                    <div class="recentpost_dec">
                                        <span>3.</span>
                                        <p>Griefing and Teaming is against the game rules. Any
                                            perticipant found doing so will be disqualified and their
                                            prizes will be lost </p>
                                    </div>
                                    <div class="recentpost_dec">
                                        <span>4.</span>
                                        <p>Room ID and Password will be shared on this page
                                            before 15 minutes of the match start time. </p>
                                    </div>

                                    <div class="recentpost_dec">
                                        <span>5.</span>
                                        <p>Match will start after 15 minutes of Sharing Room ID and
                                            Password. </p>
                                    </div>
                                    <div class="recentpost_dec">
                                        <span>6.</span>
                                        <p>In Paid Match, you have to pay entry fee. </p>
                                    </div>

                                    <div class="recentpost_dec">
                                        <span>7.</span>
                                        <p style="color: red">If any of your friends are not willing to register the website then you can add them in squad matches without registration and pay there entry fees through your account.</p>
                                    </div>

                                    <div class="recentpost_dec">
                                        <span>8.</span>
                                        <p>Once you joined the match custom room, do not keep
                                            changing your position. If you do so, you may get kicked
                                            from the room.</p>
                                    </div>

                                    <div class="recentpost_dec">
                                        <span>9.</span>
                                        <p>Spots are given on the First Come First Basis.</p>
                                    </div>

                                    <div class="recentpost_dec">
                                        <span>10.</span>
                                        <p>If anyone found violating these rules then immediate
                                            action will be taken and respective accounts may get
                                            banned and rewards may be abandoned. </p>
                                    </div>

                                </div>
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
