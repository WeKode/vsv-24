@extends('front.layouts.app')

@section('content')
    <section class="py-5">
        <div class="container-fluid px-3 px-lg-5">

            <div class="row justify-content-between">
                <div class="col-auto">
                    <h3 class="mb-0">
                        Electricity providers<span class="mx-3">|</span>{{$products->total()}} Results
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
                            <div class="row">
                                <form class="row" action="{{route('smartphones.index')}}">
                                    <div class="fw-bold mb-2">Price range in $</div>
                                    <input type="hidden" value="{{request()->get('attribute')}}" name="attribute">

                                    <div class="col-6 mb-3">
                                        <label for="from">from</label>
                                        <input type="text" id="from" class="form-control rounded-0" name="min_price"
                                               value="{{request()->get('min_price')}}">
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="to">to</label>
                                        <input type="text" id="to" class="form-control rounded-0" name="max_price"
                                               value="{{request()->get('max_price')}}">
                                    </div>

                                    <div class="col-12 mb-3">
                                        <button class="btn btn-warning w-100 rounded-0 py-2 shadow-sm">filter by price
                                        </button>
                                    </div>
                                </form>


                                <div class="col-12 mb-3">
                                    <div class="fw-bold mb-2">Delivery time</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="deliveryTime">
                                        <label class="form-check-label" for="deliveryTime">
                                            Immediately available
                                        </label>
                                    </div>
                                </div>
                                <form id="filtersForm" method="get">
                                    @foreach($attributes as $a)
                                        @if(!$a->values->isEmpty())
                                            <div class="col-12 mb-3">
                                                <div class="fw-bold mb-2">{{$a->name}}</div>
                                                @foreach($a->values as $v)
                                                    <div class="form-check">
                                                        <input class="form-check-input set_filter" type="checkbox"
                                                               value="{{$v->id}}"
                                                               id="{{$v->name}}"
                                                               name="attributes" {{in_array($v->id, explode('_',request()->get('attribute')) ?? []) ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="android">
                                                            {{$v->name}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        @foreach($products as $p)
                            <div class="col-lg-4 mb-3">
                                <a href="{{route('sim_offers.show',$p->id)}}" class="text-decoration-none">
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
                                                    <h4 class="text-black text-truncate">{{$p->name}}</h4>
                                                    <div class="text-end mt-3 text-black">
                                                        <span class="small">from</span> <span class="fw-bold">{{$p->price}} $</span>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        let yourArray = [];

        $(".set_filter").click(function () {
            var attributes = "";
            $('.set_filter').each(function () {
                var attribute = (this.checked ? this.value : null);
                if (attribute !== null)
                {
                    attributes += (attributes === "" ? attribute : "_" + attribute);
                }
            });
            let url = new URL(document.location);
            let search_params = url.searchParams;
            search_params.set('attribute', attributes);
            window.location = url.href

        });


    </script>
@endpush
