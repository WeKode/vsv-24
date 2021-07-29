@extends('admin.layouts.auth-app')

@section('title',__('labels.login.login'))

@section('content')
    <div class="card-body">
        <p class="login-box-msg">{{__('labels.login.login-text')}}</p>
        @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <form action="{{route('admin.login')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="email" name="email" value="{{old('email')}}"
                       required
                       class="form-control @error('email') is-invalid @enderror" placeholder="{{__('labels.email')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required placeholder="{{__('labels.password')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            {{__('labels.login.remember_me')}}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">{{__('labels.login.login')}}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="{{route('admin.forgot.password.email')}}">{{__('labels.login.forgot-password')}}</a>
        </p>

    </div>
@endsection
