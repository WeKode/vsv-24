@extends('admin.layouts.app')

@section('title',trans_choice('labels.admin',3))

@push('css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{trans_choice('labels.admin',3)}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
{{--                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>--}}
                            <li class="breadcrumb-item active">{{__("labels.list",['name' => trans_choice('labels.admin',3)])}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{__("labels.list",['name' => trans_choice('labels.admin',3)])}}</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                    <div class="card-tools">
                                        <a class="btn btn-sm btn-info" href="{{route('admin.admins.create')}}">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans_choice('labels.image',1)}}</th>
                                        <th>{{__('labels.name')}}</th>
                                        <th>{{__('labels.email')}}</th>
                                        <th>{{__('labels.created_at')}}</th>
                                        <th>{{__('actions.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($admins as $key => $a)
                                    <tr>
                                        <td>{{$key + 1 }}</td>
                                        <td>
                                            <img src="{{$a->pic_url}}" width="60" height="60" class="img-circle elevation-1" alt="User Image">
                                        </td>
                                        <td>{{$a->name}}</td>
                                        <td>{{$a->email}}</td>
                                        <td>{{$a->created_at->format('m-d-Y')}}</td>
                                        <td>
                                            <a href="{{route('admin.admins.edit',$a->id)}}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" onclick="deleteItem({{$a->id}})" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="d-flex justify-content-center">{{$admins->links()}}</div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection


@push('js')
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script>
        $(function () {
            $("#datatable").DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            });

            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            //     "responsive": true,
            // });

        });

        const deleteItem = id => {

            Swal.fire({
                title: '{{__('actions.delete_confirm_title')}}',
                text: "{{__('actions.delete_confirm_text')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('actions.delete_btn_yes')}}',
                cancelButtonText: '{{__('actions.delete_btn_cancel')}}'
            }).then((result) => {
                if (result.value) {
                    createForm(id).submit();
                }
            });
        }
        const createForm = id => {
            let f = document.createElement("form");
            f.setAttribute('method',"post");
            f.setAttribute('action',`/admin/admins/${id}`);

            let i1 = document.createElement("input"); //input element, text
            i1.setAttribute('type',"hidden");
            i1.setAttribute('name','_token');
            i1.setAttribute('value','{{csrf_token()}}');

            let i2 = document.createElement("input"); //input element, text
            i2.setAttribute('type',"hidden");
            i2.setAttribute('name','_method');
            i2.setAttribute('value','DELETE');

            f.appendChild(i1);
            f.appendChild(i2);
            document.body.appendChild(f);
            return f;
        }
    </script>

@endpush
