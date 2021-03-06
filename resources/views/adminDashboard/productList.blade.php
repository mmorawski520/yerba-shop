@extends('layouts.app')

@section('content')
    <section class="main-dashboard my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list">
                        <a href="/admin" class="list-group-item  text-dark">
                            Dashboard
                        </a>
                        <a href="/admin/productList" class="list-group-item text-white bg-dark">Products</a>
                        <a href="/admin/orders" class="list-group-item text-dark">Orders</a>
                        <a href="/admin/userList" class="list-group-item text-dark">Users</a>
                        <a href="/admin/cms" class="list-group-item text-dark">Cms</a>
                        <a href="/admin/stats" class="list-group-item text-dark">Stats</a>
                    </div>

                </div>
                <div class="col-md-9">
                    <h1>Products</h1>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Origin</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>

                        </tr>
                        </thead>
                        <tbody id="products-body">
                        @forelse($products as $product)
                            <tr id="tr{{$product->id}}">
                                <th scope="row">
                                    <button class="btn btn-info btn-sm m-1"
                                            onclick="setOldData({{$product->id}},'{{$product->name}}')"
                                            data-id="{{$product->id}}" data-toggle="modal"
                                            data-target="#editProductModal">edit
                                    </button>
                                    <button class="btn btn-danger btn-sm m-1"
                                            onclick="current({{$product->id}},'{{$product->name}}')" data-toggle="modal"
                                            data-target="#deleteProductModal" data-id="{{$product->id}}">delete
                                    </button>
                                    <a class="text-dark m-1" href="{{route('current.product',['id'=>$product->id])}}">{{$product->name}}</a>
                                </th>
                                <td>{{$product->brand}}</td>
                                <td>{{$product->origin}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$quantity[$loop->index]}}</td>
                                <td hidden>{{$product->description}}</td>
                                <td hidden>{{$product->category_id}}</td>
                                <td hidden>{{$product->id}}</td>

                            </tr>
                        @empty
                            <h3>There're no products</h3>
                        @endforelse
                        <div class="d-flex my-2">
                                {{ $products->links() }}
                                <button type="button" class="btn btn-outline-primary ml-5 btn-sm" data-toggle="modal"
                                        data-target="#addProductModal">
                                    Add new product
                                </button>
                            <button  class="btn btn-outline-warning ml-2 btn-sm" data-toggle="modal"
                                     data-target="#addCategoryModal">
                                Add new category
                            </button>
                            <button  class="btn btn-warning ml-2 btn-sm" data-toggle="modal"
                                     data-target="#addBrandModal">
                                Add new brand
                            </button>
                            <button  class="btn btn-outline-dark ml-2 btn-sm" data-toggle="modal"
                                     data-target="#addCountryModal">
                                Add new <br>
                                country of origin
                            </button>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">

    </footer>

@endsection
@push('scripts')
    <script type="text/javascript" src="{{asset('js/modals/productModals.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('js/modals/addersModals.js')}}"></script>
@endpush
@section('modals')
    @extends('modals.addProductModal')
    @extends('modals.editProductModal')
    @extends('modals.deleteProductModal')
    @extends('modals.addProductCategoryModal')
    @extends('modals.addProductBrandModal')
    @extends('modals.addProductCountryModal')
@endsection
