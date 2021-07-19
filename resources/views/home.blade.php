@extends('layouts.app')

@section('video')

    <header>
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="/video/pizza.mp4" type="video/mp4">
        </video>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white text-animate">
                    <h1 class="display-3">Best pizza in Chisinau</h1>
                    <p class="lead mb-0">Made fresh every day from organic products</p>
                </div>
            </div>
        </div>
    </header>

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
{{--            <alert type="success">Message</alert>--}}
        </div>
    </div>
{{--    <div class="row">--}}
{{--        <div class="col-lg-8">--}}
{{--            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">--}}
{{--                <div class="carousel-inner">--}}
{{--                    <div class="carousel-item active">--}}
{{--                        <img src="/images/pizza_slide_1.png" class="d-block w-100" alt="...">--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <img src="/images/pizza_slide_2.png" class="d-block w-100" alt="...">--}}
{{--                    </div>--}}
{{--                    <div class="carousel-item">--}}
{{--                        <img src="/images/pizza_slide_2.png" class="d-block w-100" alt="...">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">--}}
{{--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Previous</span>--}}
{{--                </a>--}}
{{--                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">--}}
{{--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Next</span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4">--}}
{{--            <h2 class="text-center">Your order</h2>--}}
{{--        </div>--}}

{{--    </div>--}}

</div>

<div class="container pt-4">
    <div class="row pb-4">
        <h2>New products</h2>
    </div>

    <div class="row">
        @foreach($lastProducts as $lastProduct)
        <div class="col-md-3 col-6">
            <figure class="card card-product-grid">
                <a href="/item/1" class="img-wrap">
                    <img src="{{$lastProduct->image}}" width="100%">
                </a>
                <figcaption class="info-wrap">
                    <a href="#" class="title" style="color: red">{{$lastProduct->name}}</a>
                    <div class="mt-2 d-flex justify-content-between">
                        <var class="price">{{$lastProduct->price}} Mdl</var> <!-- price-wrap.// -->
                        <add-to-cart-component id="{{$lastProduct->id}}" price="{{$lastProduct->price}}" name="{{$lastProduct->name}}"></add-to-cart-component>

                    </div> <!-- action-wrap.end -->
                </figcaption>
            </figure> <!-- card // -->
        </div>
        @endforeach

    </div>

</div>

<div class="container pt-4">
    <div class="row pb-4">
        <h2>Popular products</h2>
    </div>
    <div class="container pt-4 slider-container overflow-hidden">

    <div class="row d-flex flex-nowrap  slider-track ">
        @foreach($popularProducts as $popularProduct)
            <div class="col-12 col-md-3 col-6 slider-item">
                <figure class="card card-product-grid">
                    <a href="/item/1" class="img-wrap">
                        <img src="{{$popularProduct->image}}" width="100%">
                    </a>
                    <figcaption class="info-wrap">
                        <a href="#" class="title" style="color: red">{{$popularProduct->name}}</a>
                        <div class="mt-2 d-flex justify-content-between">
                            <var class="price">{{$popularProduct->price}} Mdl</var>
                            <add-to-cart-component id="{{$popularProduct->id}}" price="{{$popularProduct->price}}" name="{{$popularProduct->name}}"></add-to-cart-component>

                        </div>
                    </figcaption>
                </figure>
            </div>
        @endforeach

    </div>
    <div class="row ">
        <div class="col-12 text-center">
            <button class="btn btn-sm btn-outline-danger btn-prev">Prev</button>
            <button class="btn btn-sm btn-outline-danger btn-next">Next</button>
        </div>
    </div>

</div>
</div>
<div class="container pt-4">
    <div class="row pb-4">
        <h2>Last articles</h2>
    </div>
        <div class="row">
            @foreach($lastArticles as $article)
                <div class="col-lg-4 col-md-6 col-12 pb-2">
                    <div class="card">
                        <div class="card-image">
                            <a href="/article/{{$article->id}}">
                                @isset($article->image->path)
                                    <img class="card-img-top" src="{{ asset("images/articles/".$article->image->path) }}" alt="Card image cap">
                                @else
                                    <img class="card-img-top" src="{{ asset("images/noimg.jpg")  }}">
                                @endisset
                            </a>
                        </div>


                        <div class="card-body">
                            <h5 class="card-title">{{ $article->name }}</h5>
                            <div class="card_text">
                                <p class="card-text">{{ $article->short_description }}</p>
                            </div>
                            <div class="card_footer d-flex justify-content-between">
                                <a href="/article/{{$article->id}}" class="btn btn-danger">Reed more</a>
                                <span>
                            <small>{{$article->created_at->format('Y-m-d')}}</small>
                            <small>{{$article->user->name}}</small>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>
<div class="container pt-4">
    <div class="row">
        <h2>Our partners</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <img class="bd-placeholder-img card-img-top" src="/images/partners/baneasa.jpeg" width="100%">
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <img class="bd-placeholder-img card-img-top" src="/images/partners/floris.jpeg" width="100%">
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <img class="bd-placeholder-img card-img-top" src="/images/partners/meet.jpeg" width="100%">
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <img class="bd-placeholder-img card-img-top" src="/images/partners/vita.jpeg" width="100%">
            </div>
        </div>


    </div>
</div>
<div class="container pt-4">
    <div class="row">
        <h2>Contact us</h2>
    </div>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email">
            </div>

        </div>
        <div class="form-group">
            <label for="inputMessage">Your message</label>
            <textarea class="form-control" id="inputMessage" name="message"></textarea>
        </div>

        <button type="submit" class="btn btn-danger">Send</button>
    </form>
</div>
</div>
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


@endsection
