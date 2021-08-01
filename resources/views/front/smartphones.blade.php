@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container-fluid px-3 px-lg-5">

            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="mb-0">
                        Smartphones<span class="mx-3">|</span>733 Results
                    </h3>
                </div>
                <div class="col-auto">
                    <select name="filter" id="filter" class="form-select">
                        <option value="1" selected disabled>
                            Filter by
                        </option>
                        <option value="2">
                            Name
                        </option>
                        <option value="3">
                            Date
                        </option>
                    </select>
                </div>
            </div>

            <hr>

            <div class="row">

                <div class="col-lg-3">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <form class="row">

                                <div class="fw-bold mb-2">Price range in $</div>

                                <div class="col-6 mb-3">
                                    <label for="from">from</label>
                                    <input type="text" id="from" class="form-control rounded-0">
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="to">to</label>
                                    <input type="text" id="to" class="form-control rounded-0">
                                </div>

                                <div class="col-12 mb-3">
                                    <button class="btn btn-warning w-100 rounded-0 py-2 shadow-sm">filter by price</button>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="fw-bold mb-2">Delivery time</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="deliveryTime">
                                        <label class="form-check-label" for="deliveryTime">
                                            Immediately available
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="fw-bold mb-2">Brands</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="brand1">
                                        <label class="form-check-label" for="brand1">
                                            Huawei
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="brand2">
                                        <label class="form-check-label" for="brand2">
                                            Samsung
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="brand2">
                                        <label class="form-check-label" for="brand2">
                                            Oppo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="brand2">
                                        <label class="form-check-label" for="brand2">
                                            Xiaomi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="brand2">
                                        <label class="form-check-label" for="brand2">
                                            Apple
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="fw-bold mb-2">Operating system</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="android">
                                        <label class="form-check-label" for="android">
                                            Android
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="ios">
                                        <label class="form-check-label" for="ios">
                                            IOS
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <div class="fw-bold mb-2">Cellular standard</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cs2">
                                        <label class="form-check-label" for="cs2">
                                            2G
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cs2">
                                        <label class="form-check-label" for="cs2">
                                            3G
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cs3">
                                        <label class="form-check-label" for="cs3">
                                            3G
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cs4">
                                        <label class="form-check-label" for="cs4">
                                            4G
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="cs5">
                                        <label class="form-check-label" for="cs5">
                                            5G
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="fw-bold mb-2">Main camera resolution</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="v1">
                                        <label class="form-check-label" for="v1">
                                            over 20 MP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="v2">
                                        <label class="form-check-label" for="v2">
                                            16 MP to 20 MP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="v3">
                                        <label class="form-check-label" for="v3">
                                            13 MP to 16 MP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="v4">
                                        <label class="form-check-label" for="v4">
                                            8 MP to 13 MP
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="v5">
                                        <label class="form-check-label" for="v5">
                                            4 MP to 8 MP
                                        </label>
                                    </div>
                                </div>

                                <div class="accordion" id="showMoreFilterAccordion">
                                    <div class="accordion-item border-0 py-0">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button px-0 fw-bold bg-transparent text-black" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                Camera highlights
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body px-0 py-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="v1">
                                                    <label class="form-check-label" for="v1">
                                                        Dual rear camera
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="v1">
                                                    <label class="form-check-label" for="v1">
                                                        Dual front camera
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="accordion-item border-0 py-0">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button px-0 fw-bold bg-transparent text-black" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                Camera highlights
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                            <div class="accordion-body px-0 py-0">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="v1">
                                                    <label class="form-check-label" for="v1">
                                                        Dual rear camera
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="v1">
                                                    <label class="form-check-label" for="v1">
                                                        Dual front camera
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row">

                        <div class="col-lg-3 mb-4">
                            <a href="javascript:void(0)" class="text-decoration-none">
                                <div class="card rounded-0">
                                    <div class="image" style="background: url('https://static.toiimg.com/thumb/msid-71178070,width-1200,height-900,resizemode-4/.jpg');height: 250px;"></div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="text-truncate text-black mb-2">
                                                Lorem ipsum dolor sit amet dolor sit amet
                                            </div>
                                            <div class="text-black">
                                                <span class="bg-danger text-light px-1 py-1 small rounded me-2">-23%</span> <span class="small">33 offers</span>
                                            </div>
                                            <h6 class="text-truncate mt-2">
                                                <span class="text-black">234 $</span> - <span class="line-through text-secondary fw-normal">234 $</span>
                                            </h6>
                                            <div class="text-secondary small">
                                                Free shipping
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <a href="javascript:void(0)" class="text-decoration-none">
                                <div class="card rounded-0">
                                    <div class="image" style="background: url('https://static.toiimg.com/thumb/msid-71178070,width-1200,height-900,resizemode-4/.jpg');height: 250px;"></div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="text-truncate text-black mb-2">
                                                Lorem ipsum dolor sit amet dolor sit amet
                                            </div>
                                            <div class="text-black">
                                                <span class="bg-danger text-light px-1 py-1 small rounded me-2">-23%</span> <span class="small">33 offers</span>
                                            </div>
                                            <h6 class="text-truncate mt-2">
                                                <span class="text-black">234 $</span> - <span class="line-through text-secondary fw-normal">234 $</span>
                                            </h6>
                                            <div class="text-secondary small">
                                                Free shipping
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <a href="javascript:void(0)" class="text-decoration-none">
                                <div class="card rounded-0">
                                    <div class="image" style="background: url('https://static.toiimg.com/thumb/msid-71178070,width-1200,height-900,resizemode-4/.jpg');height: 250px;"></div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="text-truncate text-black mb-2">
                                                Lorem ipsum dolor sit amet dolor sit amet
                                            </div>
                                            <div class="text-black">
                                                <span class="bg-danger text-light px-1 py-1 small rounded me-2">-23%</span> <span class="small">33 offers</span>
                                            </div>
                                            <h6 class="text-truncate mt-2">
                                                <span class="text-black">234 $</span> - <span class="line-through text-secondary fw-normal">234 $</span>
                                            </h6>
                                            <div class="text-secondary small">
                                                Free shipping
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <a href="javascript:void(0)" class="text-decoration-none">
                                <div class="card rounded-0">
                                    <div class="image" style="background: url('https://static.toiimg.com/thumb/msid-71178070,width-1200,height-900,resizemode-4/.jpg');height: 250px;"></div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="text-truncate text-black mb-2">
                                                Lorem ipsum dolor sit amet dolor sit amet
                                            </div>
                                            <div class="text-black">
                                                <span class="bg-danger text-light px-1 py-1 small rounded me-2">-23%</span> <span class="small">33 offers</span>
                                            </div>
                                            <h6 class="text-truncate mt-2">
                                                <span class="text-black">234 $</span> - <span class="line-through text-secondary fw-normal">234 $</span>
                                            </h6>
                                            <div class="text-secondary small">
                                                Free shipping
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <a href="javascript:void(0)" class="text-decoration-none">
                                <div class="card rounded-0">
                                    <div class="image" style="background: url('https://static.toiimg.com/thumb/msid-71178070,width-1200,height-900,resizemode-4/.jpg');height: 250px;"></div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="text-truncate text-black mb-2">
                                                Lorem ipsum dolor sit amet dolor sit amet
                                            </div>
                                            <div class="text-black">
                                                <span class="bg-danger text-light px-1 py-1 small rounded me-2">-23%</span> <span class="small">33 offers</span>
                                            </div>
                                            <h6 class="text-truncate mt-2">
                                                <span class="text-black">234 $</span> - <span class="line-through text-secondary fw-normal">234 $</span>
                                            </h6>
                                            <div class="text-secondary small">
                                                Free shipping
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <a href="javascript:void(0)" class="text-decoration-none">
                                <div class="card rounded-0">
                                    <div class="image" style="background: url('https://static.toiimg.com/thumb/msid-71178070,width-1200,height-900,resizemode-4/.jpg');height: 250px;"></div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="text-truncate text-black mb-2">
                                                Lorem ipsum dolor sit amet dolor sit amet
                                            </div>
                                            <div class="text-black">
                                                <span class="bg-danger text-light px-1 py-1 small rounded me-2">-23%</span> <span class="small">33 offers</span>
                                            </div>
                                            <h6 class="text-truncate mt-2">
                                                <span class="text-black">234 $</span> - <span class="line-through text-secondary fw-normal">234 $</span>
                                            </h6>
                                            <div class="text-secondary small">
                                                Free shipping
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 mb-4">
                            <a href="javascript:void(0)" class="text-decoration-none">
                                <div class="card rounded-0">
                                    <div class="image" style="background: url('https://static.toiimg.com/thumb/msid-71178070,width-1200,height-900,resizemode-4/.jpg');height: 250px;"></div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <div class="text-truncate text-black mb-2">
                                                Lorem ipsum dolor sit amet dolor sit amet
                                            </div>
                                            <div class="text-black">
                                                <span class="bg-danger text-light px-1 py-1 small rounded me-2">-23%</span> <span class="small">33 offers</span>
                                            </div>
                                            <h6 class="text-truncate mt-2">
                                                <span class="text-black">234 $</span> - <span class="line-through text-secondary fw-normal">234 $</span>
                                            </h6>
                                            <div class="text-secondary small">
                                                Free shipping
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
