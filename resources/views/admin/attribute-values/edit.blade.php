@extends('admin.layouts.app')

@section('title',__('actions.edit-item',['name' => trans_choice('labels.value',1)]))

@push('css')

    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

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
                            <li class="breadcrumb-item"><a href="{{route('admin.attribute-values.index')}}">{{trans_choice("labels.value",3)}}</a></li>
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
                    <form method="post" action="{{route('admin.attribute-values.update',$attribute_value->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('labels.name')}}</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       required name="name" value="{{old('name',$attribute_value->name)}}"
                                       id="name" placeholder="{{__('labels.name')}}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="attributes">{{trans_choice('labels.attribute',1)}}</label>
                                <select name="attribute_id"
                                        class="form-control select2 @error('attribute_id') is-invalid @enderror"
                                        id="attributes">
                                    <option value="{{$attribute_value->attribute->id}}" selected>{{$attribute_value->attribute->name}}</option>
                                </select>
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
                <!-- /.card -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection

@push('js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <script>
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

                    return {
                        results: fData,
                        pagination: {
                            more: (params.page * 10) < attributes.total
                        }
                    };
                }
            }
        });
    </script>

@endpush
