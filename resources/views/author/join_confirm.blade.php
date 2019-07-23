@extends('layouts.fontend.app')
@section('title','Confirm Join')
@push('css')
    <style>
        input[data-readonly] {
            pointer-events: none;
        }
    </style>
@endpush
@section('content')

    <!--Inner Banner Start-->
    <div class="innner_banner">
        <div class="container">
            <h3>Confirm Join</h3>
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active"><span>Confirm Join</span></li>
            </ul>
        </div>
    </div>

    <!--Inner Banner End-->
    <div class="kode_content_wrap">
        <section class="contact_page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="kf_form">
                            <div class="kf_form_hd">
                                <h3>{{$match->title}}</h3>
                                <p style="color: red">Entry Fee = {{$match->entry_fee}}Tk</p>
                            </div>
                            <form action="{{route('author.entry',$match->id)}}" method="post">
                            @csrf

                                @if ($match->type == 1)

                                        <div class="form-group col-md-12">
                                            <label for="inputCity">Your pubg username[change it from yor profile]</label>
                                            <input type="text" class="form-control" name="p1_name" required>
                                        </div>

                                    <input type="text" name="p2_name" value="test" style="display: none">
                                    <input type="text" name="p3_name" value="test" style="display: none">
                                    <input type="text" name="p4_name" value="test" style="display: none">

                                    @elseif ($match->type == 2)

                                    <div class="form-group col-md-12">
                                        <label for="inputCity">Your pubg username[change it from yor profile]</label>
                                        <input type="text" class="form-control" name="p1_name" required >
                                    </div>
             <hr>
                                    <div class="form-group col-md-12">
                                        <label for="inputCity">Player-2 pubg username</label>
                                        <input type="text" class="form-control" value="" name="p2_name" required>
                                    </div>
                                    <input type="text" name="p3_name" value="test" style="display: none">
                                    <input type="text" name="p4_name" value="test" style="display: none">
                                    @elseif ($match->type == 3)

                                    <div class="form-group col-md-12">
                                        <label for="inputCity">Your pubg username[change it from yor profile]</label>
                                        <input type="text" class="form-control" name="p1_name" required>
                                    </div>

<hr>
                                    <div class="form-group col-md-12">
                                        <label for="inputCity">Player-2 pubg username</label>
                                        <input type="text" class="form-control" value="" name="p2_name" required>
                                    </div>

<hr>
                                    <div class="form-group col-md-12">
                                        <label for="inputCity">Player-3 pubg username</label>
                                        <input type="text" class="form-control" value="" name="p3_name" required>
                                    </div>

<hr>
                                    <div class="form-group col-md-12">
                                        <label for="inputCity">Player-4 pubg username</label>
                                        <input type="text" class="form-control" value="" name="p4_name" required>
                                    </div>

                                @endif

                            <button type="submit" class="btn btn-primary">Confirm Join</button>
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
@endpush











