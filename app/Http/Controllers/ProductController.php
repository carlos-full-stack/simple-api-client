<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function newProduct()
    {

        $response = Http::get('http://127.0.0.1:8000/api/categories');

        // if (!$response->ok()) return;

        $categories = json_decode($response);

        return view('newProduct', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveProduct(Request $request)
    {
        // $request->validate([

        //     'name' => 'required|string|min:3|max:50',
        //     'qty' => 'required|string|min:3|max:50'  
              
        //      ]);


        // return $request->name;

        $response = Http::asForm()->post('http://127.0.0.1:8000/api/product/new', [
            'name' =>  $request->name,
            'description' =>  $request->description,
            'weight' =>  $request->weight,
            'isAvailable' =>  $request->isAvailable,
            'qty' =>  $request->qty,
            'category' =>  $request->category,
        ]);

        return $response;

    
      
            return redirect()->action([ClubController::class, 'indexClub']);
    }


    /**
     * Display the specified resource.
     */
    public function showProduct(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProduct(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function deleteProduct(string $id)
    {

        $response = Http::delete('http://127.0.0.1:8000/api/product/' . $id);

        // if (!$response->ok())

        return redirect()->action([IndexController::class, 'showIndex']);
        
        
    }
}
