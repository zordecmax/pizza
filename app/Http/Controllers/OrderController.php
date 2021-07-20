<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderConfirmMailer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderConfirmMailer $mailer;

    public function __construct(OrderConfirmMailer $mailer) {
        $this->mailer = $mailer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->mailer->send([
            'message' => [
            1 => [
                'qty' => 3,
                'price' => 199,
                'name' => 'Pizza de Italia'
            ],
            2 => [
                'qty' => 1,
                'price' => 99,
                'name' => 'Pizza 4 cheases'
            ]],
            'email' => 'max@mail.md',
            'name' => 'Maxim',
            'subject' => 'Order nr 123 at 25.05.21',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function userOrders(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
