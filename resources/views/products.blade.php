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
        <div class="col-12">
            <a href="/menu"><h1 style="color: red">All products</h1></a>
        </div>
    </div>
    <div class="row">


        @foreach($products as $product)
        <div class="col-md-3">
            <figure class="card card-product-grid">
                <a href="/item/1" class="img-wrap">
                    <img src="/images/products/pizza1.jpg" width="100%">
                </a>
                <figcaption class="info-wrap">
                    <a href="#" class="title" style="color: red">Tonno</a>
                    <div class="mt-2">
                        <var class="price"><strong>95 Mdl</strong></var> <!-- price-wrap.// -->
                        <a href="#" class="btn btn-sm btn-outline-danger float-right">Add to cart <i class="fa fa-shopping-cart"></i></a>
                    </div> <!-- action-wrap.end -->
                </figcaption>
            </figure> <!-- card // -->
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-12 pt-5 d-flex justify-content-center">
{{--            {{ $products->links() }}--}}
        </div>
    </div>
</div>

@endsection
