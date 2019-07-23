@extends('layouts.backend.app')
@section('title','match shedule')
@push('css')
    <link href="{{ asset('public/assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid">


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Create Match Shedule</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <form id="form_validation" action="{{route('admin.match_shedule.update',$match->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="title" required="" value="{{$match->title}}">
                                <label class="form-label">Title</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" class="form-control" name="date" required="" value="{{$match->date}}">

                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="time" required="" value="{{$match->time}}">

                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="entry_fee" required="" value="{{$match->entry_fee}}">
                                <label class="form-label">entry fee</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="per_kill" required="" value="{{$match->per_kill}}">
                                <label class="form-label">per kill</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="winner" required="" value="{{$match->winner}}">
                                <label class="form-label">winner</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="join" value="{{$match->join}}">
                                <label class="form-label">Joined</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="map">select map</label>
                                    <select name="map" id="category" class="form-control show-tick selectpicker" data-live-search="true" data-max-options="1">
                                        <option value="1" {{ $match->map == 1 ? 'selected' : '' }}>Erangel</option>
                                        <option value="2" {{ $match->map == 2 ? 'selected' : '' }}>Miramer</option>
                                        <option value="3" {{ $match->map == 3 ? 'selected' : '' }}>Sanhok</option>
                                        <option value="4" {{ $match->map == 4 ? 'selected' : '' }}>vikindi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="category">select type</label>
                                    <select name="type" id="category" class="form-control show-tick selectpicker" data-live-search="true" data-max-options="1">

                                        <option value="1" {{ $match->type == 1 ? 'selected' : '' }}>solo</option>
                                        <option value="2" {{ $match->type == 2 ? 'selected' : '' }}>Duo</option>
                                        <option value="3" {{ $match->type == 3 ? 'selected' : '' }}>squard</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="category">select platform</label>
                                    <select name="platform" id="category" class="form-control show-tick selectpicker" data-live-search="true" data-max-options="1">

                                        <option value="1" {{ $match->platform == 1 ? 'selected' : '' }}>Mobile</option>
                                        <option value="2" {{ $match->platform == 2 ? 'selected' : '' }}>emulator</option>
                                        <option value="3" {{ $match->platform == 3 ? 'selected' : '' }}>both</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="version" type="text" class="form-control no-resize" value="{{$match->version}}">
                                <label class="form-label">version</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="link" type="text" class="form-control no-resize" value="{{$match->stream->first()->link}}">
                                <label class="form-label">Stream Link</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="t" type="text" class="form-control no-resize" value="{{$match->t}}">
                                <label class="form-label">(3 24, 2019 0:0:0)</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize" >{{$match->description}}</textarea>
                                <label class="form-label">Description</label>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

<!-- Select Plugin Js -->
<script src="{{asset('public/assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

@push('js')

@endpush
