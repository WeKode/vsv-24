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
{{--                            <li class="breadcrumb-item"><a--}}
{{--                                    href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>--}}
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
        <section class="container-fluid">

            <!-- Default box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{__('actions.create')}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="type">{{__('labels.type')}}</label>
                                <select class="form-control @error('type') is-invalid @enderror"
                                        required name="type" id="type" data-placeholder="{{__('labels.type')}}">
                                    <option value="0" >------{{__('labels.type')}}--------</option>

                                    <option value="1" {{old('type') == 1 ? 'selected' : ''}}>{{__('labels.smartphone')}}</option>
                                    <option value="2" {{old('type') == 2 ? 'selected' : ''}}>{{__('labels.phone-plan')}}</option>
                                    <option value="3" {{old('type') == 3 ? 'selected' : ''}}>{{__('labels.energy-plan')}}</option>
                                </select>
                                @error('type')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="name">{{__('labels.name')}}</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       required name="name" value="{{old('name')}}"
                                       id="name" placeholder="{{__('labels.name')}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="price">{{__('labels.price')}}</label>
                                <input type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       required name="price" value="{{old('price')}}"
                                       id="price" placeholder="{{__('labels.price')}}">
                                @error('price')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="old_price">{{__('labels.old_price')}}</label>
                                <input type="text"
                                       class="form-control @error('old_price') is-invalid @enderror"
                                       required name="old_price" value="{{old('old_price')}}"
                                       id="old_price" placeholder="{{__('labels.old_price')}}">
                                @error('old_price')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label>{{__('available')}}</label>
                                <select class=" form-control @error('is_available') is-invalid @enderror"
                                        name="is_available" data-placeholder="{{__('available')}}"
                                        style="width: 100%;">
                                    <option value="1" {{old('is_available') == 1 ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{old('is_available') == 0 ? 'selected' : ''}}>No</option>
                                </select>
                                @error('is_available')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
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

                            <div class="col-lg-6 mb-3">
                                <label>{{trans_choice('labels.brand',1)}}</label>
                                <select class="select2 form-control @error('brand_id') is-invalid @enderror"
                                        name="brand_id" data-placeholder="{{trans_choice('labels.brand',1)}}"
                                        style="width: 100%;">
                                </select>
                                @error('brand_id')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="description">{{__('labels.description')}}</label>
                                <textarea name="description" id="description" >{{old('short_description')}}</textarea>
                                @error('description')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            @foreach($attributes as $attribute)
                                <div class="col-lg-4 {{$attribute->type_name}} d-none">
                                    <label for="values">{{$attribute->name}}</label>
                                    <select class="form-control  @error('values') is-invalid @enderror {{$attribute->type_name}}-input"
                                            name="values[]" id="values" data-placeholder="{{__('labels.value')}}">
                                        @foreach($attribute->values as $value)
                                            <option value="{{$value->id}}"
                                                {{in_array($value->id, old('values') ?? []) ? 'selected' : ''}}>{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('values')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{__('labels.submit')}}</button>
                        </div>

                    </div>
                </form>
            </div>
            <!-- /.card -->

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
        $( document ).ready(function (){


            var type = {{old('type')}}
            if (type === 1)
            {
                $('.smartphone').removeClass('d-none')
                $('.smartphone-input').prop("disabled", false)

                $('.mobile-service').addClass('d-none')
                $('.mobile-service-input').prop("disabled", true)

                $('.energy-service').addClass('d-none')
                $('.energy-service-input').prop("disabled", true)
            }else if(type === 2)
            {
                $('.smartphone').addClass('d-none')
                $('.smartphone-input').prop("disabled", true)

                $('.mobile-service').removeClass('d-none')
                $('.mobile-service-input').prop("disabled", false)

                $('.energy-service').addClass('d-none')
                $('.energy-service-input').prop("disabled", true)
            }else if(type === 3)
            {
                $('.smartphone').addClass('d-none')
                $('.smartphone-input').prop("disabled", true)

                $('.mobile-service').addClass('d-none')
                $('.mobile-service-input').prop("disabled", true)

                $('.energy-service').removeClass('d-none')
                $('.energy-service-input').prop("disabled", false)

            }
        })
    </script>
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

    <script>
        $('#type').change(function (){
            if (this.value === '1')
            {
                $('.smartphone').removeClass('d-none')
                $('.smartphone-input').prop("disabled", false)

                $('.mobile-service').addClass('d-none')
                $('.mobile-service-input').prop("disabled", true)

                $('.energy-service').addClass('d-none')
                $('.energy-service-input').prop("disabled", true)
            }else if(this.value === '2')
            {
                $('.smartphone').addClass('d-none')
                $('.smartphone-input').prop("disabled", true)

                $('.mobile-service').removeClass('d-none')
                $('.mobile-service-input').prop("disabled", false)

                $('.energy-service').addClass('d-none')
                $('.energy-service-input').prop("disabled", true)
            }else if(this.value === '3')
            {
                $('.smartphone').addClass('d-none')
                $('.smartphone-input').prop("disabled", true)

                $('.mobile-service').addClass('d-none')
                $('.mobile-service-input').prop("disabled", true)

                $('.energy-service').removeClass('d-none')
                $('.energy-service-input').prop("disabled", false)
            }
        })
    </script>

@endpush
