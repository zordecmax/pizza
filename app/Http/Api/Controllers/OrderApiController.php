<?php

namespace App\Http\Api\Controllers;

use App\Mail\OrderSent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderApiController extends Controller
{

    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $token = $request->input('token');

        if ($token) {
            $authUser = User::where('remember_token', $token)->firstOrFail();
        }
        if (!empty($authUser)) {
            $userId = $authUser->id;
        } else {
            $userId = null;
        }
        var_dump($userId);

        $dataTime = date('Y-m-d H:i:s', strtotime($request->input('delivered')));
        $order = Order::create([
            'delivered' => $dataTime,
            'bill2' => $request->input('bill2'),
            'user_id' => $userId,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'comment' => $request->input('comment'),
        ]);
        $order->save();

        $productsInCart = $request->input('items');


        foreach ($productsInCart as $product) {
            $row = OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'qty' => $product['qty'],
            ]);
            $row->save();
        }

        Mail::to($request->input('email'))->send(new OrderSent(($request->all())));
        Mail::to('maximgrosul@gmail.com')->send(new OrderSent(($request->all())));
        return response()->json($request->all(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
