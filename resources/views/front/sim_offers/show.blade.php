@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container-fluid px-3 px-lg-5">

            <div class="row justify-content-between">
                <div class="col-auto">
                    <div class="mb-0">
                        <a href="{{route('home')}}" class="text-decoration-none text-black">Home</a>
                        <span class="mx-2">/</span>
                        <a href="{{route('sim_offers.index')}}" class="text-decoration-none text-black">Sim Offers</a>
                    </div>
                </div>
            </div>

            <hr class="my-5">

            <div class="row justify-content-center">

                <div class="col-lg-2">
                    <div class="ratio ratio-1x1 image"
                         style="background-image: url('{{asset($product->img_url)}}');"></div>
                </div>

                <div class="col-lg-7 mt-3 mt-lg-0">
                    <h4 class="text-capitalize">
                        {{$product->name}}
                    </h4>
                    <div class="mt-3">
                        <span class="badge border border-danger text-danger fw-normal">{{$product->brand->name}}</span>
                        @if($product->data_volume != 'Not specified')
                            <span
                                class="badge border border-danger text-danger fw-normal">{{$product->data_volume}}</span>
                        @endif
                        @if($product->sim_card_option != 'Not specified')
                            <span
                                class="badge border border-danger text-danger fw-normal">{{$product->sim_card_option}}</span>
                        @endif
                    </div>
                    <h3 class="mt-3 mb-0">
                        <span class="text-black">price $</span>
                    </h3>
                    <h6 class="text-secondary">
                        per month
                    </h6>
                    <ul class="mt-4">
                        <li>Tariff: {{$product->price}}</li>
                        <li>Sim card options: {{$product->sim_card_options}}</li>
                        <li>Tariff type: {{$product->tariff_type}}</li>
                    </ul>
                    <div>{!!$product->description!!}</div>
                    <div class="small mt-3">
                        <a href="#compare" class="text-decoration-none text-secondary">
                            Compare with similar offers
                        </a>
                    </div>
                    <div class="text-end">
                        <a href="" class="btn bg-blue text-light px-5 py-3 text-capitalize">further</a>
                    </div>
                </div>
            </div>

            <h3 id="compare" class="text-center text-lg-start text-capitalize my-5">Compare sim offers prices</h3>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive small">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td></td>
                                @foreach($comp_products as $cp)
                                    <td>
                                        <a href="{{route('sim_offers.show', $cp->id)}}" class="text-decoration-none">
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
                                <th scope="row">Company</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->brand->name}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Tariff</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->price}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Number portability</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->number_portability}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Sim card options</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->sim_card_options}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Data speed</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->data_speed}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Tariff type</th>
                                @foreach($comp_products as $cp)
                                    <td>{{$cp->tariff_type}}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h3 id="compare" class="text-center text-lg-start text-capitalize my-5">Offer details</h3>

            <div class="row">

                <div class="col-lg-6">

                    <div class="table-responsive small">
                        <table class="table table-striped caption-top">
                            <caption class="mb-2 text-black fw-bold">General informations</caption>
                            <tbody>
                            @foreach($product->attribute_values->where('attribute.is_editable', false) as $ga)
                                <tr>
                                    <td>{{$ga->attribute->name}}:
                                    </th>
                                    <td>{{$ga->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="table-responsive small">
                        <table class="table table-striped caption-top">
                            <caption class="mb-2 text-black fw-bold">Other informations</caption>
                            <tbody>
                            @foreach($product->attribute_values->where('attribute.is_editable', true) as $sa)
                                <tr>
                                    <td>{{$sa->attribute->name}}:
                                    </th>
                                    <td>{{$sa->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <h3 class="text-center text-lg-start text-capitalize my-5">Similar offers</h3>

            <div class="row">
                @foreach($latest_products as $lp)
                    <div class="col-lg-4 mb-3">
                        <a href="{{route('sim_offers.show', $lp->id)}}" class="text-decoration-none">
                            <div class="card rounded-0 h-100">
                                <div class="row g-0">
                                    <div class="col-5 d-flex align-items-center justify-content-center bg-warning p-1">
                                        <div class="text-center text-light">
                                            <h2 class="mb-0">{{$lp->data_volume}}</h2>
                                            <div class="small">
                                                Data Volume
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="card-body">
                                            <h6 class="text-secondary text-truncate mb-1">{{$lp->brand->name}}</h6>
                                            <h4 class="text-black text-truncate">{{$lp->name}}</h4>
                                            <div class="text-end mt-3 text-black">
                                                <span class="small">from</span> <span class="fw-bold">{{$lp->price}} $</span>
                                            </div>
                                            <div class="text-end text-capitalize small text-secondary">
                                                {{$lp->sim_card_options}}
                                            </div>
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
