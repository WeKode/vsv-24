@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 rounded-0 shadow-sm px-3 px-lg-4">
                        <div class="card-body">
                            <h2 class="text-center text-capitalize py-2">Forgot password</h2>
                            <hr>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form class="row justify-content-center" action="{{ route('forgot.password.send') }}" method="post">
                                @csrf
                                <div class="col-12 px-0 mb-3">
                                    <label for="email" class="form-label">Email address <span
                                            class="text-danger">*</span></label>
                                    <x-input id="email" class="form-control py-3" type="email" name="email"
                                             :value="old('email')" placeholder="{{__('labels.email-address')}}" required autofocus />

                                    <div id="emailHelp" class="form-text">Enter the email address associated to your
                                        account.
                                    </div>
                                </div>
                                <div class="col-lg-6 px-0 mt-3">
                                    <button type="submit" class="btn bg-blue text-light w-100 py-3 px-5">Send
                                        recuperation link
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
