<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
            ->with('image','user')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take(3);
        return view('home', ['lastArticles' => $lastAticles]);
    }
}
