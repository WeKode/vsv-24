@extends('admin.layouts.app')

@section('title',__('actions.edit-item',['name' => trans_choice('labels.role',1)]))

@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush


@push('css')
    <link rel="stylesheet" href="{{asset("assets/plugins/DropZone/dropzone.css")}}">

    <script src="{{asset("assets/plugins/DropZone/dropzone.js")}}"></script>
@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('actions.update')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.products.index')}}">{{trans_choice("labels.product",3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.update")}}</li>
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
                <div class="card card-primary col-md-6">
                    <div class="card-header">
                        <h3 class="card-title">{{__('actions.edit')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('admin.products.update',$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('labels.name')}}</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       required name="name" value="{{old('name',$product->name)}}"
                                       id="name" placeholder="{{__('labels.name')}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">{{__('labels.price')}}</label>
                                <input type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       required name="price" value="{{old('price', $product->price)}}"
                                       id="price" placeholder="{{__('labels.price')}}">
                                @error('price')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="tab-pane text-left fade show " id="vert-tabs-images" role="tabpanel" aria-labelledby="vert-tabs-images-tab">
                                <div class="tab-pane" id="images">
                                    <div class="tile">
                                        <h3 class="tile-title">{{__("actions.add-new",['name' => trans_choice('labels.image',3)])}}</h3>
                                        <hr>
                                        <div class="tile-body">
                                            <div class="row">
                                                {{--                                        style="border: 2px dashed rgba(0,0,0,0.3)"--}}
                                                <div class="col-md-12">
                                                    <div class="dropzone" id="productImagesDropZone" >
                                                        <input type="hidden" name="product_id"  value="{{ $product->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row d-print-none mt-2">
                                                <div class="col-12 text-right">
                                                    <button class="btn btn-success" type="button" id="uploadButton">
                                                        <i class="fa fa-fw fa-lg fa-upload"></i>{{__('labels.upload')}}
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                @forelse($product->images as $image)
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <img src="{{ asset('storage/'.$image->path) }}"
                                                                     id="brandLogo"
                                                                     class="img-thumbnail"

                                                                     alt="img">
                                                                <a class="card-link float-right text-danger" href="{{ route('admin.products.images.delete', $image->id) }}">
                                                                    <i class="fa fa-fw fa-lg fa-trash"></i>
                                                                </a>
{{--                                                                <input type="checkbox" name="images[]" value="{{$image->id}}">--}}
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

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{__('labels.submit')}}</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection
@push('js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <!-- Select2 -->
{{--    <script>--}}
{{--        //Initialize Select2 Elements--}}
{{--        $('.select2').select2({--}}
{{--            minimumInputLength:0,--}}
{{--            cache:true,--}}
{{--            ajax: {--}}
{{--                delay: 250,--}}
{{--                url: '{{route('product.roles.index')}}',--}}
{{--                dataType: 'json',--}}
{{--                processResults: function ({roles}, params) {--}}
{{--                    let fData = $.map(roles, function (obj) {--}}
{{--                        obj.text = obj.name; // replace name with the property used for the text--}}
{{--                        return obj;--}}
{{--                    });--}}

{{--                    return {--}}
{{--                        results: fData,--}}
{{--                    };--}}
{{--                }--}}
{{--            }--}}
{{--        })--}}


{{--    </script>--}}


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
@endpush
