@extends('layouts.app')

@section('metaTitle')
    All products
@endsection

@section('metaDescription')
    All products
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="row no-gutters">
            <aside class="col-md-6">
                <article class="gallery-wrap">
                    <div class="img-big-wrap">
                        <a href="#"><img src="{{$product->image}}" width="100%"></a>
                    </div> <!-- img-big-wrap.// -->
{{--                    <div class="thumbs-wrap">--}}
{{--                        <a href="#" class="item-thumb"> <img src="/images/products/pizza1.jpg" width="100%"></a>--}}
{{--                        <a href="#" class="item-thumb"> <img src="/images/products/pizza1.jpg" width="100%"></a>--}}
{{--                        <a href="#" class="item-thumb"> <img src="/images/products/pizza1.jpg" width="100%"></a>--}}
{{--                        <a href="#" class="item-thumb"> <img src="/images/products/pizza1.jpg" width="100%"></a>--}}
{{--                    </div> <!-- thumbs-wrap.// -->--}}
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-md-6 border-left p-3">
                <article class="content-body">

                    <h2 class="title" style="color: red">{{$product->name}}</h2>

                    <div class="mb-3 row ">
                        <div class="col d-flex align-self-center">
                            <span class="price h4 m-0"><strong>{{$product->price}} Mdl</strong></span>
                        </div>
                        <div class="col text-right">
                            <add-to-cart-component id="{{$product->id}}" price="{{$product->price}}" name="{{$product->name}}"></add-to-cart-component>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>{{$product->description}}</p>
                        </div>
                    </div>



                </article>
            </main>
        </div>
    </div>
</div>

@endsection
