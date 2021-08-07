@extends('admin.layouts.app')

@section('title',__('actions.add-new',['name' => trans_choice('labels.admin',1)]))


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
{{--                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>--}}
                            <li class="breadcrumb-item"><a href="{{route('admin.admins.index')}}">{{ trans_choice('labels.admin',3)}}</a></li>
                            <li class="breadcrumb-item active">{{__("actions.add-new",['name' => trans_choice('labels.admin',1)])}}</li>
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
                        <h3 class="card-title">{{__('actions.create')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('admin.admins.store')}}">
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
                                <label for="email">{{__('labels.email')}}</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       required name="email" value="{{old('email')}}"
                                       id="email" placeholder="{{__('labels.email')}}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="password">{{__('labels.password')}}</label>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       required name="password" value="{{old('password')}}"
                                       id="password" placeholder="{{__('labels.password')}}">
                                @error('password')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">{{__('labels.password-confirmation')}}</label>
                                <input type="password"
                                       class="form-control"
                                       required name="password_confirmation" value="{{old('password_confirmation')}}"
                                       id="password_confirmation" placeholder="{{__('labels.password-confirmation')}}">
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
{{--    <script>--}}
{{--        //Initialize Select2 Elements--}}
{{--        $('.select2').select2({--}}
{{--            minimumInputLength:0,--}}
{{--            cache:true,--}}
{{--            ajax: {--}}
{{--                delay: 250,--}}
{{--                url: '{{route('admin.roles.index')}}',--}}
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


    </script>
@endpush
