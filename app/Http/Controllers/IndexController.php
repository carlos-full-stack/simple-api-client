<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function showIndex() {

        $response = Http::get('http://127.0.0.1:8000/api/products/');

        $products = json_decode($response);

        return view('index', compact('products'));

    }
}
