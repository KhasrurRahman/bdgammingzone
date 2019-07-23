@extends('layouts.backend.app')
@section('title','result')

@push('css')

    <link href="{{asset('public/assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <a href="{{ URL::previous() }}" class="btn btn-primary waves-effect">Back</a>
        <div class="card">

        <div class="body">



            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                <tr>
                    <th>id</th>
                    <th>p1_name</th>
                    <th <?php if ($match->type == '1' ){?>style="display:none"<?php } ?> >p2_name</th>
                    <th <?php if ($match->type == '1'){?>style="display:none"<?php } ?> <?php if ($match->type ==
                    '2'){?>style="display:none"<?php } ?> >p3_name</th>
                    <th <?php if ($match->type == '1'){?>style="display:none"<?php } ?> <?php if ($match->type ==
                    '2'){?>style="display:none"<?php } ?> >p4_name</th>
                    <th>Total Kill</th>
                    <th>Total Win</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>p1_name</th>
                    <th <?php if ($match->type == '1' ){?>style="display:none"<?php } ?> >p2_name</th>
                    <th <?php if ($match->type == '1'){?>style="display:none"<?php } ?> <?php if ($match->type ==
                    '2'){?>style="display:none"<?php } ?> >p3_name</th>
                    <th <?php if ($match->type == '1'){?>style="display:none"<?php } ?> <?php if ($match->type ==
                    '2'){?>style="display:none"<?php } ?> >p4_name</th>
                    <th>Total Kill</th>
                    <th>Total Win</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($posts as $key=>$post)
                    @foreach($post->results as $result)
                    <tr <?php if ($result->edited == true){?>style="background:greenyellow"<?php } ?>>
                        <td>{{ $key++}}</td>
                        <td>{{ $post->p1_name}} (<span style="color: red;">Kill: {{$result->k1}}</span>)(<span
                                style="color: red;">Win: {{$result->w1}}tk</span>)</td>

                        <td <?php if ($match->type == '1'){?>style="display:none"<?php } ?>>{{ $post->p2_name}} (<span style="color: red;
">Kill:
                                {{$result->k2}}</span>)(<span
                                style="color: red;">Win: {{$result->w1}}tk</span>)</td>
                        <td <?php if ($match->type == '1'){?>style="display:none"<?php } ?> <?php if ($match->type == '2'){?>style="display:none"<?php } ?> >{{ $post->p3_name}} (<span style="color:
                         red;
">Kill: {{$result->k3}}</span>)(<span
                                style="color: red;">Win: {{$result->w3}}tk</span>)</td>
                        <td <?php if ($match->type == '1'){?>style="display:none"<?php } ?> <?php if ($match->type == '2'){?>style="display:none"<?php } ?> >{{ $post->p4_name}} (<span style="color:
                         red;
">Kill: {{$result->k4}}</span>)(<span
                                style="color: red;">Win: {{$result->w4}}tk</span>)</td>
                        <td>{{$result->total_kill}}</td>
                        <td>{{$result->total_win}}</td>
                        <td class="text-center">

                            @if ($result->edited == true)
                                <a href="{{ route('admin.result.edit',$post->id) }}" class="btn btn-info
                                        waves-effect">
                                    <span>Result</span>
                                </a>

                             @elseif($result->edited == false)
                                <a href="{{ route('admin.result.edit',$post->id) }}" class="btn btn-info
                                        waves-effect">
                                    <span>Result</span>
                                </a>
                            @endif


                        </td>
                    </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
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

