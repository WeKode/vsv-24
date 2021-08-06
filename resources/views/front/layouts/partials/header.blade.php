<header>

    <section class="bg-blue-darken">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{asset('front/assets/images/logo.png')}}" alt="logo" height="40">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars text-light"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="d-flex"
                              @if(request()->routeIs('smartphones*'))
                              action="{{route('smartphones.index')}}"
                              @elseif(request()->routeIs('electricity_providers*'))
                              action="{{route('electricity_providers.index')}}"
                              @elseif(request()->routeIs('sim_offers*'))
                              action="{{route('sim_offers.index')}}"
                              @else
                              action="{{route('smartphones.index')}}"
                            @endif
                        >
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                   name="search" value="{{request()->get('search')}}">
                            <button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                            @auth
                                <li class="nav-item me-0 me-lg-3">
                                    <a class="nav-link text-light" href="{{route('profile.index')}}"><i
                                            class="fas fa-user me-2"></i>{{user()->email}}</a>
                                </li>

                                <li class="nav-item me-0 me-lg-3">
                                    <a class="nav-link text-light" href="{{route('profile.edit')}}"><i
                                            class="fas fa-cog me-2"></i>{{__('actions.edit')}}</a>
                                </li>

                                <li class="nav-item me-0 me-lg-3">
                                    <a onclick="document.getElementById('logout-form').submit()"
                                       class="nav-link text-light" href="javascript:void(0)">
                                        <i class="fas fa-sign-out-alt me-2"></i>{{__('actions.logout')}}
                                    </a>
                                    <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
                                </li>

                            @else
                                <li class="nav-item me-0 me-lg-3">
                                    <a class="nav-link text-light" href="tel:+213560030151"><i
                                            class="fas fa-phone-alt me-2"></i>+213 560 03 01 51</a>
                                </li>
                                <li class="nav-item me-0 me-lg-3">
                                    <a class="nav-link text-light" href="{{route('login')}}"><i
                                            class="fas fa-user me-2"></i>Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-warning px-4" href="{{route('register')}}">Register For Free</a>
                                </li>
                            @endauth

                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </section>

    <section class="bg-blue py-2">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-auto">
                    <a href="{{route('smartphones.index')}}" class="text-decoration-none text-light">Smartphones</a>
                </div>
                <div class="col-auto">
                    <a href="{{route('electricity_providers.index')}}"
                       class="text-decoration-none text-light">Energy</a>
                </div>
                <div class="col-auto">
                    <a href="{{route('sim_offers.index')}}" class="text-decoration-none text-light">Phone Plans</a>
                </div>
            </div>
        </div>
    </section>

    {{--    <section class="bg-grey text-center py-5">--}}
    {{--        carousel goes here--}}
    {{--    </section>--}}

</header>
