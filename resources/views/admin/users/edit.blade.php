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
                        <h1>{{__('actions.update')}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__("labels.dashboard")}}</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">{{trans_choice("labels.user",3)}}</a></li>
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
                    <form method="post" action="{{route('admin.users.update',$user->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">{{__('labels.first_name')}}</label>
                                <input type="text"
                                       class="form-control @error('first_name') is-invalid @enderror"
                                       required name="first_name" value="{{old('first_name',$user->first_name)}}"
                                       id="first_name" placeholder="{{__('labels.first_name')}}">
                                @error('first_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">{{__('labels.last_name')}}</label>
                                <input type="text"
                                       class="form-control @error('last_name') is-invalid @enderror"
                                       required name="last_name" value="{{old('last_name',$user->last_name)}}"
                                       id="last_name" placeholder="{{__('labels.last_name')}}">
                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="address">{{__('labels.address')}}</label>
                                <input type="text"
                                       class="form-control @error('address') is-invalid @enderror"
                                       required name="address" value="{{old('address',$user->address)}}"
                                       id="address" placeholder="{{__('labels.address')}}">
                                @error('address')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="country">{{__('labels.country')}}</label>
                                <input type="text"
                                       class="form-control @error('country') is-invalid @enderror"
                                       required name="country" value="{{old('country',$user->country)}}"
                                       id="country" placeholder="{{__('labels.country')}}">
                                @error('country')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="city">{{trans_choice('labels.city', 1)}}</label>
                                <input type="text"
                                       class="form-control @error('city') is-invalid @enderror"
                                       required name="city" value="{{old('city',$user->city)}}"
                                       id="city" placeholder="{{trans_choice('labels.city', 1)}}">
                                @error('city')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="zip_code">{{__('labels.zip_code')}}</label>
                                <input type="text"
                                       class="form-control @error('zip_code') is-invalid @enderror"
                                       required name="zip_code" value="{{old('zip_code',$user->zip_code)}}"
                                       id="zip_code" placeholder="{{__('labels.zip_code')}}">
                                @error('zip_code')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">{{__('labels.phone')}}</label>
                                <input type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       required name="phone" value="{{old('phone',$user->phone)}}"
                                       id="phone" placeholder="{{__('labels.phone')}}">
                                @error('phone')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="birth_date">{{__('labels.birth_date')}}</label>
                                <input type="date"
                                       class="form-control @error('birth_date') is-invalid @enderror"
                                       required name="birth_date" value="{{old('birth_date',$user->birth_date)}}"
                                       id="birth_date" placeholder="{{__('labels.birth_date')}}">
                                @error('birth_date')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender">{{__('labels.gender')}}</label>
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="male" {{old('gender',$user->gender) == 'male' ? 'selected' : ''}}>Male</option>
                                    <option value="female" {{old('gender',$user->gender) == 'female' ? 'selected' : ''}}>Female</option>
                                </select>
                                @error('gender')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{__('labels.email')}}</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       required name="email" value="{{old('email',$user->email)}}"
                                       id="email" placeholder="{{__('labels.email')}}">
                                @error('email')
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

    <!-- Select2 -->
{{--    <script>--}}
{{--        //Initialize Select2 Elements--}}
{{--        $('.select2').select2({--}}
{{--            minimumInputLength:0,--}}
{{--            cache:true,--}}
{{--            ajax: {--}}
{{--                delay: 250,--}}
{{--                url: '{{route('user.roles.index')}}',--}}
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
@endpush
