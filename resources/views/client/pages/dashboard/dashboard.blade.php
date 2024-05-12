@extends('client.layout.layout')
@section('main')
    <div >

    </div>
    <aside class="left">
        <p>Categories</p>
        <div class="categories-container">
            
            @forelse ($categories as $category)
                <div class="categories-item">
                    {{-- <p>test1</p> --}}
                    <div class="categories-img-container">
                        <img src="{{ asset($category->imagePath) }}" alt="Category Image">
                    </div>
                    <div class="categories-text-container">
                        <form action="{{ route('dashboard.showProducts', ['username'=>$username,'categoryId' => $category->id, ]) }}" method="GET">
                            <button type="submit">
                                <p>{{ $category->categoryName }}</p>
                                <span class="material-symbols-outlined">
                                    gesture_select
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </aside>
    <aside class="right">
        <p>Products</p>
        <div class="products-container">
            @forelse ($products as $product)
                <div class="products-item">
                    <div class="item-image-container">
                        <img src="{{ asset($product->imagePath) }}" alt="Product Image">
                    </div>
                    <div class="item-text-container">
                        <h3>{{$product->productName}}</h3>
                        <h5>{{$product->description}}</h5>
                        <div class="item-rating-container">
                            <span class="material-symbols-outlined">
                                star
                            </span>
                            <p>4.9(# reviews)</p>
                        </div>
                    </div>
                    <div class="product-item-btn">
                        <a href="{{ route('products.view',['username' => $username, 'productId' => $product->id]) }}">
                            <span class="material-symbols-outlined">
                                open_in_new
                            </span>
                        </a>
                    </div>
                </div>
            @empty
                
            @endforelse
        </div>
    </aside>
@endsection
