@extends('layout.layout')

@section('title','Manage your stock')

@section('content')

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">lorem</h1>
        <p class="lead text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque dicta necessitatibus, vitae veritatis ipsum placeat ea dolorum unde, nobis voluptas asperiores facilis dolores corporis animi quisquam sequi laborum quae quas!</p>
        <p>
          <a href="{{route('product.new')}}" class="btn btn-primary my-2">Add new products</a>
        </p>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    @if (is_array($products))
      @foreach ($products as $product)
      <div>
        <div class="card shadow-sm">
          @if ($product->image)
            <img src={{$product->image}} class="card-img-top" alt="...">
          @endif
          <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('product.show', $product->id)}}">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  </a>
                  <a href="{{route('product.edit', $product->id)}}">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </a>
                  <form action="{{route('product.delete', $product->id)}}" method="POST" class="inline">
                      @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                  </form>
                </div>
                <small class="text-muted">@if ($product->isAvailable) <span class="text-success">Product available</span>@endif</small>
              </div>
            </div>
          </div>
      </div>
      @endforeach
    @endif
    </div>
</div>


</main>
    
@endsection