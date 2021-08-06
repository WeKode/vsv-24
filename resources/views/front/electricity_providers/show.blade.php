@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container-fluid px-3 px-lg-5">

            <div class="row justify-content-between">
                <div class="col-auto">
                    <div class="mb-0">
                        <a href="{{route('home')}}" class="text-decoration-none text-black">Home</a>
                        <span class="mx-2">/</span>
                        <a href="{{route('electricity_providers.index')}}" class="text-decoration-none text-black">Electricity Providers</a>
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
                        <span class="badge border border-danger text-danger fw-normal">Electricity</span>
                        <span class="badge border border-danger text-danger fw-normal">Private</span>
                        <span class="badge border border-danger text-danger fw-normal">24 Months</span>
                    </div>
                    <h3 class="mt-3 mb-0">
                        <span class="text-black">{{$product->price}} $</span>
                    </h3>
                    <h6 class="text-secondary">
                        ø per month
                    </h6>
                    <ul class="mt-4">
                        <li>Tariff: Easy24 electricity</li>
                        <li>Green electricity tariff: No</li>
                        <li>Use: Private</li>
                        <li>Contract Term: 24 Months</li>
                    </ul>
                    <div>{{$product->description}}</div>
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

            <h3 id="compare" class="text-center text-lg-start text-capitalize my-5">Compare smartphones prices</h3>

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
                                            Total Energy Basic Plan
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            Total Energy Basic Plan
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            Total Energy Basic Plan
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            Total Energy Basic Plan
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            Total Energy Basic Plan
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none">
                                        <div class="ratio ratio-1x1 image" style="background-image: url('https://media-exp1.licdn.com/dms/image/C4E0BAQFN_6Gk_O2IRw/company-logo_200_200/0/1519855875100?e=2159024400&v=beta&t=uuHB-WDRTFXkHAGrEMt2h1GtTRPWvi0XMaoqNtl0Tww');"></div>
                                        <div class="my-2 text-black">
                                            Total Energy Basic Plan
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Annual consumption</th>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                                <td>4250 kWh</td>
                            </tr>
                            <tr>
                                <th scope="row">Down payment</th>
                                <td>monthly</td>
                                <td>monthly</td>
                                <td>monthly</td>
                                <td>monthly</td>
                                <td>monthly</td>
                                <td>monthly</td>
                            </tr>
                            <tr>
                                <th scope="row">Base price</th>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                                <td>$ 12.40 / month ($ 148.80 / year)</td>
                            </tr>
                            <tr>
                                <th scope="row">1st year price</th>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                                <td>$ 87.67 / month</td>
                            </tr>
                            <tr>
                                <th scope="row">Contract term</th>
                                <td>24 Months</td>
                                <td>24 Months</td>
                                <td>24 Months</td>
                                <td>24 Months</td>
                                <td>24 Months</td>
                                <td>24 Months</td>
                            </tr>
                            <tr>
                                <th scope="row">Renewal</th>
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

            <h3 id="compare" class="text-center text-lg-start text-capitalize my-5">Product details</h3>

            <div class="row">

                <div class="col-lg-6">

                    <div class="table-responsive small">
                        <table class="table table-striped caption-top">
                            <caption class="mb-2 text-black fw-bold">General characteristics</caption>
                            <tbody>
                            <tr>
                                <td>Product type:</th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>RAM:</th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Internal storage:</th>
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
                                <td>Product type:</th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>RAM:</th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Internal storage:</th>
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
                                <td>Product type:</th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>RAM:</th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Internal storage:</th>
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
                                <td>Product type:</th>
                                <td>Smartphone</td>
                            </tr>
                            <tr>
                                <td>RAM:</th>
                                <td>3 GB</td>
                            </tr>
                            <tr>
                                <td>Internal storage:</th>
                                <td>128 GB</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <h3 class="text-center text-lg-start text-capitalize my-5">Similar products</h3>

            <div class="row">

                <div class="col-lg-6 mb-3">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="card rounded-0 h-100">
                            <div class="row g-0">
                                <div class="col-6 image" style="background-image: url('https://3vffxhfy5ah3clou11dg4jhd-wpengine.netdna-ssl.com/wp-content/uploads/AdobeStock_195603050.jpeg');"></div>
                                <div class="col-6">
                                    <div class="card-body">

                                        <h4 class="text-black text-capitalize text-truncate mb-2">Lorem ipsum dolor sit amet</h4>
                                        <h6 class="text-secondary text-truncate mb-1">2500 kWh</h6>
                                        <h6 class="text-secondary text-truncate">Lorem ipsum dolor sit amet</h6>
                                        <div class="text-end mt-3 text-black">
                                            <span class="small">From :</span> <span class="fw-bold">32,45 $</span>
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

                <div class="col-lg-6 mb-3">
                    <a href="javascript:void(0)" class="text-decoration-none">
                        <div class="card rounded-0 h-100">
                            <div class="row g-0">
                                <div class="col-6 image" style="background-image: url('https://3vffxhfy5ah3clou11dg4jhd-wpengine.netdna-ssl.com/wp-content/uploads/AdobeStock_195603050.jpeg');"></div>
                                <div class="col-6">
                                    <div class="card-body">

                                        <h4 class="text-black text-capitalize text-truncate mb-2">Lorem ipsum dolor sit amet</h4>
                                        <h6 class="text-secondary text-truncate mb-1">2500 kWh</h6>
                                        <h6 class="text-secondary text-truncate">Lorem ipsum dolor sit amet</h6>
                                        <div class="text-end mt-3 text-black">
                                            <span class="small">From :</span> <span class="fw-bold">32,45 $</span>
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

            </div>

        </div>
    </section>
@endsection
