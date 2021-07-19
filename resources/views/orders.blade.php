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
       <div class="col-md-12">
           <div class="title">
               <div class="row">
                   <div class="col">
                       <h1>My Orders</h1>
                   </div>
               </div>
           </div>


       </div>
       <div class="col-12">
           @foreach($orders as $order)
               <div class="card my-1">
                   <div class="card-body">
                       <div class="row">
                           <div class="col-lg-6">
                               <p>Order sum: {{$order->bill2}} Mdl</p>
                               <p>Order date: {{$order->created_at}}</p>
                               <p>Order delivered: {{$order->delivered}}</p>
                               <p>Order status: {{$order->status}}</p>
                           </div>
                           <div class="col-lg-6">
                               <ul class="list-group list-group-flush">
                                   @foreach($order->products as $product)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">{{ $product->name }}</div>
                                            <div class="col">{{$product->price }} x {{ $product->pivot->qty }} = {{ $product->price * $product->pivot->qty }} Mdl </div>
                                        </div>

                                    </li>
                                   @endforeach
                               </ul>
                           </div>
                       </div>

                   </div>
               </div>

           @endforeach
       </div>
   </div>
</div>

@endsection

