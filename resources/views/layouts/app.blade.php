<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('metaTitle', 'Pizza')</title>
    <meta name="description" content=" @yield('metaDescription', 'Pizza online delivery')">


<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{env("RECAPTCHA_SITE_KEY")}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo.jpg" height="50px">
                </a>
                <div class="input-group col-xl-6 col-lg-5 col-md-4 ml-auto d-none d-lg-block d-xl-block">

                    <div class="input-group-append">
{{--                        <input type="text" class="form-control" placeholder="Product name" aria-label="Product name" aria-describedby="button-addon2">--}}

{{--                        <button class="btn btn-outline-danger" type="button" id="button-addon2">Search</button>--}}
{{--                        <ais-instant-search--}}
{{--                            :search-client="searchClient"--}}
{{--                            index-name="{{ (new App\Models\Product)->searchableAs() }}"--}}
{{--                        >--}}
{{--                            <ais-search-box oninput="console.log(this.searchStore)" placeholder="Search products..."></ais-search-box>--}}

{{--                            <ais-hits v-bind:class="[this.$store.getters.showSearchResult ? 'searchResultsShow' : 'searchResultsHide']" >--}}

{{--                                <template slot="item" slot-scope="{ item }">--}}
{{--                                    <div>--}}
{{--                                        <a :href="'/item/'+item.id">--}}
{{--                                            <p>@{{ item.name }}</p>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </template>--}}
{{--                            </ais-hits>--}}
{{--                        </ais-instant-search>--}}
                        <search-products-component></search-products-component>
                    </div>
                </div>
                <div class="nav-item ml-auto mr-2 d-block d-md-none">
                    <ul class="nav d-flex">
                        <li class="nav-item">
                            <a class="nav-link" href="/cart">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="red" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cart">
                                <cart-component></cart-component>
                            </a>
                        </li>
                    </ul>

{{--                    <a href="{{route('cart')}}">--}}
{{--                        <span class="badge badge-pill badge-danger position-relative cart-items-number-mob" style="border-radius: 5px">{{Session::get('cart')->totalQty ?? 0}}</span>--}}


{{--                    </a>--}}
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
{{--                            <a class="nav-link" href="/cart">--}}
{{--                            </a>--}}
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownMenu" class="nav-link dropdown-toggle" href="/menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               Menu
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenu">
                                <a class="dropdown-item" href="{{ route('menu') }}">
                                    All products
                                </a>
                                <a class="dropdown-item" href="{{ route('menu') }}/pizza">
                                    Pizza
                                </a>
                                <a class="dropdown-item" href="{{ route('menu') }}/salad">
                                    Salads
                                </a>
                                <a class="dropdown-item" href="{{ route('menu') }}/soup">
                                    Soups
                                </a>
                                <a class="dropdown-item" href="{{ route('menu') }}/hot">
                                    Hot
                                </a>
                                <a class="dropdown-item" href="{{ route('menu') }}/sweet">
                                    Sweet
                                </a>
                                <a class="dropdown-item" href="{{ route('menu') }}/drink">
                                    Drinks
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/articles">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contacts">Contacts</a>
                        </li>
                        <li class="nav-item pt-1">
                            <a href="{{route('cart')}}">
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-bag-fill" viewBox="0 0 16 16" style="position: absolute">--}}
{{--                                    <style>--}}
{{--                                        .red {fill: red;}--}}
{{--                                    </style>--}}

{{--                                    <path class="red" d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>--}}
{{--                                </svg>--}}
{{--                                <span class="badge badge-pill badge-danger position-relative cart-items-number" style="border-radius: 5px">{{Session::get('cart')->totalQty ?? 0}}</span>--}}
                                <cart-component></cart-component>

                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                                </li>--}}
                            @endif

                            @if (Route::has('register'))
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('userOrders') }}">
                                        My orders
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('video')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Pizza delivery</h5>

                    <p>
                        Pizza offers the most delicious food! Order food delivery to your home or office or make pre-order. Bon appetit! Stop wasting your time and money, start saving with Pizza.
                    </p>
                    <a href="/terms">Terms and Conditions</a>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-dark">Facebook</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Instagram</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Telegram</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Odnoklassniki</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
{{--                    <h5 class="text-uppercase mb-0">Links</h5>--}}

                    <img src="/images/logo.jpg" width="100%">
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 text-white" style="background-color: red;">
            © 2020 Copyright:
            <a class="text-white" href="#">Maxim</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title text-center" style="color: red">Item was added to cart</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
                <div class="modal-body text-center">
                    <h3 style="color: red">Item was added to cart</h3>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-cart-check" viewBox="0 0 16 16">
                            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg></p>
                </div>
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <script>

        let recaptcha = document.getElementById('g-recaptcha-response');
        if(recaptcha) {
            grecaptcha.ready(function() {
                grecaptcha.execute("{{env("RECAPTCHA_SITE_KEY")}}", {action: 'submit'}).then(function(token) {
                    document.getElementById('g-recaptcha-response').value = token
                });
            });
        }
    </script>
</body>
</html>
