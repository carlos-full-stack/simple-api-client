@extends('layout.layout')

@section('title','Add new product to stock')

@section('content')

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Add new product to stock</h1>
        <p class="lead text-muted">Add a new product</p>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="m-4 p-5 bg-white">
      <form method="POST">@csrf
        <div class="mb-4">
          <label for="formGroupExampleInput" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter product name">
        </div>
        <div class="mb-4">
          <label for="exampleFormControlTextarea1" class="form-label">Description</label>
          <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Enter product description"></textarea>
        </div>
        <div class="mb-4">
          <label for="formGroupExampleInput2" class="form-label">Weight</label>
          <input type="text" name="weight" class="form-control" id="formGroupExampleInput2" placeholder="Enter product weight">
        </div>
        <div class="mb-4">
          <div class="form-check">
            <input class="form-check-input" name="isAvailable" type="checkbox" value="1" id="flexCheckChecked">
            <label class="form-check-label" for="flexCheckChecked">
              Available
            </label>
          </div>
        </div>
        <div class="mb-4">
          <label for="formGroupExampleInput" class="form-label">Product stock</label>
          <input type="text" name="qty" class="form-control" id="formGroupExampleInput" placeholder="Enter product stock">
        </div>
        <div class="mb-5">
          <select class="form-select" name="category" aria-label="Default select example">
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name}}</option>
            @endforeach 
          </select>
        </div>
        <div class="mb-4">
          <button type="submit" class="btn btn-primary">Save</button>
          <a href="{{route('index')}}">
            <button type="button" class="btn btn-secondary">Go back</button>
          </a>
        </div>  
    </div>
</main>
    
@endsection