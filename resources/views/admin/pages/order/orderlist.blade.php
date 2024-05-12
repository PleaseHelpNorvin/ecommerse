@extends('admin.layout.layout')
@section('main-container')
<div class="page-wrapper">
    <div class="page-head-container">
        <a href="{{ route('adminOrder.view') }}" class="page-btn">Back</a>
        <h5>User's Checked Out Items</h5>
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
                <div class="color-container">
                    <!-- Assuming you have a field for the color in your $orderItem -->
                    <p>{{ $orderItem->color }}</p>
                </div>
                <div class="price-container">
                    <!-- Assuming you have a field for the price in your $orderItem -->
                    <p>{{ $orderItem->price }}</p>
                </div>
                <div class="quantity-container">
                    <!-- Assuming you have a field for the quantity in your $orderItem -->
                    <p>{{ $orderItem->quantity }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
