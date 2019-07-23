<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="First Bangladeshi website where you can earn money by playing a game.No installation, just browse and join a game tournament.Play, for your soul.">
    <meta name="keywords" content="BDGAMINGZONE,GAMINGZONE,BDGAME,GAME,game,Gameshop,khelaGhor,pubg,PUBG Mobile,PUBG Community,PlayerUnknown's Battlegrounds">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:image" content="{{asset('public/assets/fontend/images/logo.jpg')}}">
    <link rel="image_src" href="{{asset('public/assets/fontend/images/logo.jpg')}}">

    {{--favicon--}}
    <link rel="icon" href="{{asset('public/assets/fontend/images/favicon.png')}}" sizes="16x16 32x32" type="image/png">
    <!-- Stylesheets -->

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/assets/fontend/css/bootstrap.css')}}" rel="stylesheet">
    <!-- DL Menu CSS -->
    <link href="{{asset('public/assets/fontend/js/dl-menu/component.css')}}" rel="stylesheet">
    <!-- Slick Slider CSS -->
    <link href="{{asset('public/assets/fontend/css/slick.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/assets/fontend/css/slick-theme.css')}}" rel="stylesheet"/>
    <!-- ICONS CSS -->
    <link href="{{asset('public/assets/fontend/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/fontend/css/svg-icons.css')}}" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="{{asset('public/assets/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <!-- Typography CSS -->
    <link href="{{asset('public/assets/fontend/css/typography.css')}}" rel="stylesheet">
    <!-- Widget CSS -->
    <link href="{{asset('public/assets/fontend/css/widget.css')}}" rel="stylesheet">
    <!-- Shortcodes CSS -->
    <link href="{{asset('public/assets/fontend/css/shortcodes.css')}}" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="{{asset('public/assets/fontend/css/style.css')}}" rel="stylesheet">
    <!-- Color CSS -->
    <link href="{{asset('public/assets/fontend/css/color.css')}}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{asset('public/assets/fontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/fontend/css/toastr.min.css')}}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')-{{ config('app.name', 'Home') }}</title>

    @stack('css')

</head>
<body>
@include('layouts.fontend.pertial.header')


@yield('content')


@include('layouts.fontend.pertial.footer')

<!--Jquery Library-->
<script src="{{asset('public/assets/fontend/js/jquery.js')}}"></script>
<!--Bootstrap core JavaScript-->
<script src="{{asset('public/assets/fontend/js/bootstrap.js')}}"></script>
<!--Slick Slider JavaScript-->
<script src="{{asset('public/assets/fontend/js/slick.min.js')}}"></script>
<!--Number Count (Waypoints) JavaScript-->
<script src="{{asset('public/assets/fontend/js/downCount.js')}}"></script>
<script src="{{asset('public/assets/fontend/js/waypoints-min.js')}}"></script>
<!--Dl Menu Script-->
<script src="{{asset('public/assets/fontend/js/dl-menu/modernizr.custom.js')}}"></script>
<script src="{{asset('public/assets/fontend/js/dl-menu/jquery.dlmenu.js')}}"></script>
<!--Progress bar JavaScript-->
<script src="{{asset('public/assets/fontend/js/jprogress.js')}}" type="text/javascript"></script>
<!--Pretty Photo JavaScript-->
<script src="{{asset('public/assets/fontend/js/jquery.prettyPhoto.js')}}"></script>
<!--Custom JavaScript-->
<script src="{{asset('public/assets/fontend/js/custom.js')}}"></script>
<script src="{{asset('public/assets/fontend/js/toastr.min.js')}}"></script>

<script src="{{asset('public/assets/fontend/js/canvasjs.min.js')}}" type="text/javascript"></script>

{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    }       );
    @endforeach
    @endif
</script>
@stack('js')

</body>
</html>
