<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductSearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->search;
    }
}
