@extends('client.layout.layout')
@section('main')
    <div class="wrapper">
        <div>
            <p>your orders</p>
        </div>
        <div class="order-container">
            <div class="order-item">
                <div class="order-image">
                    <img src="{{asset('roldan.png')}}" alt="">
                </div>
                <div class="order-name">
                    <p>name</p>
                </div>
                <div class="order-color">
                    <p>color</p>
                </div>
                <div class="order-quantity">
                    <p>quantity</p>
                </div>
                <div class="order-price">
                    <p>total price</p>
                </div>
                <div class="order-action">
                    <a href="">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                    </a>
                    <form action="">
                        <button type="submit">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection