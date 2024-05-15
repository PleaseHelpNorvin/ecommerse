@extends('client.layout.layout')
@section('main')
    <aside class="left">
        {{-- test product --}}
        <div class="products-left-container">
            <div class="product-view-img-container">
                <img src="{{ asset($products->imagePath) }}" alt="" class="slide">
            </div>
        </div>
    </aside>
    <aside class="right">
        <div class="products-right-container">
            <div class="product-view-text-container">
                <form action="{{ route('checkout.post',['username'=>$username] )}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">

                    <h3 class="product-name">{{$products->productName}}</h3>
                    <h4 class="product-price"><small>₱</small>{{ number_format($products->price, 2, '.', ',') }}</h4>
                    <p class="product-desc">{{$products->description}}</p>
                    <h5 class="product-color-h5">Color</h5>
                    <div class="product-color">
                        <div class="dropdown">
                            <input type="text" name="product-color" class="dropdown-input" readonly placeholder="Please Select Color">
                            <div class="dropdown-content" id="dropdown">
                                @foreach ($colors as $color)
                                    <div onclick="selectOption('{{$color->name}}')">{{$color->name}}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <h5 class="product-number">Quantity</h5>
                    <div class="product-add">
                        <span class="decrement">-</span>
                        <input type="text" class="quantity" value="1" name="quantity">
                        <span class="increment">+</span>
                    </div>
                    <div class="product-addtocart">
                        <button>Add To Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </aside>
    <style>
        .dropdown-content {
            display: none;
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
            const decrementBtn = document.querySelector('.decrement');
            const incrementBtn = document.querySelector('.increment');
            const quantityInput = document.querySelector('.quantity');

            // Decrement the quantity when the decrement button is clicked
            decrementBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            // Increment the quantity when the increment button is clicked
            incrementBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });

            // Hide dropdown when clicking outside of it
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

        // Function to set selected option as input value
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
