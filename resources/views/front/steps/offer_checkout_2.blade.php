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
                            <div class="card border-0 rounded shadow-sm bg-blue text-light fw-bold">
                                <div class="card-body">
                                    <i class="fas fa-check-circle me-2"></i>Step 1
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-center mb-3">
                            <div class="card border-0 rounded shadow-sm bg-warning fw-bold">
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
                        <form class="row" action="{{route('offer-checkout.store2')}}" method="post">
                            @csrf
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="address" class="form-label @error('address') is-invalid @enderror">Address</label>
                                <input type="text" name="address" class="form-control py-3" value="{{old('address', auth()->user()->address)}}" id="address" placeholder="Address">
                                @error('address')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="city" class="form-label @error('city') is-invalid @enderror">City</label>
                                <input type="text" name="city" class="form-control py-3" value="{{old('city', auth()->user()->city)}}" id="city" placeholder="City">
                                @error('city')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="zip_code" class="form-label @error('zip_code') is-invalid @enderror">Zip code</label>
                                <input type="text" name="zip_code" class="form-control py-3" value="{{old('zip_code', auth()->user()->zip_code)}}" id="zip_code" placeholder="Zip code">
                                @error('zip_code')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <label for="country" class="form-label @error('country') is-invalid @enderror">Country</label>
                                <input type="text" name="country" class="form-control py-3" value="{{old('country', auth()->user()->country)}}" id="country" placeholder="Country">
                                @error('country')
                                <div class="form-text text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12 px-0">
                                <hr>
                            </div>
                            <div class="col-12 px-0 py-3 text-end">
                                <a href="{{route('offer-checkout.index1')}}" class="btn bg-blue text-light py-3" style="width: 150px;">Back</a>
                                <button type="submit" class="btn bg-blue text-light py-3" style="width: 150px;">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
