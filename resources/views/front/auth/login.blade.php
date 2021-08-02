@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 rounded-0 shadow-sm px-3 px-lg-4">
                        <div class="card-body">
                            <h2 class="text-center text-capitalize py-2">Login to your account</h2>
                            <hr>
                            <form class="row justify-content-center" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="col-12 px-0 mb-3">
                                    <label for="email" class="form-label">{{__('labels.email-address')}} <span class="text-danger">*</span></label>
{{--                                    <input type="email" class="form-control py-3" id="email" placeholder="Email address" aria-describedby="emailHelp">--}}
                                    <x-input id="email" class="form-control py-3"
                                             type="email"
                                             name="email"
                                             placeholder="{{__('labels.email-address')}}"
                                             aria-describedby="emailHelp"
                                             required
                                    />
                                    @error('email')
                                    <div id="emailHelp" class="form-text">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-12 px-0 mb-3">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
{{--                                    <input type="password" class="form-control py-3" id="password" placeholder="Password" aria-describedby="passwordHelp">--}}
                                    <x-input id="password" class="form-control py-3"
                                             type="password"
                                             name="password"
                                             placeholder="{{__('labels.password')}}"
                                             aria-describedby="passwordHelp"
                                             required
                                    />
                                    @error('password')
                                    <div id="emailHelp" class="form-text">{{$message}}</div>
                                    @enderror                                </div>
                                <div class="col-12 mb-3 form-check ps-4">
                                    <input type="checkbox" class="form-check-input" id="stayConnected" name="remember">
                                    <label class="form-check-label" for="stayConnected">{{__('actions.stay-connected')}}</label>
                                </div>
                                <div class="col-lg-6 px-0 mt-3">
                                    <button type="submit" class="btn bg-blue text-light w-100 py-3 px-5">{{__('actions.login')}}</button>
                                </div>
                                <div class="col-12 mt-4 text-center">
                                    <a href="forgot_password.html" class="text-decoration-none text-blue-lighten"><u>Forgot Password ?</u></a>
                                </div>
                            </form>
                            <div class="position-relative text-center my-5">
                                <hr>
                                <span class="fw-bold px-2 bg-white position-absolute" style="transform: translate(-45%,-125%);">Or</span>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 px-0 pe-lg-2">
                                    <a href="{{ route('socialite.redirect','facebook') }}" class="btn bg-google text-light w-100 py-3"><i class="fab fa-google me-2"></i>{{ __('labels.login.google') }}</a>
                                </div>
                                <div class="col-lg-6 px-0 ps-lg-2 mt-3 mt-lg-0">
                                    <a href="{{ route('socialite.redirect','google') }}" class="btn bg-facebook text-light w-100 py-3"><i class="fab fa-facebook-f me-2"></i>{{ __('labels.login.facebook') }}</a>
                                </div>
                                <div class="col-12 my-4 text-center">
                                    {{__('labels.new-member')}} <a href="{{route('register')}}" class="text-decoration-none text-blue-lighten"><u>{{__('actions.register-for-free')}}</u></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
