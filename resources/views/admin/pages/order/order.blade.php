@extends('admin.layout.layout')

@section('main-container')
    <div class="page-wrapper">
        <div class="page-search-container">
            <form action="">
                <input type="text">
                <button>
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </button>
            </form>
        </div>
        <div class="order-nav">
            <a href="">All</a>
            <a href="">Paid</a>
            <a href="">Pending</a>
            <a href="">Cancelled</a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Order Quantity</th>
                        <th>M.O.P</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->fullname }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{$order->order_quantity_by_product}} </td>
                            <td>{{ $order->mop }}</td>
                            <td>{{ $order->status }}</td>
                            <td>₱{{ number_format($order->total, 2, '.', ',') }}</td>
                            <td>
                                <a href="{{ route('orderlist.view', ['clientId' => $order->customer_id, 'orderRanNum' => $order->order_number]) }}">
                                    {{-- {{dd(route('orderlist.view', $order->id,$order->order_number))}} --}}
                                    {{-- {{dd($order->customer_id)}} --}}
                                    <button class="btn-view">
                                        <span class="material-symbols-outlined">
                                            view_list
                                        </span>
                                    </button>
                                </a>

                                <a href="">
                                    <button class="btn-edit">
                                        <span class="material-symbols-outlined">
                                            done
                                        </span>
                                    </button>
                                </a>

                                <button class="btn-delete">
                                    <span class="material-symbols-outlined">
                                        cancel
                                    </span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
