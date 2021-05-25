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
                        <a href="#"><img src="/images/products/pizza1.jpg" width="100%"></a>
                    </div> <!-- img-big-wrap.// -->
                    <div class="thumbs-wrap">
                        <a href="#" class="item-thumb"> <img src="/images/products/pizza1.jpg" width="100%"></a>
                        <a href="#" class="item-thumb"> <img src="/images/products/pizza1.jpg" width="100%"></a>
                        <a href="#" class="item-thumb"> <img src="/images/products/pizza1.jpg" width="100%"></a>
                        <a href="#" class="item-thumb"> <img src="/images/products/pizza1.jpg" width="100%"></a>
                    </div> <!-- thumbs-wrap.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-md-6 border-left p-3">
                <article class="content-body">

                    <h2 class="title" style="color: red">Pizza de Italia</h2>

                    <div class="mb-3">
                        <var class="price h4">120 Mdl</var>
                    </div>

                    <p>Тесто, соус томатный, соус BBQ, соус Табаско, базилик, сыр Моцарелла, мясо куриное копченное, бекон, говяжьи тефтельки, колбаски Кабанос, паприка копченная.</p>

                    <hr>
                    <div class="row">
                        <div class="form-group col-md flex-grow-0">
                            <div class="input-group mb-3 input-spinner">
                                <div class="input-group-prepend">
                                    <button class="btn btn-light" type="button" id="button-plus"> + </button>
                                </div>
                                <input type="text" class="form-control" value="1">
                                <div class="input-group-append">
                                    <button class="btn btn-light" type="button" id="button-minus"> − </button>
                                </div>
                            </div>
                        </div> <!-- col.// -->
                        <div class="form-group col-md">
                        <a href="#" class="btn  btn-danger"> Buy now </a>
                            <a href="#" class="btn  btn-outline-danger"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>

                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </article> <!-- product-info-aside .// -->
            </main> <!-- col.// -->
        </div> <!-- row.// -->
    </div>
</div>

@endsection
