@extends('admin.layouts.app')

@section('title',__('actions.add-new',['name' => trans_choice('labels.product',1)]))


@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{__('messages.create')}}</h1>
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
                <div class="card card-primary col-md-10">
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
                                <label for="images">{{__('labels.images')}}</label>
                                <input type="file"
                                       class="form-control @error('images') is-invalid @enderror"
                                       required name="images[]"
                                       id="images" placeholder="{{__('labels.images')}}"
                                       multiple>
                                @error('images')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{__('labels.submit')}}</button>
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

@endpush