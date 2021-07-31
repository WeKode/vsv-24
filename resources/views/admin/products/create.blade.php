@extends('admin.layouts.app')

@section('title',__('actions.add-new',['name' => trans_choice('labels.product',1)]))


@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
@endpush


@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('actions.add-new',['name' => trans_choice('labels.product',1)])}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.products.index')}}">{{ trans_choice('labels.product',3)}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{__("actions.add-new",['name' => trans_choice('labels.product',1)])}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Default box -->
                <div class="card card-primary col-md-8">
                    <div class="card-header">
                        <h3 class="card-title">{{__('actions.create')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
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
                                <label for="short_description">{{__('labels.short_description')}}</label>
                                <textarea name="short_description"
                                          class="form-control @error('short_description') is-invalid @enderror"
                                          id="short_description" rows="4">{{old('short_description')}}</textarea>
                                @error('short_description')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">{{__('labels.price')}}</label>
                                <input type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       required name="price" value="{{old('price')}}"
                                       id="price" placeholder="{{__('labels.price')}}">
                                @error('price')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="images">{{trans_choice('labels.image',3)}}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('images') is-invalid @enderror"
                                               id="images" multiple
                                               required name="images[]">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                @error('images')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{__('brand')}}</label>
                                <select required class="select2 form-control @error('brand_id') is-invalid @enderror"
                                        name="brand_id" data-placeholder="{{__('brand')}}"
                                        style="width: 100%;">
                                </select>
                                @error('brand_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{__('labels.description')}}</label>
                                <textarea name="description" id="description" >{{old('short_description')}}</textarea>
                                @error('description')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{__('labels.submit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>


        </section>
        <!-- /.content -->
    </div>

@endsection

@push('js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>

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
