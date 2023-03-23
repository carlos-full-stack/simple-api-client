<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{


    public function newProduct()
    {

        $response = Http::get('http://127.0.0.1:8000/api/categories');

        // if (!$response->ok()) return;

        $categories = json_decode($response);

        return view('newProduct', compact('categories'));
        
    }

    
    public function saveProduct(Request $request)
    {

        Http::asForm()->post('http://127.0.0.1:8000/api/product/new', [
            'name' =>  $request->name,
            'description' =>  $request->description,
            'weight' =>  $request->weight,
            'isAvailable' =>  $request->isAvailable,
            'qty' =>  $request->qty,
            'category' =>  $request->category,
        ]);
    
      
        return redirect()->action([IndexController::class, 'showIndex']);
    }


 
    public function showProduct(string $id)
    {

        $response = Http::get('http://127.0.0.1:8000/api/product/' . $id);

        $product = json_decode($response);

        return view('showProduct', compact('product'));

    }

    public function editProduct(string $id)
    {

        $categories = Http::get('http://127.0.0.1:8000/api/categories');

        $product = Http::get('http://127.0.0.1:8000/api/product/' . $id);

        $categoriesArray = json_decode($categories);

        $productArray = json_decode($product);

        return view('editProduct', compact('id','categoriesArray', 'productArray' ));
        
    }


    public function updateProduct(Request $request, string $id) {


    Http::asForm()->put('http://127.0.0.1:8000/api/product/' . $id, [
        'name' =>  $request->name,
        'description' =>  $request->description,
        'weight' =>  $request->weight,
        'isAvailable' =>  $request->isAvailable,
        'qty' =>  $request->qty,
        'category' =>  $request->category,
    ]);

    
        return redirect()->action([IndexController::class, 'showIndex']);


    }


    public function deleteProduct(string $id)
    {

        Http::delete('http://127.0.0.1:8000/api/product/' . $id);

        return redirect()->action([IndexController::class, 'showIndex']);
        
        
    }
}
