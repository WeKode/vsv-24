@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 rounded-0 shadow-sm px-3 px-lg-4">
                        <div class="card-body">
                            <h2 class="text-center text-capitalize py-2">Reset password</h2>
                            <hr>
                            <form class="row justify-content-center" method="POST" action="{{ route('reset') }}">
                                @csrf
                                <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="col-12 px-0 mb-3">
                                    <label for="email" class="form-label">Email address <span
                                            class="text-danger">*</span></label>
                                    <x-input id="email" class="form-control py-3" placeholder="Email address"
                                             type="email" name="email" :value="old('email')" required autofocus
                                             aria-describedby="emailHelp"/>
                                    <div id="emailHelp" class="form-text">Enter the email address associated to your
                                        account.
                                    </div>
                                </div>
                                <div class="col-lg-6 px-0 pe-lg-2 mb-3">
                                    <label for="password" class="form-label">New password <span
                                            class="text-danger">*</span></label>
                                    <x-input id="password" class="form-control py-3" type="password"
                                             name="password" required aria-describedby="passwordHelp"
                                             placeholder="New password"/>
                                    @error('password')
                                    <div id="passwordHelp" class="form-text">Errors.</div>
                                    @enderror                                </div>
                                <div class="col-lg-6 px-0 ps-lg-2 mb-3">
                                    <label for="password_confirmation" class="form-label">New password confirmation
                                        <span class="text-danger">*</span></label>
                                    <x-input id="password_confirmation" class="form-control py-3" type="password"
                                             name="password_confirmation" required aria-describedby="passwordHelp"
                                             placeholder="ew password confirmation"/>
                                </div>
                                <div class="col-lg-6 px-0 mt-3">
                                    <button type="submit" class="btn bg-blue text-light w-100 py-3 px-5">Save new
                                        password
                                    </button>
                                </div>
                                <div class="col-12 my-4 text-center">
                                    <a href="{{route('login')}}" class="text-decoration-none text-blue-lighten"><u>Back to
                                            login</u></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
