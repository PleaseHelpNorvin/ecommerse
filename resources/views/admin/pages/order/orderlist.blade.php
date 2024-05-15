@extends('admin.layout.layout')
@section('main-container')
<div class="page-wrapper">
    <div class="page-head-container">
        <a href="{{ route('adminOrder.view') }}" class="page-btn">Back</a>
        <h5>{{$orderfullname->fullname}}'s Checked Out Items</h5>
    </div>
    <div class="orderlist-header">
        <div class="orderlist-image-divider">
            <p>Image</p>
        </div>
        <div class="orderlist-name-divider">
            <p>Name</p>
        </div>
        {{-- <div class="orderlist-color-divider">
            <p>Color</p>
        </div> --}}
        <div class="orderlist-price-divider">
            <p>price</p>
        </div>
        <div class="orderlist-checkquantity-divider">
            <p>Product Quantity</p>
        </div>
        <div class="orderlist-total-divider">
            <p>Total Prices </p>
        </div>
    </div>
    <div class="orderlist-container">
        @foreach($orderItems as $orderItem)
            <div class="orderitem-container">
                <div class="image-container">
                    <!-- Assuming you have a field for the image URL in your $orderItem -->
                    <img src="{{ asset($orderItem->imagePath) }}" alt="{{ $orderItem->productName }}">
                </div>
                <div class="name-container">
                    <p>{{ $orderItem->productName }}</p>
                </div>
                {{-- <div class="color-container">
                    <!-- Assuming you have a field for the color in your $orderItem -->
                    <p>{{ $orderItem->checkout_color }}</p>
                </div> --}}
                <div class="productprice-container">
                    <!-- Assuming you have a field for the quantity in your $orderItem -->
                    <p><small>₱</small>{{ number_format($orderItem->price, 2, '.', ',') }}</p>
                </div>
                <div class="quantity-container">
                    <!-- Assuming you have a field for the quantity in your $orderItem -->
                    <p>{{ $orderItem->order_product_quantity }}</p>
                </div>
                <div class="price-container">
                    <!-- Assuming you have a field for the price in your $orderItem -->
                    <p><small>₱</small>{{ number_format($orderItem->price * $orderItem->order_product_quantity, 2, '.', ',') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
