@extends('client.layout.layout')
@section('main')
<div class="wrapper">
    <div class="checkoutform-container">
        <form action="{{ route('clientOrder.add', ['username' => $username]) }}" method="POST">
            @csrf
            <input type="text" name="costumer_id" id="" value="{{$clientUser->id}}"><br>
            {{-- @foreach ($checkouts as $checkout)
                <input type="text" name="check_out_id[]" id="" value="{{$checkout->id}}">
            @endforeach --}}
            <div class="checkoutform-group">
                <label for="fullname">Fullname:</label>
                <input type="text" name="fullname" value="{{ $clientUser->fullname }}" id="fullname" readonly>
            </div>
            <div class="checkoutform-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" >
                @error('address')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="checkoutform-group">
                <label for="mode_of_payment">Mode of Payment:</label>
                <select name="mode_of_payment" id="mode_of_payment" >
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
