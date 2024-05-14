@extends('client.layout.layout')
@section('main')
<div class="wrapper">
    <div class="checkoutform-container">
        
        <form action="{{ route('clientOrder.add', ['username' => $username]) }}" method="POST">
            @csrf
            <div class="checkoutform-group">
                <label for="">Client id</label>
                <input type="text" name="customer_id" value="{{ $clientUser->id }}">
                @error('customer_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <!-- Assuming $checkouts contains a single checkout -->
            {{-- @foreach ($checkouts as $checkout) --}}
                {{-- <input type="text" name="check_out_id" value="{{ $checkout->id }}"> --}}
                {{-- <input type="text" name="check_out_product_id" value="{{ $checkout->product_id }}"> --}}
            {{-- @endforeach --}}
            <div class="checkoutform-group">
                <label for="order_number">Order Number:</label>
                <input type="text" name="order_number" value="{{$orderNumber}}" readonly>
            </div>
            <div class="checkoutform-group">
                <label for="order_quantity_by_product">Order Quantity By Product:</label>
                <input type="text" name="order_quantity_by_product" value="{{$countItem}}">
            </div>
            <div class="checkoutform-group">
                <label for="order_product_id">Order Product Ids</label>
                @foreach ($checkouts as $checkout)
                    <input type="text" name="order_product_id[]" value="{{$checkout->product_id }}">
                @endforeach
                @error('order_product_id[]')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="checkoutform-group">
                <label for="fullname">Fullname:</label>
                <input type="text" name="fullname" value="{{ $clientUser->fullname }}" id="fullname" readonly>
            </div>
            <div class="checkoutform-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address">
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="checkoutform-group">
                <label for="mode_of_payment">Mode of Payment:</label>
                <select name="mode_of_payment" id="mode_of_payment">
                    <option value="">Select Mode of Payment</option>
                    <option value="Gcash">Gcash</option>
                    <option value="COD">COD</option>
                </select>
                @error('mode_of_payment')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="checkoutform-group">
                <label for="total_price">Total Price:</label>
                <input type="text" name="total_price" id="total_price" value="{{ $totalPrice }}" readonly>
                @error('total_price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Submit Order</button>
        </form>
    </div>
</div>

    <style>
        .dropdown-content {
            display: none;
            position: absolute;
            background: #41c1ba ;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content div {
            padding: 12px 16px;
            display: block;
            cursor: pointer;
        }

        .dropdown-input, .dropdown {
            cursor: pointer;
        }

        .dropdown-content.show {
            display: block;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('click', function(event) {
                if (!event.target.matches('.dropdown-input')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    for (var i = 0; i < dropdowns.length; i++) {
                        var dropdown = dropdowns[i];
                        if (dropdown.classList.contains('show')) {
                            dropdown.classList.remove('show');
                        }
                    }
                }
            });
        });

        function selectOption(option) {
            document.querySelector('.dropdown-input').value = option;
            document.getElementById('dropdown').classList.remove('show'); // Hide dropdown
        }

        // Show dropdown on input click
        document.querySelector('.dropdown-input').addEventListener('click', function() {
            document.getElementById('dropdown').classList.toggle('show');
        });
    </script>
@endsection
