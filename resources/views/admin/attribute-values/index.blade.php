@extends('admin.layouts.app')

@section('title',trans_choice('labels.value',3))

@push('css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{trans_choice('labels.value',3)}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item active">{{__("labels.list",['name' => trans_choice('labels.value',3)])}}</li>
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
                                <h3 class="card-title">{{__('actions.add-new',['name' => trans_choice('labels.value',1)])}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{route('admin.attribute-values.store')}}">
                                @csrf
                                <div class="card-body">
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
                                        <label for="attributes">{{trans_choice('labels.attributes',1)}}</label>
                                        <select name="attribute_id"
                                                class="form-control select2 @error('attribute') is-invalid @enderror"
                                                id="attributes"></select>
                                        @error('attribute_id')
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
                                        <th>{{trans_choice('labels.attribute',1)}}</th>
                                        <th>{{__('labels.created_at')}}</th>
                                        <th>{{__('actions.actions')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attribute_values as $key => $av)
                                    <tr>
                                        <td>{{$key + 1 }}</td>
                                        <td>{{$av->name}}</td>
                                        <td>{{$av->attribute->name}}</td>
                                        <td>{{$av->created_at->format('m-d-Y')}}</td>
                                        <td>
                                            <a href="{{route('admin.attribute-values.edit',$av->id)}}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" onclick="deleteItem({{$av->id}})" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="d-flex justify-content-center">{{$attribute_values->links()}}</div>
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

    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>




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

        <!-- Select2 -->
                //Initialize Select2 Elements
        $('.select2').select2({
            minimumInputLength:2,
            cache:true,
            ajax: {
                delay: 250,
                url: '{{route('admin.attributes.index')}}',
                dataType: 'json',
                data: function (params) {

                    // Query parameters will be ?search=[term]&page=[page]
                    if (params.term && params.term.length > 3)
                    {
                        return {
                            search: params.term,
                            page: params.page || 1
                        };
                    }

                },
                processResults: function ({attributes}, params) {
                    params.page = params.page || 1;

                    let fData = $.map(attributes.data, function (obj) {
                        obj.text = obj.name; // replace name with the property used for the text
                        return obj;
                    });

                    return {
                        results: fData,
                        pagination: {
                            more: (params.page * 10) < attributes.total
                        }
                    };
                }
            }
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
            f.setAttribute('action',`/admin/attribute-values/${id}`);

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
