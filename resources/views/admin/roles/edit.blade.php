@extends('admin.layouts.app')

@section('title',__('actions.edit-item',['name' => trans_choice('labels.role',1)]))

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
                        <h1>{{__('actions.create')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">{{ trans_choice('labels.role',3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.edit-item",['name' => trans_choice('labels.role',1)])}}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Default box -->
                <div class="card card-primary col-md-6">
                    <div class="card-header">
                        <h3 class="card-title">{{__('actions.edit')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('admin.roles.update',$role->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('labels.name')}}</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       required name="name" value="{{old('name',$role->name)}}"
                                       id="name" placeholder="{{__('labels.name')}}">
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>{{trans_choice('labels.permission',3)}}</label>
                                <select required class="select2 form-control @error('permissions') is-invalid @enderror" multiple="multiple" name="permissions[]" data-placeholder="{{trans_choice('labels.permission',3)}}" style="width: 100%;">
                                    @foreach($role->permissions as $p)
                                        <option value="{{$p->id}}" selected> {{$p->name}} </option>
                                    @endforeach
                                </select>
                                @error('permissions')
                                <div class="invalid-feedback">{{$message}}</div>
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


        </section>
        <!-- /.content -->
    </div>

@endsection

@push('js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

    <!-- Select2 -->
    <script>
        //Initialize Select2 Elements
        $('.select2').select2({
            minimumInputLength:2,
            cache:true,
            ajax: {
                delay: 250,
                url: '{{route('admin.roles.permissions.index')}}',
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
                processResults: function ({permissions}, params) {
                    params.page = params.page || 1;

                    let fData = $.map(permissions.data, function (obj) {
                        obj.text = obj.name; // replace name with the property used for the text
                        return obj;
                    });

                    return {
                        results: fData,
                        pagination: {
                            more: (params.page * 10) < permissions.total
                        }
                    };
                }
            }
        })


    </script>
@endpush
