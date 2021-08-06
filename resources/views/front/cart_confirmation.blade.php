@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 rounded-0 shadow-sm px-3 px-lg-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 px-3 px-lg-0">
                                    <h2 class="text-capitalize py-2">My Cart</h2>
                                    <hr>
                                </div>
                                <div class="table-responsive mt-4">
                                    <table class="table table-stripped align-middle">
                                        <thead class="bg-blue text-white">
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <form action="" method="post" id="update-cart">
                                            @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <a href="" class="text-decoration-none text-black text-capitalize">
                                                        {{$product->name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{$product->price}} $
                                                </td>
                                                <td>
                                                    {{$product->pivot->qte}}
                                                </td>
                                                <td>{{$product->price * $product->pivot->qte}} $</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="4">
                                                    <h4 class="text-end">
                                                        Total : {{$total}} $
                                                    </h4>
                                                </td>
                                            </tr>
                                        </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="{{route('cart.index')}}" class="btn bg-warning fw-bold py-3" style="width: 150px;">
                                    Edit Cart
                                </a>
                            </div>
                            <form class="row" method="post" action="{{route('cart-confirmation.store')}}">
                                @csrf
                                <div class="col-12 px-3 px-lg-0">
                                    <h2 class="text-capitalize py-2">Shipping informations</h2>
                                    <hr>
                                </div>
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
                                    <a href="{{route('cart.index')}}" class="btn bg-blue text-light py-3" style="width: 150px;">Back</a>
                                    <button type="submit" class="btn bg-blue text-light py-3" style="width: 150px;">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
