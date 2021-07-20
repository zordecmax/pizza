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
       <div class="col-md-12 cart">
           <div class="title">
               <div class="row">
                   <div class="col">
                       <h4><b>Shopping Cart</b></h4>
                   </div>
{{--                   <div class="col align-self-center text-right text-muted"><span class="count-cart-item-numbers">{{$cart->totalQty ?? 0}}</span> items</div>--}}
               </div>
           </div>
{{--           <div class="cart-items">--}}
{{--               @each('cart.product' , $cart->items, 'item', 'cart.no-products')--}}
{{--           </div>--}}
           <cart-list-component user-data="{{$userData ?? null}}"></cart-list-component>


           <div class="back-to-shop"><a href="{{route('menu')}}">&leftarrow;<span class="text-muted">Back to shop</span></a></div>
       </div>
{{--       <div class="col-md-4 summary">--}}
{{--           <div>--}}
{{--               <h5><b>Summary</b></h5>--}}
{{--           </div>--}}
{{--           <hr>--}}
{{--           <div class="row">--}}
{{--               <div class="col" style="padding-left:0;">ITEMS 3</div>--}}
{{--               <div class="col text-right">&euro; 132.00</div>--}}
{{--           </div>--}}
{{--           <form>--}}
{{--               <p>SHIPPING</p> <select>--}}
{{--                   <option class="text-muted">Standard-Delivery- &euro;5.00</option>--}}
{{--               </select>--}}

{{--           </form>--}}
{{--           <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">--}}
{{--               <div class="col">TOTAL PRICE</div>--}}
{{--               <div class="col text-right totalPrice">{{$cart->totalPrice ?? 0}} Mdl</div>--}}
{{--           </div>--}}
{{--           <div class="row">--}}
{{--               <div class="col-12">--}}
{{--                   <form>--}}

{{--                       <div class="form-group">--}}
{{--                           <label for="phone">Cell phone:</label>--}}
{{--                           <input type="text" class="form-control" id="phone">--}}
{{--                           <label for="address">Address:</label>--}}
{{--                           <input type="text" class="form-control" id="address">--}}
{{--                           <label for="shipping">SHIPPING:</label>--}}
{{--                           <select class="form-control" id="shipping">--}}
{{--                               <option>Take away from restaurant</option>--}}
{{--                               <option>Standard-Delivery- 50 Mdl</option>--}}

{{--                           </select>--}}
{{--                       </div>--}}

{{--                    </form>--}}
{{--               </div>--}}
{{--           </div>--}}
{{--           <div class="row">--}}
{{--               <div class="col-12">--}}
{{--                   <button class="btn btn-danger text-right">Order pizza now</button>--}}
{{--               </div>--}}
{{--           </div>--}}
{{--       </div>--}}
   </div>
</div>

@endsection

