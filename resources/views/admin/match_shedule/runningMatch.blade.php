@extends('layouts.backend.app')
@section('title','Running Match')

@push('css')
    <link href="{{asset('public/assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    @endpush
@section('content')
    <div class="container-fluid">


        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            All post
                            <span class="badge bg-blue">{{ $posts->count() }}</span>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>date</th>
                                    <th>time</th>
                                    <th>version</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>entry_fee</th>
                                    <th>per_kill</th>
                                    <th>winner</th>
                                    <th>join</th>
                                    <th>map</th>
                                    <th>type</th>
                                    <th>platform</th>
                                    <th>status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>date</th>
                                    <th>time</th>
                                    <th>version</th>
                                    <th><i class="material-icons">visibility</i></th>
                                    <th>entry_fee</th>
                                    <th>per_kill</th>
                                    <th>winner</th>
                                    <th>join</th>
                                    <th>map</th>
                                    <th>type</th>
                                    <th>platform</th>
                                    <th>status</th>
                                    <th>Action</th>

                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($posts as $key=>$post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ str_limit($post->title,'10') }}</td>
                                    <td>{{ $post->date }}</td>
                                    <td>{{ $post->time }}</td>
                                    <td>{{ $post->version }}</td>
                                    <td>
                                        @if ($time->toDateTimeString() > $post->date.' '.$post->time)
                                            <i class="material-icons">close</i>
                                        @else
                                            <i class="material-icons">check</i>
                                        @endif

                                    </td>
                                    <td>{{ $post->entry_fee }}</td>
                                    <td>{{ $post->per_kill }}</td>
                                    <td>{{ $post->winner }}</td>
                                    <td>{{ $post->join }}</td>
                                    <td>
                                        @if($post->map == 1 )
                                            <img src="{{asset('public/assets/backend/images/map/pubg/erangel.jpg')}}" style="height: 50px">
                                        @elseif ($post->map == 2)
                                            <img src="{{asset('public/assets/backend/images/map/pubg/miramar.jpeg')}}" style="height: 50px">
                                        @elseif ($post->map == 3)
                                            <img src="{{asset('public/assets/backend/images/map/pubg/sanhok.jpg')}}" style="height: 50px">
                                        @elseif ($post->map == 4)
                                            <img src="{{asset('public/assets/backend/images/map/pubg/vikindi.png')}}" style="height: 50px">
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->type == 1 )
                                            <p>Solo</p>
                                        @elseif ($post->type == 2)
                                            <p>Duo</p>
                                        @elseif ($post->type == 3)
                                            <p>squard</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->platform == 1 )
                                            <p>mobile</p>
                                        @elseif ($post->platform == 2)
                                            <p>emulator</p>
                                        @elseif ($post->platform == 3)
                                            <p>Both</p>
                                        @endif
                                    </td>

                                    <td>
                                        @if($post->status == false )
                                            <p>Not Running</p>
                                        @elseif ($post->status == true)
                                            <p>Running</p>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.result.show',$post->id) }}" class="btn btn-info
                                        waves-effect">
                                            <span>Result</span>
                                        </a>

                                        <a href="{{ route('admin.room',$post->id) }}" class="btn btn-info
                                        waves-effect">
                                            @if(empty($post->room_id))
                                                <span style="background:red;">Room</span>
                                                @else
                                                <span style="background:green;">Room</span>
                                            @endif

                                        </a>

                                        <button class="btn btn-danger waves-effect" type="button" onclick="move2({{
                                        $post->id }})">
                                            <i class="material-icons">done</i>
                                        </button>
                                        <form id="delete-form-{{ $post->id }}" action="{{ route('admin.move2',$post->id) }}" method="get" style="display: none">
                                            @csrf

                                        </form>


                                        <a href="{{ route('admin.match_shedule.edit',$post->id) }}" class="btn btn-info waves-effect">
                                            <i class="material-icons">edit</i>
                                        </a>

                                        <a href="{{ route('admin.All_participants',$post->id) }}" class="btn
                                        btn-info
                                        waves-effect">
                                            <i class="material-icons">people</i>
                                        </a>

                                        <button class="btn btn-danger waves-effect" type="button" onclick="send_notification({{
                                        $post->id }})">
                                            <i class="material-icons">notifications_active</i>
                                        </button>
                                        <form id="notification-{{ $post->id }}" action="{{ route('admin.send_notification',$post->id) }}" method="get" style="display: none">
                                            @csrf

                                        </form>


                                    </td>

                                </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>

@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.11/dist/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        function move2(id) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            });

            swalWithBootstrapButtons({
                title: 'Are you sure to End This Match?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }

    </script>

    <script>
        function send_notification(id) {
            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            });

            swalWithBootstrapButtons({
                title: 'Are you sure to send notification?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, send notification!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('notification-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>



    @endpush
