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
                    <form id="form_validation" action="{{route('admin.match_shedule.store')}}" method="post">
                        @csrf
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="title" required="">
                                <label class="form-label">Title</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="date" class="form-control" name="date" required="">

                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="time" required="">
                                <label class="form-label">Time</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="entry_fee" required="">
                                <label class="form-label">entry fee</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="per_kill" required="" >
                                <label class="form-label">per kill</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="winner" required="">
                                <label class="form-label">winner</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="join">
                                <label class="form-label">Joined</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="category">select map</label>
                                    <select name="map" id="category" class="form-control show-tick" data-live-search="true">
                                        <option value="1">Erangel</option>
                                        <option value="2">Meramer</option>
                                        <option value="3">Sanhok</option>
                                        <option value="4">Vikindi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="category">select type</label>
                                    <select name="type" id="category" class="form-control show-tick" data-live-search="true">
                                        <option value="1">solo</option>
                                        <option value="2">Duo</option>
                                        <option value="3">squard</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label for="category">select platform</label>
                                    <select name="platform" id="category" class="form-control show-tick" data-live-search="true">
                                        <option value="1">Only Mobile</option>
                                        <option value="2">Only emulator</option>
                                        <option value="3">emulator and mobile both</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="version" required="" >
                                <label class="form-label">version</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="weapon" required="" >
                                <label class="form-label">weapon</label>
                            </div>
                        </div>


                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="link">
                                <label class="form-label">Stream Link</label>
                            </div>
                        </div>


                        <div class="form-group form-float">
                            <div class="form-line">
                                <input name="t" type="text" class="form-control no-resize" >
                                <label class="form-label">(3 24, 2019 0:0:0)</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <textarea name="description" cols="30" rows="5" class="form-control no-resize" ></textarea>
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
