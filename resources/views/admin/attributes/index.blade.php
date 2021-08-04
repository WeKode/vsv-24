@extends('admin.layouts.app')

@section('title',trans_choice('labels.attribute',3))

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
                        <h1>{{trans_choice('labels.attribute',3)}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item active">{{__("labels.list",['name' => trans_choice('labels.attribute',3)])}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary col-md-12">
                            <div class="card-header">
                                <h3 class="card-title">{{__('actions.add-new',['name' => trans_choice('labels.attribute',1)])}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{route('admin.attributes.store')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="type">{{__('labels.type')}}</label>
                                        <select class="form-control @error('type') is-invalid @enderror"
                                                required name="type" id="type" data-placeholder="{{__('labels.type')}}">
                                            <option value="1" {{old('type') == 1 ? 'selected' : ''}}>{{__('labels.smartphone')}}</option>
                                            <option value="2" {{old('type') == 2 ? 'selected' : ''}}>{{__('labels.phone-plan')}}</option>
                                            <option value="3" {{old('type') == 3 ? 'selected' : ''}}>{{__('labels.energy-plan')}}</option>
                                        </select>
                                        @error('type')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name">{{__('labels.name')}}</label>
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               required name="name" value="{{old('name')}}"
                                               id="name" placeholder="{{__('labels.name')}}">
                                        @error('name')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">{{__('labels.description')}} <span class="text-info">({{__('labels.optional')}})</span></label>
                                        <textarea name="description"
                                                  id="description"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  rows="3">{{old("description")}}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{__('labels.submit')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{__("labels.list",['name' => trans_choice('labels.attribute',3)])}}</h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                    <div class="card-tools">
{{--                                        <a class="btn btn-sm btn-info" href="{{route('admin.attributes.create')}}">--}}
{{--                                            <i class="fas fa-plus"></i>--}}
{{--                                        </a>--}}
                                    </div>
                                <table id="datatable" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('labels.name')}}</th>
                                        <th>{{__('labels.description')}}</th>
                                        <th>{{__('labels.created_at')}}</th>
                                        <th>{{__('actions.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attributes as $key => $a)
                                    <tr>
                                        <td>{{$key + 1 }}</td>
                                        <td>{{$a->name}}</td>
                                        <td>{{$a->description ?? '/'}}</td>
                                        <td>{{$a->created_at->format('m-d-Y')}}</td>
                                        <td>
                                            <a href="{{route('admin.attributes.edit',$a->id)}}" class="btn btn-sm btn-warning">
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
                            <div class="d-flex justify-content-center">{{$attributes->links()}}</div>
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
            f.setAttribute('action',`/admin/attributes/${id}`);

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
