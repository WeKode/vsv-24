@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 px-3 px-lg-0">
                            <h2 class="text-capitalize py-2">Checkout</h2>
                            <hr>
                        </div>
                        <div class="col-4 text-center mb-3">
                            <div class="card border-0 rounded shadow-sm bg-warning fw-bold">
                                <div class="card-body">
                                    Step 1
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-center mb-3">
                            <div class="card border-0 rounded-0 shadow-sm">
                                <div class="card-body">
                                    Step 2
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-center mb-3">
                            <div class="card border-0 rounded-0 shadow-sm">
                                <div class="card-body">
                                    Step 3
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form class="row" action="{{route('offer-checkout.store1')}}" method="post">
                            @csrf
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="first_name" class="form-label @error('first_name') is-invalid @enderror">First name</label>
                                <input type="text" name="first_name" class="form-control py-3" value="{{old('first_name', auth()->user()->first_name)}}" id="first_name" placeholder="First name">
                                @error('first_name')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="last_name" class="form-label @error('last_name') is-invalid @enderror">Last name</label>
                                <input type="text" name="last_name" class="form-control py-3" value="{{old('last_name', auth()->user()->last_name)}}" id="last_name" placeholder="Last name">
                                @error('last_name')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select type="text" name="gender" class="form-select py-3 @error('gender') is-invalid @enderror" id="gender">
                                    <option value="1" disabled selected>Select gender</option>
                                    <option value="male" {{old('gender', auth()->user()->gender) == 'male' ? 'selected' : ''}}>Male</option>
                                    <option value="female" {{old('gender', auth()->user()->gender) == 'female' ? 'selected' : ''}}>Female</option>
                                </select>
                                @error('gender')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="birth_date" class="form-label @error('birth_date') is-invalid @enderror">Birth date</label>
                                <input type="date" name="birth_date" class="form-control py-3" value="{{old('birth_date', auth()->user()->birth_date)}}" id="birth_date" placeholder="Birth date">
                                @error('birth_date')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="phone" class="form-label @error('phone') is-invalid @enderror">Phone number</label>
                                <input type="text" name="phone" class="form-control py-3" value="{{old('phone', auth()->user()->phone)}}" id="phone" placeholder="Phone number">
                                @error('phone')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                                <input type="email" name="email" class="form-control py-3" value="{{old('email', auth()->user()->email)}}" id="email" placeholder="email">
                                @error('email')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12 px-0">
                                <hr>
                            </div>
                            <div class="col-12 px-0 py-3 text-end">
                                <a href="{{route('home')}}" class="btn bg-blue text-light py-3" style="width: 150px;">Cancel</a>
                                <button type="submit" class="btn bg-blue text-light py-3" style="width: 150px;">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
