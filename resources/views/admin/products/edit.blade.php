@extends('admin.layouts.app')

@section('title',__('actions.edit-item',['name' => trans_choice('labels.role',1)]))

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
                <div class="card card-primary col-md-8">
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
                                <label for="type">{{__('labels.type')}}</label>
                                <select class="form-control @error('type') is-invalid @enderror"
                                        required name="type" id="type" data-placeholder="{{__('labels.type')}}">
                                    <option value="1" {{old('type', $product->type) == 1 ? 'selected' : ''}}>{{__('labels.smartphone')}}</option>
                                    <option value="2" {{old('type', $product->type) == 2 ? 'selected' : ''}}>{{__('labels.phone-plan')}}</option>
                                    <option value="3" {{old('type', $product->type) == 3 ? 'selected' : ''}}>{{__('labels.energy-plan')}}</option>
                                </select>
                                @error('type')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

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
                                <label for="short_description">{{__('labels.short_description')}}</label>
                                <textarea name="short_description"
                                          class="form-control @error('short_description') is-invalid @enderror"
                                          id="short_description" rows="4">{{old('short_description',$product->short_description)}}</textarea>
                                @error('short_description')
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

                            <div class="form-group">
                                <label for="old_price">{{__('labels.old_price')}}</label>
                                <input type="text"
                                       class="form-control @error('old_price') is-invalid @enderror"
                                        name="old_price" value="{{old('old_price', $product->old_price)}}"
                                       id="old_price" placeholder="{{__('labels.old_price')}}">
                                @error('old_price')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{__('available')}}</label>
                                <select class=" form-control @error('is_available') is-invalid @enderror"
                                        name="is_available" data-placeholder="{{__('available')}}"
                                        style="width: 100%;">
                                    <option value="1" {{old('is_available', $product->is_available) == 1 ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{old('is_available', $product->is_available) == 0 ? 'selected' : ''}}>No</option>
                                </select>
                                @error('is_available')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="brand">{{trans_choice('labels.brand', 1)}}</label>
                                <select  class="select2 form-control @error('brand_id') is-invalid @enderror"
                                        name="brand_id" id="brand" data-placeholder="{{trans_choice('labels.brand', 1)}}"
                                        style="width: 100%;">
                                    @if($product->brand)
                                    <option value="{{$product->brand->id}}" selected> {{$product->brand->name}} </option>
                                    @endif

                                </select>
                                @error('brand_id')
                                <div class="invalid-feedback">{{$message}}</div>
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

                            <div class="form-group">
                                <label for="description">{{__('labels.description')}}</label>
                                <textarea name="description" id="description" >{{old('short_description',$product->description)}}</textarea>
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
                <!-- /.card -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection
@push('js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

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
        $(function () {
            // Summernote
            $('#description').summernote({
                mode: "htmlmixed",
                theme: "monokai",
                placeholder: '{{__('labels.description')}}',
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'help']]
                ]
            });
        })

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
        //Initialize Select2 Elements
        $('.select2').select2({
            minimumInputLength:2,
            cache:true,
            ajax: {
                delay: 250,
                url: '{{route('admin.brands.list.index')}}',
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
                processResults: function ({brands}, params) {
                    params.page = params.page || 1;

                    let fData = $.map(brands.data, function (obj) {
                        obj.text = obj.name; // replace name with the property used for the text
                        return obj;
                    });

                    return {
                        results: fData,
                        pagination: {
                            more: (params.page * 10) < brands.total
                        }
                    };
                }
            }
        })


    </script>
@endpush
