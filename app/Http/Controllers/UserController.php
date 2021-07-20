<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function showOrders()
    {
        $orders = auth()->user()->orders->load('products');
        return view('orders', ['orders' => $orders]);
    }

    public function authUser()
    {
        return response()->json(auth()->user());
    }

}
