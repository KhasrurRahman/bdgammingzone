@extends('layouts.backend.app')
@section('title','Participants')

@push('css')

    <link href="{{asset('public/assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">

        <div class="card">

        <div class="body">

            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Leader</th>
                    <th>p2_name</th>
                    <th>p3_name</th>
                    <th>p4_name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>Leader</th>
                    <th>p2_name</th>
                    <th>p3_name</th>
                    <th>p4_name</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($posts as $key=>$post)
                    <tr>
                        <td>{{ $key++}}</td>
                        <td>{{ $post->p1_name}}</td>
                        <td>{{ $post->p2_name }}</td>
                        <td>{{ $post->p3_name}}</td>
                        <td>{{ $post->p4_name}}</td>
                        <td>
                            <a href="{{route('admin.all_user.show',$post->user->id)}}" class="btn btn-info waves-effect">
                                <i class="material-icons">people</i>
                            </a>
                        </td>
                    </tr>
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

@endpush

