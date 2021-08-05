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
                                    <div class="text-secondary small mb-1">First name</div>
                                    <div>Mouatez</div>

                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">Last name</div>
                                    <div>Mouatez</div>
                                </div>

                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">Gender</div>
                                    <div>Male</div>
                                </div>

                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">Birth date</div>
                                    <div>09/09/1996</div>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">Phone number</div>
                                    <div>0555 33 22 11</div>
                                </div>
                                <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1">Email address</div>
                                    <div>khalfaoui.mouatez@gmail.com</div>
                                </div>
                                <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                    <div class="text-secondary small mb-1"> address</div>
                                    <div>100 lorem ipsum dolor, 25000, Algeria.</div>
                                </div>
                                <div class="col-12 px-0">
                                    <hr>
                                </div>
                                <div class="col-12 px-0 py-3 text-end">
                                    <a href="{{route('cart-confirmation.index')}}" class="btn bg-blue text-light py-3" style="width: 150px;">Back</a>
                                    <a href="{{route('checkout.confirm')}}" class="btn bg-blue text-light py-3" style="width: 150px;">Next</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
