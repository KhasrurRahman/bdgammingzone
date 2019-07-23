@extends('layouts.backend.app')
@section('title','result_edit')

@push('css')

    <link href="{{asset('public/assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">

            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Result
                            </h2>
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
                            <form class="form-horizontal" action="
                                                        @if ($result->edited == true)
                                                                    {{route('admin.result_update2',$player->id)}}

                                                         @elseif($result->edited == false)
                                                            {{route('admin.result.update',$player->id)}}
                                                        @endif
                                                        "
                                  method="post">


                                @csrf
                                @if ($result->edited == false)
                                    @method('put')
                                @endif

                                <div class="row clearfix" >
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2"><span style="color:green;
">{{$player->p1_name}}</span> Kill:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$result->k1}}"
                                                       name="k1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix" <?php if ($match->type == '1'){?>style="display:none"<?php } ?>>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2"><span style="color:green;">{{$player->p2_name}}</span> Kill:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$result->k2}}"
                                                       name="k2">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix" <?php if ($match->type == '1'){?>style="display:none"<?php
                                } ?> <?php if ($match->type == '2'){?>style="display:none"<?php } ?>>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2"><span style="color:green;">{{$player->p3_name}}</span> Kill:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control"
                                                       value="{{$result->k3}}" name="k3">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix" <?php if ($match->type == '1'){?>style="display:none"<?php
                                } ?> <?php if ($match->type == '2'){?>style="display:none"<?php } ?>>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2"><span style="color:green;">{{$player->p4_name}}</span> Kill:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="{{$result->k4}}"
                                                       name="k4">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label" >
                                    <input type="checkbox" id="checkbox" name="win" value="1">
                                    <label for="checkbox">Get The Chicken Dinner</label>
                                </div>



                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                                <a href="{{ URL::previous() }}" class="btn btn-primary
                                waves-effect">Back</a>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>




@endsection

@push('js')
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('public/assets/backend/js/pages/ui/modals.js')}}"></script>



@endpush

