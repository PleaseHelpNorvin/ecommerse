@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="page-header-wrapper">
            <div class="page-search-container">
                <form action="{{route('product.search')}}" method="GET">
                    @csrf
                    <input type="search" name="search-product" placeholder="Search Product">
                    <button>
                        <span class="material-symbols-outlined">
                            search
                            </span>
                    </button>
                </form>
            </div>
            <a href="{{route('adminProductForm.view')}}" class="page-btn">Add Product</a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        {{-- <th>Description</th> --}}
                        <th>Category</th>
                        {{-- <th>Color</th> --}}
                        {{-- <th>Stock Quantity</th> --}}
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                <img src="{{ asset($product->imagePath) }}" alt="Product Image">
                            </td>
                            <td>{{$product->productName}}</td>
                            {{-- <td>{{$product->description	}}</td> --}}
                            <td>{{$product->categoryName }}</td>
                            {{-- <td>{{$product->name}}</td> --}}
                            {{-- <td>{{$product->stockQuantity}}</td> --}}
                            <td><small>₱</small>{{$product->price}}</td>
                            <td >
                                <div class="td-flex">
                                    <a href="{{route('editProductForm.view',$product->id)}}" >
                                        <button class="btn-edit">
                                            <span class="material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                    </a>
                                    <form action="{{route('product.delete', $product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-delete"><span class="material-symbols-outlined">
                                            delete
                                        </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
                
            </table>
            <div class="pagination-container">
                {{ $products->links() }}
            </div>
        </div>


    </div>
    @endsection
