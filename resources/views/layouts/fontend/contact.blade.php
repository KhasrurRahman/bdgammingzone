@extends('layouts.fontend.app')
@section('title','Contact Us')
@push('css')

@endpush
@section('content')
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Contact Us</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"><span>Contact Us</span></li>
            </ul>
        </div>
    </div>



    <div class="kode_content_wrap">
        <section class="contact_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <!--Contact  Thumb Start-->
                        <div class="kf_contct_thumb">
                            <h5 class="kf_hd8"><span>1.</span> Drop a Line</h5>
                            <div class="text">
                                <em>bdgamingzone.official@gmail.com</em>
                                <em>support@bdgamingzone.com</em>
                            </div>
                        </div>
                        <!--Contact  Thumb End-->
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <!--Contact  Thumb Start-->
                        <div class="kf_contct_thumb">
                            <h5 class="kf_hd8"><span>2.</span> Call US</h5>
                            <div class="text">
                                <em>+8801761955765</em>
                                <em>+8801624807084</em>
                            </div>
                        </div>
                        <!--Contact  Thumb End-->
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <!--Contact  Thumb Start-->
                        <div class="kf_contct_thumb">
                            <h5 class="kf_hd8"><span>3.</span> Find US</h5>
                            <div class="text">
                                <address>Mohammadpur, Dhaka,Bangladesh</address>
                                <span>Dhaka</span>
                            </div>
                        </div>
                        <!--Contact  Thumb End-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="kf_map">
                            <div id="map-canvas">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14606.06792954839!2d90.35101527023961!3d23.764597991678137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c09f9ba3d447%3A0x1babce9f1c6c95a3!2sMohammadpur%2C+Dhaka!5e0!3m2!1sen!2sbd!4v1557930808398!5m2!1sen!2sbd" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="kf_form">
                            <div class="kf_form_hd">
                                <h3>Get in Touch With us</h3>
                                <p>You can get in touch by completing an online form</p>
                            </div>
                            <form action="{{route('contactUs_save')}}" method="post">
                                @csrf
                                <div class="input_dec">
                                    <input placeholder="Your Name" type="text" name="name" required>
                                </div>
                                <div class="input_dec">
                                    <input placeholder="Your Email Address" type="text" name="email" required>
                                </div>
                                <div class="input_textarea">
                                    <textarea placeholder="Your Message" name="message" required></textarea>
                                </div>
                                <input class="input-btn" type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Main Content Wrap End-->

@endsection

@push('js')
    <script src="js/dl-menu/modernizr.custom.js"></script>
    <script src="js/dl-menu/jquery.dlmenu.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
@endpush
