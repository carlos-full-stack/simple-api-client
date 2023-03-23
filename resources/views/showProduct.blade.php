@extends('layout.layout')

@section('title','Add new product to stock')

@section('content')

<main>

  <div class="container py-5">

    <div class="p-5 bg-white w-75 mx-auto">
      <form method="POST">@csrf
        <div class="mb-4">
          <h1>{{ $product->name }}</h1>
        </div>
        <div class="mb-4">
          <span>{{ $product->description }}</span>
        </div>
        <div class="mb-4 row">
          <div class="col"><strong>Weight: </strong>{{ $product->weight }}</div><div class="col"><strong>Quantity: </strong>{{ $product->qty }}</div>
        </div>
        <div class="mb-5 row">
          <div class="col"><strong>Availability: </strong> @if ($product->isAvailable) <span class="text-success">Product available</span> @endif </div><div class="col"><strong>Category: </strong>{{ $product->qty }}</div>
        </div>
        <div class="mb-4">
          <a href="{{route('index')}}">
            <button type="button" class="btn btn-secondary">Go back</button>
          </a>
        </div>  
    </div>
</main>
    
@endsection