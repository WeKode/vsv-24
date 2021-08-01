@extends('admin.layouts.app')

@section('title',__('actions.show-item',['name' => trans_choice('labels.role',1)]))

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
@endpush


@push('css')
    <link rel="stylesheet" href="{{asset("assets/plugins/dropzone/dropzone.css")}}">

    <script src="{{asset("assets/plugins/dropzone/dropzone.js")}}"></script>
@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('actions.show-record')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">{{trans_choice("labels.product",3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.show-record")}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="row">
                <!-- Default box -->
                <div class="card card-primary col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">{{__('actions.show')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div>
                        <div class="card-body row">
                            <div class="form-group col-md-3">
                                <label for="name">{{__('labels.name')}}</label>
                                <p>{{$product->name}}</p>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="price">{{__('labels.price')}}</label>
                                <p>{{$product->price}}</p>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="old_price">{{__('labels.old_price')}}</label>
                                <p>{{$product->old_price}}</p>
                            </div>

                            <div class="form-group col-md-3">
                                <label>{{__('brand')}}</label>
                                <p>{{$product->brand->name}}</p>
                            </div>

                            <div class="tab-pane text-left fade show col-12" id="vert-tabs-images" role="tabpanel" aria-labelledby="vert-tabs-images-tab">
                                <div class="tab-pane" id="images">
                                    <div class="tile">
                                        <h3 class="tile-title">{{trans_choice('labels.image',3)}}</h3>
                                        <div class="tile-body">
                                            <div class="row">
                                                @forelse($product->images as $image)
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <img src="{{ asset('storage/'.$image->path) }}"
                                                                     id="brandLogo"
                                                                     class="img-thumbnail"

                                                                     alt="img">
                                                            </div>
                                                        </div>
                                                    </div>

                                                @empty
                                                    <div class="col d-flex justify-content-center">
                                                        <div class="alert  alert-default-info">
                                                            {{__('labels.no-images')}}
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group col-12">
                                <label for="short_description">{{__('labels.short_description')}}</label>
                                <p>{!! $product->short_description !!}</p>
                            </div>

                            <div class="form-group col-12">
                                <label for="description">{{__('labels.description')}}</label>
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->

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
                            <form method="post" action="{{route('admin.products.attribute-values.store', $product->id)}}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="attributes">{{trans_choice('labels.attribute',1)}}</label>
                                        <select name="attribute_id"
                                                class="form-control select2 @error('attribute_id') is-invalid @enderror"
                                                id="attributes"></select>
                                        @error('attribute_id')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="valuesSelect">{{trans_choice('labels.value',1)}}</label>
                                        <select name="attribute_value_id"
                                                class="form-control  @error('attribute_value_id') is-invalid @enderror"
                                                id="valuesSelect"></select>
                                        @error('attribute_value_id')
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
                                    @foreach($product->attribute_values as $key => $av)
                                        <tr>
                                            <td>{{$key + 1 }}</td>
                                            <td>{{$av->name}}</td>
                                            <td>{{$av->attribute->name}}</td>
                                            <td>{{$av->created_at->format('m-d-Y')}}</td>
                                            <td>
{{--                                                <a href="{{route('admin.attribute-values.edit',$av->id)}}" class="btn btn-sm btn-warning">--}}
{{--                                                    <i class="fas fa-edit"></i>--}}
{{--                                                </a>--}}
                                                <button type="button" onclick="deleteItem({{$av->id}})" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
{{--                            <div class="d-flex justify-content-center">{{$attribute_values->links()}}</div>--}}
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
    </div>

@endsection
@push('js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>


    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>


    <script>
        $('document').ready(function () {


            $('#uploadButton').click(function(){
                if (myDropzone.files.length === 0) {
                    Toast.fire({
                        type: 'error',
                        title: 'Please select files to upload'
                    });
                } else {
                    myDropzone.processQueue();
                }
            });


            $("#pic").change(function() {
                readURL(this,'pic_preview');
            });
            $("#name").keyup(e=>{
                $('#slug').val(string_to_slug(e.target.value))
            });
        });
        let myDropzone = new Dropzone("#productImagesDropZone", {
            paramName: "image",
            addRemoveLinks: false,
            maxFilesize: 4,
            parallelUploads: 10,
            uploadMultiple: false,
            url: "{{ route('admin.products.images.upload') }}",
            autoProcessQueue: false,
            sending: function(file, xhr, formData) {
                formData.append("_token", $('[name=_token]').val());
                formData.append("product_id", {{$product->id}}); // Laravel expect the token post value to be named _token by default
            },
        });
        // preview image function
        const readURL = (input,id) =>{
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#'+id).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- Select2 -->
    <script>
        var all_attributes;
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
                    // if (params.term && params.term.length > 3)
                    // {
                    return {
                        search: params.term,
                        page: params.page || 1
                    };
                    // }

                },
                processResults: function ({attributes}, params) {
                    params.page = params.page || 1;

                    let fData = $.map(attributes.data, function (obj) {
                        obj.text = obj.name; // replace name with the property used for the text
                        return obj;
                    });

                    all_attributes = fData
                    return {
                        results: fData,
                        pagination: {
                            more: (params.page * 10) < attributes.total
                        }
                    };
                }
            }
        });

        $('#attributes').on('change', function() {


            var result = all_attributes.filter(obj => {
                return obj.id === parseInt(this.value)
            })

            setValues(result[0].values)
        });


        function setValues(values)
        {
            let valuesSelect = $('#valuesSelect')
            valuesSelect
                .find('option')
                .remove()
                .end()

            values.forEach(value =>
                valuesSelect
                    .append('<option value="'+value.id+'">'+value.name+'</option>')
            )
            ;
        }


    </script>

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
            f.setAttribute('action',`/admin/products/{{$product->id}}/attribute-values`);

            let i1 = document.createElement("input"); //input element, text
            i1.setAttribute('type',"hidden");
            i1.setAttribute('name','_token');
            i1.setAttribute('value','{{csrf_token()}}');


            let i2 = document.createElement("input"); //input element, text
            i2.setAttribute('type',"hidden");
            i2.setAttribute('name','_method');
            i2.setAttribute('value','DELETE');

            let i3 = document.createElement("input"); //input element, text
            i3.setAttribute('type',"hidden");
            i3.setAttribute('name','attribute_value_id');
            i3.setAttribute('value', id);

            f.appendChild(i3);
            f.appendChild(i1);
            f.appendChild(i2);

            document.body.appendChild(f);
            return f;
        }
    </script>
@endpush
