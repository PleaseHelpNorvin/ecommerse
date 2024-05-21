@extends('client.layout.layout')
@section('main')
    <div class="wrapper">
        <div class="orderitems-header">
            <div class="orderitems-link">
                <a href="{{route('clientorder.view', ['username' => $username])}}">Back</a>
            </div>
            {{-- <div> --}}
                @foreach ($ordernum as $num)
                    <p>{{$num->order_number}}'s items</p>
                @endforeach
            {{-- </div> --}}
        </div>
        <div class="order-header">
            <div class="order-divider">
                <p>Product Image</p>
            </div>
            <div class="order-divider">
                <p>Product Name</p>
            </div>
            <div class="order-divider">
                <p>Product Price</p>
            </div>
            <div class="order-divider">
                <p>Product Quantity</p>
            </div>
            <div class="order-divider">
                <p>Total</p>
            </div>
            {{-- <div class="order-divider">
                <p>Action</p>
            </div> --}}
        </div>
        <div class="orderitem-container">
            @foreach ($orderItems as $orderItem)
                <div class="orderitems">
                    <div class="orderitems-divider">
                        <img src="{{asset($orderItem->imagePath)}}" alt="{{asset($orderItem->id)}}">
                        {{-- {{dd($orderItem->imagePath)}} --}}
                    </div>
                    <div class="orderitems-divider">
                        <p>{{$orderItem->productName}}</p>
                    </div>
                    <div class="orderitems-divider">
                        <p>₱{{ number_format($orderItem->price, 2, '.', ',') }}</p>
                    </div>
                    <div class="orderitems-divider">
                        <p>{{$orderItem->order_product_quantity}}</p>
                    </div>
                    <div class="orderitems-divider">
                        <p>₱{{ number_format($orderItem->price * $orderItem->order_product_quantity, 2, '.', ',') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection