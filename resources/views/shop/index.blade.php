@extends('layouts.app')
@section('content')
<!--<div style="height:100px;">
    <img src="{{asset('images/layout/yerba-header.jpg')}}" class="img-fluid" style=" max-width: 100%;height: 400px;" alt="Responsive image">
</div>-->
<header>



    <div
      class="text-center bg-image"
      style="
        background-image: url('http://localhost:8000/images/layout/yerba-header.jpg');
        height: 310px;
        background-repeat:no-repeat;
        background-size: cover;
      "
    >
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);height:100%">
        <div class="d-flex justify-content-center align-items-center h-100">
          <div class="text-white">
            <h1 class="mb-3">
                Your favourite yerba<br>
                in the best price!
            </h1>


          </div>
        </div>
      </div>
    </div>

  </header>
    <nav class="text-center container my-5">
        <button class="btn btn-link text-dark" id="expander">Click me to expand the filters</button>
        <form id="filters">
            <div class="form-group">
                <label for="filter-searcher">Search</label>
                <input type="text" class="form-control" id="filter-searcher"  >
            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="minPrice">Min price</label>
                    <input type="number" class="form-control" id="minPrice" >
                </div>
                <div class="form-group col-md-6">
                    <label for="maxPrice">Max price</label>
                    <input type="number" class="form-control" id="maxPrice" >
                </div>
                <div class="form-group col-12">
                    <select class="custom-select custom-select-lg mb-3 col-4">
                        <option selected>Category</option>

                    </select>
                    <select class="custom-select custom-select-lg mb-3 col-4">
                        <option selected>Brand</option>

                    </select>
                    <select class="custom-select custom-select-lg mb-3 col-3">
                        <option selected>Origin</option>

                    </select>
                </div>
                <div class="form-group col-12">

                    <select class="custom-select custom-select-lg mb-3 col-6">
                        <option selected>Date added</option>
                    </select>
                    <span class="searching_sort_radios my-5 col-6">
                        <input type="radio" class="searching_asc" name="order" id="searching_dsc" value="a" checked="">
                        <label for="searching_dsc">Ascending</label>
                        <input type="radio" class="searching_asc" id="searching_asc" name="order" value="d">
                        <label for="searching_asc">Descending</label></span>
                </div>
            </div>




            <button type="submit" class="btn btn-primary">Search</button>
        </form>

    </nav>
    <div class="container text-center">
        <div class="container bootstrap snipets">

            <div class="row flow-offset-1 m-2">
                @forelse($products as $product)
              <div class="col-xs-6 col-md-4 border">
                <div class="caption">
                    <h6><a href="product/{{$product->id}}" class="text-dark">{{$product->name}}</a></h6><span class="price">
                       <span >{{$product->price}}$</span>
                  </div>
                <div class="product tumbnail thumbnail-3 "><a href="product/{{$product->id}}"><img style="max-width:200px;height:auto;"src="{{asset('images/products/'.$product->image_path)}}" alt=""></a>

                </div>

              </div>
            @empty
              <h2>There aren't any products yet :/</h2>
            @endforelse
            </div>
          </div>
    </div>
@push('scripts')
<script src="{{asset('js/filters.js')}}">

</script>
@endpush
@endsection
