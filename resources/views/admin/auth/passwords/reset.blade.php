@extends('admin.layouts.auth-app')

@section('title',__('labels.login.forgot-password'))

@section('content')
<div class="card-body">
    <p class="login-box-msg">{{__('labels.login.forgot-text')}}</p>

    <form action="{{route('admin.reset')}}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{$token}}" >
        <input type="hidden" name="email" value="{{$email}}" >
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

        <div class="input-group mb-3">
            <input type="password" class="form-control"
                   name="password_confirmation" required placeholder="{{__('labels.password-confirmation')}}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

    </form>
    <!-- /.social-auth-links -->

    <p class="mb-1">
        <a href="{{route('admin.login')}}">{{__('labels.login.login')}}</a>
    </p>

</div>
@endsection
