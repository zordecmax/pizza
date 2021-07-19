<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lastAticles = Article::where('published', 1) // Get last 3 articles
            ->with('image', 'user')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take(3);

        $lastProducts = Product::where('published', 1)->orderBy('created_at', 'DESC')->get()->take(4);

        $popularProductsSelect = DB::table('products')
            ->join('order_product', 'order_product.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', DB::raw('SUM(order_product.qty) as qty'))
            ->groupBy('products.id')
            ->orderBy('qty', 'desc')
            ->get()
            ->take(8);

        $arrayOfPopularProducts = [];

        foreach ($popularProductsSelect as $popularProduct) {
            $arrayOfPopularProducts[] = $popularProduct->id;
        }

        $popularProducts = Product::whereIn('id', $arrayOfPopularProducts)->get();


        return view('home', ['lastArticles' => $lastAticles, 'popularProducts' => $popularProducts, 'lastProducts' => $lastProducts]);
    }
}
