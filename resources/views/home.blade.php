@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/images/pizza_slide_1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/pizza_slide_2.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/pizza_slide_2.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <h2 class="text-center">Your order</h2>
        </div>

    </div>

</div>

<div class="container pt-4">
    <div class="row pb-4">
        <h2>Popular products</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <figure class="card card-product-grid">
                <a href="#" class="img-wrap">
                    <img src="/images/products/pizza1.jpg" width="100%">
                </a>
                <figcaption class="info-wrap">
                    <a href="#" class="title">Tonno</a>
                    <div class="mt-2">
                        <var class="price">95 Mdl</var> <!-- price-wrap.// -->
                        <a href="#" class="btn btn-sm btn-outline-primary float-right">Add to cart <i class="fa fa-shopping-cart"></i></a>
                    </div> <!-- action-wrap.end -->
                </figcaption>
            </figure> <!-- card // -->
        </div>
        <div class="col-md-3">
            <figure class="card card-product-grid">
                <a href="#" class="img-wrap">
                    <img src="/images/products/pizza2.jpg" width="100%">
                </a>
                <figcaption class="info-wrap">
                    <a href="#" class="title">Potato & bacon</a>
                    <div class="mt-2">
                        <var class="price">100 Mdl</var> <!-- price-wrap.// -->
                        <a href="#" class="btn btn-sm btn-outline-primary float-right">Add to cart <i class="fa fa-shopping-cart"></i></a>
                    </div> <!-- action-wrap.end -->
                </figcaption>
            </figure> <!-- card // -->
        </div>
        <div class="col-md-3">
            <figure class="card card-product-grid">
                <a href="#" class="img-wrap">
                    <img src="/images/products/pizza1.jpg" width="100%">
                </a>
                <figcaption class="info-wrap">
                    <a href="#" class="title">Tonno</a>
                    <div class="mt-2">
                        <var class="price">95 Mdl</var> <!-- price-wrap.// -->
                        <a href="#" class="btn btn-sm btn-outline-primary float-right">Add to cart <i class="fa fa-shopping-cart"></i></a>
                    </div> <!-- action-wrap.end -->
                </figcaption>
            </figure> <!-- card // -->
        </div>
        <div class="col-md-3">
            <figure class="card card-product-grid">
                <a href="#" class="img-wrap">
                    <img src="/images/products/pizza2.jpg" width="100%">
                </a>
                <figcaption class="info-wrap">
                    <a href="#" class="title">Potato & bacon</a>
                    <div class="mt-2">
                        <var class="price">100 Mdl</var> <!-- price-wrap.// -->
                        <a href="#" class="btn btn-sm btn-outline-primary float-right">Add to cart <i class="fa fa-shopping-cart"></i></a>
                    </div> <!-- action-wrap.end -->
                </figcaption>
            </figure> <!-- card // -->
        </div>
    </div>

</div>


<div class="container pt-4">
    <div class="row pb-4">
        <h2>Lat articles</h2>
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
                                <a href="/article/{{$article->id}}" class="btn btn-primary">Reed more</a>
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
<div class="container">
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

        <button type="submit" class="btn btn-primary">Send</button>
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
