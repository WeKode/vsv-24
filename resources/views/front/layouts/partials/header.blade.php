<header>

    <section class="bg-blue-darken">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{route('home')}}">
                        <img src="{{asset('front/assets/images/logo.png')}}" alt="logo" height="40">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars text-light"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="d-flex" action="{{route('smartphones.index')}}">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{request()->get('search')}}">
                            <button class="btn btn-warning" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                            <li class="nav-item me-0 me-lg-3">
                                <a class="nav-link text-light" href="tel:+213560030151"><i class="fas fa-phone-alt me-2"></i>+213 560 03 01 51</a>
                            </li>
                            <li class="nav-item me-0 me-lg-3">
                                <a class="nav-link text-light" href="{{route('login')}}"><i class="fas fa-user me-2"></i>Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-warning px-4" href="{{route('register')}}">Register For Free</a>
                            </li>
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
                    <a href="javascript:void(0)" class="text-decoration-none text-light">Energy</a>
                </div>
                <div class="col-auto">
                    <a href="javascript:void(0)" class="text-decoration-none text-light">Phone Plans</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-grey text-center py-5">
        carousel goes here
    </section>

</header>
