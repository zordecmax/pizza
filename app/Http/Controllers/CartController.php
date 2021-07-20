<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         *  +items: array:2 [▶]
        +totalQty: 17
        +totalPrice: 2170
         */
//        dd(\Session::get('cart'));
        $cart = \Session::get('cart') ?? new Cart();

        $authUser = auth()->user() ?? null;
        if ($authUser) {
            Auth::login($authUser, true);
            $userData = [
                'name' => $authUser->name,
                'email' => $authUser->email,
                'phone' => $authUser->phone,
                'address' => $authUser->address,
                'token' => $authUser->getRememberToken()
            ];
        }
        if($authUser){
            return view('cart',
                ['cart' => $cart, 'userData' => json_encode($userData)]
            );
        }
        return view('cart', ['cart' => $cart]);

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
//        dd($request->all());
        $product = Product::findOrFail($request->input('id'));
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;
//        dd($oldCart);
        $cart = new Cart($oldCart);
        $cart->add($product);
        $request->session()->put('cart', $cart);
        return response()->json([
            'cartQty' => $cart->totalQty
            ]);
//        return redirect()->back();
//        dd($request->session()->get('cart'));
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
//        dd($id);
        $cart = \Session::has('cart') ? \Session::get('cart') : null;
//        dd($request->input('qty'));
        $cart->updateQty($id, $request->input('qty'));
//        $cart->updateQty($id, 4);
        \Session::put('cart', $cart);
        return response()->json([
            'cartQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = \Session::has('cart') ? \Session::get('cart') : null;
        $cart->remove($id);
        \Session::put('cart', $cart);
        return response()->json([
            'cartQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }
    /**
     *Erase all cart.
     *
     */
    public function erase()
    {
        \Session::forget('cart');
    }
}
