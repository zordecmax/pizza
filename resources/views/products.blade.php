@extends('layouts.app')

@section('metaTitle')
    All products
@endsection

@section('metaDescription')
    All products
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <span><a href="/menu"><h1 style="color: red">
                        @if(isset($category))
                        {{$category->name}}
                        @else
                        All products
                        @endif
                    </h1></a></span>
            <span>
                <a href="?view=asc"><i class="bi bi-sort-down-alt" style="font-size: 2rem; color: red;"></i></a>
                <a href="?sort=desc"><i class="bi bi-sort-down" style="font-size: 2rem; color: red;"></i></a>
                <a href="?view=list"><i class="bi bi-justify" style="font-size: 2rem; color: red;"></i></a>
                <a href="?view=grid"><i class="bi bi-grid-3x3-gap-fill" style="font-size: 2rem; color: red;"></i></a>
            </span>
        </div>
    </div>
    <div class="row">

        @if($view === 'grid')
            @foreach($products as $product)
                <div class="col-md-3 col-6">
                    <figure class="card card-product-grid">
                        <a href="/item/1" class="img-wrap">
                            <img src="{{$product->image}}" width="100%">
                        </a>
                        <figcaption class="info-wrap">
                            <a href="#" class="title" style="color: red"><strong>{{$product->name}}</strong></a>
                            <div class="mt-2 d-flex justify-content-between">
                                <var class="price">{{$product->price}} Mdl</var> <!-- price-wrap.// -->
                                <add-to-cart-component id="{{$product->id}}" price="{{$product->price}}" name="{{$product->name}}" image="{{$product->image}}"></add-to-cart-component>

                            </div> <!-- action-wrap.end -->
                        </figcaption>
                    </figure> <!-- card // -->
                </div>
            @endforeach
        @else
            @foreach($products as $product)
                <div class="col-md-12">

                    <figure class="card card-product-grid">
                        <div class="row">
                            <div class="col-md-1 col-6">
                                <a href="/item/1" class="img-wrap">
                                    <img src="{{$product->image}}" width="auto" style="max-height: 50px">
                                </a>
                            </div>
                            <div class="col-md-2 col-6">
                                <a href="#" class="title" style="color: red">{{$product->name}}</a>
                            </div>
                            <div class="col-md-6">
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="col-md-3">
                                <figcaption class="info-wrap d-flex justify-content-between">

                                    <var class="price">{{$product->price}} Mdl</var> <!-- price-wrap.// -->
                                    <add-to-cart-component id="{{$product->id}}" price="{{$product->price}}" name="{{$product->name}}" image="{{$product->image}}"></add-to-cart-component>

    {{--                                <div class="mt-2">--}}
    {{--                                    <var class="price">{{$product->price}} Mdl</var> <!-- price-wrap.// -->--}}
    {{--                                </div> <!-- action-wrap.end -->--}}
    {{--                                <div class="mt-2">--}}
    {{--                                    <add-to-cart-component id="{{$product->id}}" price="{{$product->price}}" name="{{$product->name}}"></add-to-cart-component>--}}

    {{--                                </div>--}}
                                </figcaption>
                            </div>


                        </div>

                    </figure> <!-- card // -->
                </div>
            @endforeach
        @endif
    </div>
    <div class="row">
        <div class="col-12 pt-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection
