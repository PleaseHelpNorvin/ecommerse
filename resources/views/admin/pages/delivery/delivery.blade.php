@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <td>#as$qQ</td>
                    <td>SAAC 1 BUAYA LAPU - LAPU CITY</td>
                    <td>to be delivered</td>
                    <td>
                        <a href="">
                            {{-- {{dd(route('orderlist.view', $order->id,$order->order_number))}} --}}
                            {{-- {{dd($order->customer_id)}} --}}
                            <button class="btn-view">
                                <span class="material-symbols-outlined">
                                    view_list
                                </span>
                            </button>
                        </a>
                    </td>
                </tbody>
            </table>
        </div>
    </div>
@endsection