@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 rounded-0 shadow-sm px-3 px-lg-4">
                        <div class="card-body">
                            <h2 class="text-center text-capitalize py-2">{{__('actions.register-for-free')}}</h2>
                            <hr>
                            <form class="row justify-content-center" method="post" action="{{route('register')}}">
                                @csrf
                                <div class="col-12 px-0 mb-3">
                                    <label for="email" class="form-label">{{__('labels.email')}} <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control py-3 @error('email') is-invalid @enderror" id="email" placeholder="{{__('labels.email')}} " aria-describedby="emailHelp">
                                    @error('email')
                                    <div  class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 px-0 pe-lg-2 mb-3">
                                    <label for="password" class="form-label">{{__('labels.password')}} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror py-3" name="password" id="password" placeholder="{{__('labels.password')}} " aria-describedby="passwordHelp">
                                    @error('password')
                                    <div  class="invalid-feedback">{{$message}}</div>
                                    @enderror                                </div>
                                <div class="col-lg-6 px-0 ps-lg-2 mb-3">
                                    <label for="passwordConfirmation" class="form-label">{{__('labels.password-confirmation')}} <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control py-3" id="passwordConfirmation" name="password_confirmation" placeholder="{{__('labels.password-confirmation')}}" aria-describedby="passwordHelp">
                                </div>
                                <div class="col-lg-6 px-0 mt-3">
                                    <button type="submit" class="btn bg-blue text-light w-100 py-3 px-5">{{__('labels.register')}}</button>
                                </div>
                            </form>
                            <div class="position-relative text-center my-5">
                                <hr>
                                <span class="fw-bold px-2 bg-white position-absolute" style="transform: translate(-45%,-125%);">Or</span>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 px-0 pe-lg-2">
                                    <a href="{{ route('socialite.redirect','google') }}" class="btn bg-google text-light w-100 py-3"><i class="fab fa-google me-2"></i>{{ __('labels.login.google') }}</a>
                                </div>
                                <div class="col-lg-6 px-0 ps-lg-2 mt-3 mt-lg-0">
                                    <a href="{{ route('socialite.redirect','facebook') }}" class="btn bg-facebook text-light w-100 py-3"><i class="fab fa-facebook-f me-2"></i>{{ __('labels.login.facebook') }}</a>
                                </div>
                                <div class="col-12 my-4 text-center">
                                    {{__('labels.already-member')}} <a href="{{route('register')}}" class="text-decoration-none text-blue-lighten"><u>{{__('labels.login-now')}}</u></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
