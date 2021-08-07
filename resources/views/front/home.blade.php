@extends('front.layouts.app')

@section('content')
    <section class="py-5 bg-white">
        <div class="container">

            <h2 class="text-center text-capitalize">Compare smartphones prices</h2>

            <div class="row d-flex mt-5">

                @foreach($smartphones as $s)
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <a href="{{route('smartphones.show',$s->id)}}" class="text-decoration-none">
                        <div class="card rounded-0 h-100">
                            <div class="row g-0">
                                <div class="col-4 image"
                                     style="background-image: url('{{asset($s->img_url)}}');"></div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <h6 class="text-secondary text-truncate mb-1">{{$s->brand->name}}</h6>
                                        <h4 class="text-black text-truncate">{{$s->name}}</h4>
                                        <div class="text-end mt-3 text-black">
                                            <span class="small">from</span> <span class="fw-bold">{{$s->price}} $</span>
                                        </div>
                                        <div class="text-end text-capitalize small text-secondary">
                                            Immediately available
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                @endforeach
            </div>

            <div class="mt-4 mt-lg-5 text-center">
                <a href="{{route('smartphones.index')}}" class="text-decoration-none text-blue-lighten">
                    <u>See all offers</u>
                </a>
            </div>

        </div>
    </section>

    <section class="py-5">
        <div class="container">

            <h2 class="text-center text-capitalize">Compare electricity prices</h2>

            <div class="row d-flex mt-5">
                @foreach($energies as $energy)

                <div class="col-lg-6 mb-3 mb-lg-0">
                    <a href="{{route('electricity_providers.show',$energy->id)}}" class="text-decoration-none">
                        <div class="card rounded-0 h-100">
                            <div class="row g-0">
                                <div class="col-6 image"
                                     style="background-image: url('{{asset($energy->img_url)}}');"></div>
                                <div class="col-6">
                                    <div class="card-body">

                                        <h4 class="text-black text-capitalize text-truncate mb-2">{{$energy->brand->name}}</h4>
                                        <h6 class="text-secondary text-truncate mb-1">{{$energy->name}}</h6>
                                        <h6 class="text-secondary text-truncate">{{$energy->description}}</h6>
                                        <div class="text-end mt-3 text-black">
                                            <span class="small">From :</span> <span class="fw-bold">{{$energy->price}} $</span>
                                        </div>
                                        <div class="text-end text-secondary">
                                            ø Per Month
                                        </div>
                                        <div class="text-end text-capitalize small text-secondary">
                                            You will save : 34,44 $
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <div class="mt-4 mt-lg-5 text-center">
                <a href="{{route('electricity_providers.index')}}" class="text-decoration-none text-blue-lighten">
                    <u>See all offers</u>
                </a>
            </div>

        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">

            <h2 class="text-center text-capitalize">Compare sim cards prices</h2>

            <div class="row d-flex mt-5">
                @foreach($sims as $sim)

                <div class="col-lg-4 mb-3 mb-lg-0">
                    <a href="{{route('sim_offers.show',$sim->id)}}" class="text-decoration-none">
                        <div class="card rounded-0 h-100">
                            <div class="row g-0">
                                <div class="col-5 d-flex align-items-center justify-content-center bg-warning p-1">
                                    <div class="text-center text-light">
                                        <h2 class="mb-0">{{$sim->data}}</h2>
                                        <div class="small">
                                            Data Volume
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="card-body">
                                        <h6 class="text-secondary text-truncate mb-1">{{$sim->brand->name}}</h6>
                                        <h4 class="text-black text-truncate">{{$sim->name}}</h4>
                                        <div class="text-end mt-3 text-black">
                                            <span class="small">from</span> <span class="fw-bold">{{$sim->price}} $</span>
                                        </div>
                                        <div class="text-end text-capitalize small text-secondary">
                                            {{$sim->e_sim}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach


            </div>

            <div class="mt-4 mt-lg-5 text-center">
                <a href="{{route('sim_offers.index')}}" class="text-decoration-none text-blue-lighten">
                    <u>See all offers</u>
                </a>
            </div>

        </div>
    </section>
@endsection
