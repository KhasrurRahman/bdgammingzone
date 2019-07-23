@extends('layouts.fontend.app')
@section('title','Home')
@push('css')

@endpush
@section('content')
    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Official Clan</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"><span>Official Clan</span></li>
            </ul>
        </div>
    </div>



    <div class="kode_content_wrap">
        <section>
            <div class="container">
    <div class="widget widget_recentnews">
        <!--Heading 1 Start-->
        <h6 class="kf_hd1">
            <span>Official Clan</span>
        </h6>
        <!--Heading 1 END-->
        <div class="kf_border">
            <!--Recent News Start-->
            <div class="kf_recentnews">
                <figure>
                    <a href="#"><img src="extra-images/recent_1.jpg" alt=""></a>
                </figure>
                <div class="text">
                    <h6>Our Official Clan Name:</h6>
                    <h1 style="color: #00cc66">Bd Gaming Zone</h1>
                </div>
            </div>
            <!--Recent News End-->
        </div>
    </div>

            </div>
        </section>
    </div>
@endsection

@push('js')
@endpush
