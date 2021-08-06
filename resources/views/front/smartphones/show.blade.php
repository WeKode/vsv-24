@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container-fluid px-3 px-lg-5">

            <div class="row justify-content-between">
                <div class="col-auto">
                    <div class="mb-0">
                        <a href="{{route('home')}}" class="text-decoration-none text-black">Home</a>
                        <span class="mx-2">/</span>
                        <a href="{{route('smartphones.index')}}" class="text-decoration-none text-black">Smartphones</a>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <div class="row justify-content-center">

                <div class="col-lg-4">
                    <div class="ratio ratio-1x1 image"
                         style="background-image: url('{{asset($product->img_url)}}');"></div>
                </div>

                <div class="col-lg-5 mt-3 mt-lg-0">
                    <h6 class="text-capitalize">{{$product->brand->name}}</h6>
                    <h4 class="text-capitalize">
                        {{$product->name}}
                    </h4>
                    <div class="mt-3">
                        <span class="badge border border-danger text-danger fw-normal">{{$product->brand->name}}</span>
                        @if($product->os != 'Not specified')
                            <span class="badge border border-danger text-danger fw-normal">{{$product->os}}</span>
                        @endif
                        <span class="badge border border-danger text-danger fw-normal">{{$product->ram}}</span>
                        @if($product->display != 'Not specified')
                        <span class="badge border border-danger text-danger fw-normal">{{$product->display}}</span>
                        @endif

                    </div>
                    <h3 class="mt-3">
                        <span class="text-black">{{$product->price}} $</span>
                        @if($product->old_price)
                            - <span class="line-through text-secondary fw-normal">{{$product->old_price}} $</span>
                        @endif
                    </h3>
                    <div class="text-black">
                        @if($product->old_price)
                            <span
                                class="bg-danger text-light px-1 py-1 small rounded me-2">-{{$product->promotion}}%</span>
                        @endif
                        <span class="small">33 offers</span>
                    </div>
                    brand os ram display
                    <ul class="mt-4">
                        <li>Display: {{$product->display}}</li>
                        <li>Resolution: {{$product->resolution}}</li>
                        <li>Camera: {{$product->camera}}</li>
                        <li>RAM: {{$product->ram}}</li>
                        <li>Battery: {{$product->battery}}</li>
                    </ul>
                    <div>{{$product->description}}</div>
                    <div class="small mt-3">
                        <a href="#details" class="text-decoration-none text-secondary">
                            More product details
                        </a>
                    </div>
                    <div class="small">
                        <a href="#compare" class="text-decoration-none text-secondary">
                            Compare with similar products
                        </a>
                    </div>
                    <div class="text-end">
                        <a href="{{route('cart.add.product', $product->id)}}"
                           class="btn bg-blue text-light px-5 py-3 text-capitalize">add to cart<i
                                class="fas fa-shopping-cart ms-2"></i></a>
                    </div>
                </div>
            </div>

            <h3 id="compare" class="text-center text-lg-start text-capitalize my-5">Compare smartphones prices</h3>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive small">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td></td>
                                @foreach($comp_products as $cp)
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image"
                                             style="background-image: url('{{asset($cp->img_url)}}');"></div>
                                        <div class="my-2 text-black">
                                            {{$cp->name}}
                                        </div>
                                    </a>
                                </td>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Price excluding shipping</th>
                                @foreach($comp_products as $cp)
                                <td>{{$cp->price}} $</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Product type</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->type}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Battery technology</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->battery}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Colour</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->colour}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Bluetooth</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->bluetooth}}</td>
                                @endforeach
                            </tr>
{{--                            <tr>--}}
{{--                                <th scope="row">Wireless Internet Access</th>--}}
{{--                                @foreach($comp_products as $cp)--}}
{{--                                    <td>{{$cp->display}}</td>--}}
{{--                                @endforeach--}}
{{--                            </tr>--}}
                            <tr>
                                <th scope="row">Screen Size Inch</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->display}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Internal memory in GB</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->rom}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Operating system version</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->os}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Main camera resolution in megapixels</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->camera}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">SIM card format</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->sim}}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h3 id="details" class="text-center text-lg-start text-capitalize my-5">Product details</h3>

            <div class="row">

                <div class="col-lg-6">

                    <div class="table-responsive small">
                        <table class="table table-striped caption-top">
                            <caption class="mb-2 text-black fw-bold">General characteristics</caption>
                            <tbody>
                            <tr>
                                <td>Product type:
                                </th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>RAM:
                                </th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Internal storage:
                                </th>
                                <td>128 GB</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive small">
                        <table class="table table-striped caption-top">
                            <caption class="mb-2 text-black fw-bold">General characteristics</caption>
                            <tbody>
                            <tr>
                                <td>Product type:
                                </th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>RAM:
                                </th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Internal storage:
                                </th>
                                <td>128 GB</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="table-responsive small">
                        <table class="table table-striped caption-top">
                            <caption class="mb-2 text-black fw-bold">General characteristics</caption>
                            <tbody>
                            <tr>
                                <td>Product type:
                                </th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>RAM:
                                </th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Internal storage:
                                </th>
                                <td>128 GB</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive small">
                        <table class="table table-striped caption-top">
                            <caption class="mb-2 text-black fw-bold">General characteristics</caption>
                            <tbody>
                            <tr>
                                <td>Product type:
                                </th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>RAM:
                                </th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Internal storage:
                                </th>
                                <td>128 GB</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <h3 class="text-center text-lg-start text-capitalize my-5">Similar products</h3>

            <div class="row">
                @foreach($latest_products as $latest_product)
                <div class="col-lg-3 mb-4">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="card rounded-0">
                            <div class="image"
                                 style="background: url('{{asset($latest_product->img_url)}}');height: 250px;"></div>
                            <div class="card-body">
                                <div class="card-text">
                                    <div class="text-truncate text-black mb-2">
                                        {{$latest_product->name}}
                                    </div>
                                    <div class="text-black">
                                        @if($latest_product->old_price)
                                        <span class="bg-danger text-light px-1 py-1 small rounded me-2">-{{$latest_product->promotion}}%</span>
                                        @endif
                                        <span class="small">33 offers</span>
                                    </div>
                                    <h6 class="text-truncate mt-2">
                                        <span class="text-black">{{$latest_product->price}} $</span>
                                        @if($latest_product->old_price)
                                        - <span
                                            class="line-through text-secondary fw-normal">{{$latest_product->old_price}} $</span>
                                        @endif
                                    </h6>
                                    <div class="text-secondary small">
                                        Free shipping
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection
