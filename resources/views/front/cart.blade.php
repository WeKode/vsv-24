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
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <form action="{{route('cart.update')}}" method="post" id="update-cart">
                                            @csrf
                                            @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <a href="{{route('smartphones.show', $product->id)}}" class="text-decoration-none text-black text-capitalize">
                                                        {{$product->name}}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{$product->price}} $
                                                </td>
                                                <td>
                                                    <input type="number" name="{{$product->id}}"  id="qty" class="form-control rounded-0"
                                                           value="{{$product->pivot->qte}}" style="width: 90px;" min="1">
                                                </td>
                                                <td>{{$product->price * $product->pivot->qte}} $</td>
                                                <td>
                                                    <a href="{{route('cart.delete.product', $product->id)}}" class="text-decoration-none text-black">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5">
                                                    <h4 class="text-end">
                                                        Total : {{$total}} $
                                                    </h4>
                                                </td>
                                            </tr>
                                            <button  class="btn bg-warning fw-bold mb-3"
                                            >
                                                <i class="fas fa-sync-alt me-2"></i> Update cart
                                            </button>
                                        </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-end">

                                <a href="{{route('cart-confirmation.index')}}" class="btn bg-warning fw-bold py-3" style="width: 150px;">
                                    Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
