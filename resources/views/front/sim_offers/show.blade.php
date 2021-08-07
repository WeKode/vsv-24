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
                    <div class="ratio ratio-1x1 image" style="background-image: url('{{asset($product->img_url)}}');"></div>
                </div>

                <div class="col-lg-7 mt-3 mt-lg-0">
                    <h4 class="text-capitalize">
                        {{$product->name}}
                    </h4>
                    <div class="mt-3">
                        <span class="badge border border-danger text-danger fw-normal">Brand</span>
                        <span class="badge border border-danger text-danger fw-normal">Data volume</span>
                        <span class="badge border border-danger text-danger fw-normal">Esim or triple sim</span>
                    </div>
                    <h3 class="mt-3 mb-0">
                        <span class="text-black">price $</span>
                    </h3>
                    <h6 class="text-secondary">
                        per month
                    </h6>
                    <ul class="mt-4">
                        <li>Tariff: price $ per month</li>
                        <li>Sim card options: E-sim or triple sim</li>
                        <li>Use: Private</li>
                        <li>Tariff type: contract</li>
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
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            name image and link
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            name image and link
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            name image and link
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            name image and link
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            name image and link
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            name image and link
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Company</th>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                            </tr>
                            <tr>
                                <th scope="row">Tariff</th>
                                <td>monthly</td>
                                <td>monthly</td>
                                <td>monthly</td>
                                <td>monthly</td>
                                <td>monthly</td>
                                <td>monthly</td>
                            </tr>
                            <tr>
                                <th scope="row">Number portability</th>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                            </tr>
                            <tr>
                                <th scope="row">Sim card options</th>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                            </tr>
                            <tr>
                                <th scope="row">Data speed</th>
                                <td>24 Months</td>
                                <td>24 Months</td>
                                <td>24 Months</td>
                                <td>24 Months</td>
                                <td>24 Months</td>
                                <td>24 Months</td>
                            </tr>
                            <tr>
                                <th scope="row">Tariff type</th>
                                <td>12 Months</td>
                                <td>12 Months</td>
                                <td>12 Months</td>
                                <td>12 Months</td>
                                <td>12 Months</td>
                                <td>12 Months</td>
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
                            <tr>
                                <td>Company:</th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>Tariff:</th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Number portability:</th>
                                <td>128 GB</td>
                            </tr>
                            <tr>
                                <td>Sim card options:</th>
                                <td>Sim card options</td>
                            </tr>
                            <tr>
                                <td>Data speed:</th>
                                <td>Sim card options</td>
                            </tr>
                            <tr>
                                <td>Tariff type:</th>
                                <td>3 GB</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="table-responsive small">
                        <table class="table table-striped caption-top">
                            <caption class="mb-2 text-black fw-bold">Other informations</caption>
                            <tbody>
                            <tr>
                                <td>Attribute:</th>
                                <td>value</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <h3 class="text-center text-lg-start text-capitalize my-5">Similar offers</h3>

            <div class="row">

                <div class="col-lg-4 mb-3">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="card rounded-0 h-100">
                            <div class="row g-0">
                                <div class="col-5 d-flex align-items-center justify-content-center bg-warning p-1">
                                    <div class="text-center text-light">
                                        <h2 class="mb-0">50 Gb</h2>
                                        <div class="small">
                                            Data Volume
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="card-body">
                                        <h6 class="text-secondary text-truncate mb-1">Orange</h6>
                                        <h4 class="text-black text-truncate">50 gb data limited offer</h4>
                                        <div class="text-end mt-3 text-black">
                                            <span class="small">from</span> <span class="fw-bold">32,45 $</span>
                                        </div>
                                        <div class="text-end text-capitalize small text-secondary">
                                            e-sim available
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 mb-3">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="card rounded-0 h-100">
                            <div class="row g-0">
                                <div class="col-5 d-flex align-items-center justify-content-center bg-warning p-1">
                                    <div class="text-center text-light">
                                        <h2 class="mb-0">50 Gb</h2>
                                        <div class="small">
                                            Data Volume
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="card-body">
                                        <h6 class="text-secondary text-truncate mb-1">Orange</h6>
                                        <h4 class="text-black text-truncate">50 gb data limited offer</h4>
                                        <div class="text-end mt-3 text-black">
                                            <span class="small">from</span> <span class="fw-bold">32,45 $</span>
                                        </div>
                                        <div class="text-end text-capitalize small text-secondary">
                                            e-sim available
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 mb-3">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="card rounded-0 h-100">
                            <div class="row g-0">
                                <div class="col-5 d-flex align-items-center justify-content-center bg-warning p-1">
                                    <div class="text-center text-light">
                                        <h2 class="mb-0">50 Gb</h2>
                                        <div class="small">
                                            Data Volume
                                        </div>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="card-body">
                                        <h6 class="text-secondary text-truncate mb-1">Orange</h6>
                                        <h4 class="text-black text-truncate">50 gb data limited offer</h4>
                                        <div class="text-end mt-3 text-black">
                                            <span class="small">from</span> <span class="fw-bold">32,45 $</span>
                                        </div>
                                        <div class="text-end text-capitalize small text-secondary">
                                            e-sim available
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </section>
@endsection
