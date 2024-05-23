    @extends('client.layout.layout')
    @section('main')
        <div class="cart-container">

            <div class="cart-main-container">
                {{-- <form action=""> --}}
                    <aside class="cart-left">
                        <div class="cart-head-left">
                            {{-- <input type="checkbox" class="cart-checkbox product-header-checkbox" name="" id=""> --}}
                            <p>Product</p>
                        </div>
                        <div class="product-left-container" id="product-left-container">
                            @foreach ($checkouts as $checkout)
                                <div class="product-item-container" data-id="{{ $checkout->id }}">
                                    <input type="checkbox" class="product-item-img-check" name="checkout_ids[]"
                                        value="{{ $checkout->id }}">
                                    <div class="product-item-img">
                                        <img src="{{ asset($checkout->product->imagePath) }}" alt="">
                                    </div>
                                    <div class="product-item-name">
                                        <p>{{ $checkout->product->productName }}</p>
                                    </div>
                                    <div class="product-item-variation">
                                        <p>{{ $checkout->color }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- applicable for mobile view --}}
                        <div class="mobile-product-left-container" id="product-left-container">
                            @foreach ($checkouts as $checkout)
                                <div class="mobile-product-item-container" id="mobile-product-item-container"
                                    onclick="flipProductItem(this)">
                                    <div class="front" onclick="flipProductItem(this)">
                                        {{-- <input type="checkbox" class="product-item-img-check" value="{{ $checkout->id }}"
                                            name="checkout_ids[]"> --}}
                                        <div class="product-item-img" onclick="flipProductItem(this)">
                                            <img src="{{ asset($checkout->product->imagePath) }}" alt="">
                                        </div>
                                        <div class="product-item-name" onclick="flipProductItem(this)">
                                            <p>{{ $checkout->product->productName }}</p>
                                        </div>
                                        <div class="product-item-variation" onclick="flipProductItem(this)">
                                            <p>{{ $checkout->color }}</p>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <div class="unitPrice-container">
                                            <p><small>₱</small>{{ number_format( $checkout->product->price, 2, '.', ',') }}</p>

                                            {{-- <p><small>₱</small>{{ $checkout->product->price }}</p> --}}
                                        </div>
                                        <div class="Quanity-container">
                                            <p>{{ $checkout->quantity }}</p>
                                        </div>
                                        <div class="totalPrice-container">
                                            <p><small>₱</small>{{ number_format($checkout->item_total_price, 2, '.', ',') }}</p>
                                        </div>
                                        <div class="Actions-container">
                                            <form action="{{ route('checkout.delete', ['username' => $username, 'check_out_id' => $checkout->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </aside>

                    {{-- for right part of pc --}}
                    <aside class="cart-right">
                        <div class="cart-head-right">
                            <p>Unit Price</p>
                            <p>Quantity</p>
                            <p>Total Price</p>
                            <p>Actions</p>
                        </div>
                        <div class="product-right-container " id="product-right-container">
                            @foreach ($checkouts as $checkout)
                                <div class="product-item-container">
                                    {{-- <input type="text" name="product_id" value="{{ $checkout->id }}" hidden> --}}
                                    <div class="unitPrice-container">
                                        <p><small>₱</small>{{ number_format($checkout->product->price, 2, '.', ',') }}</p>
                                    </div>
                                    <div class="Quanity-container">
                                        <p>{{ $checkout->quantity }}</p>
                                    </div>
                                    <div class="totalPrice-container">
                                        <p><small>₱</small>{{ number_format($checkout->item_total_price, 2, '.', ',') }}</p>
                                    </div>
                                    <div class="Actions-container">
                                        <form action="{{ route('checkout.delete', ['username' => $username, 'check_out_id' => $checkout->id]) }}" method="POST">
                                            {{-- {{dd($checkout)}} --}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
                <div class="cart-footer">
                    <div class="cart-footer-footer">
                        {{-- <form action="#"> --}}

                            <p>Total ({{ $countItem }} Item): ₱{{ number_format($totalPrice, 2, '.', ',') }}</p>
                            <button type="submit" class="check-out-a">
                                <a href="{{route('checkoutform.view', ['username'=>$username])}}" class="check-out-a">
                                    <div class="check-out">
                                        Check Out
                                    </div>
                                </a>
                            </button>
                        {{-- </form> --}}
                    </div>
                    
            </div>
        @endsection
