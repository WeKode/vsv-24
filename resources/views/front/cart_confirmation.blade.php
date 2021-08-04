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
                            <form class="row">
                                <div class="col-12 px-3 px-lg-0">
                                    <h2 class="text-capitalize py-2">Shipping informations</h2>
                                    <hr>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <label for="first_name" class="form-label">First name</label>
                                    <input type="text" class="form-control py-3" id="first_name" placeholder="First name">
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <label for="last_name" class="form-label">Last name</label>
                                    <input type="text" class="form-control py-3" id="first_name" placeholder="Last name">
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select type="text" class="form-select py-3" id="gender">
                                        <option value="1" disabled selected>Select gender</option>
                                        <option value="2">Male</option>
                                        <option value="3">Female</option>
                                    </select>
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <label for="date" class="form-label">Birth Date</label>
                                    <input type="date" class="form-control py-3" id="date">
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <label for="phone" class="form-label">Phone number</label>
                                    <input type="text" class="form-control py-3" id="phone" placeholder="Phone number">
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control py-3" id="email" placeholder="Email address">
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control py-3" id="address" placeholder="Address">
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-lg-3 ps-lg-2 px-0 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <select type="text" class="form-select py-3" id="city">
                                        <option value="1" disabled selected>Select city</option>
                                    </select>
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-lg-3 ps-lg-2 px-0 mb-3">
                                    <label for="zip_code" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control py-3" id="email" placeholder="Zip code">
                                    <div class="form-text text-danger">Errors goes here.</div>
                                </div>
                                <div class="col-12 px-0">
                                    <hr>
                                </div>
                                <div class="col-12 px-0 py-3 text-end">
                                    <a href="{{route('cart.index')}}" class="btn bg-blue text-light py-3" style="width: 150px;">Back</a>
                                    <a href="javascript:void(0)" class="btn bg-blue text-light py-3" style="width: 150px;">Next</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
