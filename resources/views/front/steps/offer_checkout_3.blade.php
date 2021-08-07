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
                            <div class="card border-0 rounded shadow-sm bg-blue text-light fw-bold">
                                <div class="card-body">
                                    <i class="fas fa-check-circle me-2"></i>Step 2
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-center mb-3">
                            <div class="card border-0 rounded shadow-sm bg-warning fw-bold">
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
                        <div class="row">
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <div class="text-secondary small mb-1">First name</div>
                                <div>{{$data['first_name'] ?? ''}}</div>

                            </div>
                            <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                <div class="text-secondary small mb-1">Last name</div>
                                <div>{{$data['last_name'] ?? ''}}</div>
                            </div>

                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <div class="text-secondary small mb-1">Gender</div>
                                <div>{{$data['gender'] ?? ''}}</div>
                            </div>

                            <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                <div class="text-secondary small mb-1">Birth date</div>
                                <div>{{$data['birth_date'] ?? ''}}</div>
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <div class="text-secondary small mb-1">Phone number</div>
                                <div>{{$data['phone'] ?? ''}}</div>
                            </div>
                            <div class="col-lg-6 ps-lg-2 px-0 mb-3">
                                <div class="text-secondary small mb-1">Email address</div>
                                <div>{{$data['email'] ?? ''}}</div>
                            </div>
                            <div class="col-lg-6 pe-lg-2 px-0 mb-3">
                                <div class="text-secondary small mb-1"> address</div>
                                <div>{{$data['address'] ?? ''}}, {{$data['zip_code'] ?? ''}}, {{$data['country'] ?? ''}}.</div>
                            </div>
                            <div class="col-12 px-0">
                                <hr>
                            </div>
                            <div class="col-12 px-0 py-3 text-end">
                                <a href="{{route('offer-checkout.index2')}}" class="btn bg-blue text-light py-3" style="width: 150px;">Back</a>
                                <a href="{{route('offer-checkout.store3')}}" class="btn bg-blue text-light py-3" style="width: 150px;">Confirm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

