@extends('admin.layouts.auth-app')

@section('title',__('labels.login.forgot-password'))

@section('content')
    <div class="card-body">
        <p class="login-box-msg">{{__('labels.login.forgot-text')}}</p>
        @if(session()->has('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <form action="{{route('admin.forgot.password.send')}}" method="post">
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

        </form>
        <!-- /.social-auth-links -->

        <p class="mb-1">
            <a href="{{route('admin.login')}}">{{__('labels.login.login')}}</a>
        </p>

    </div>
@endsection
