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
                        <th>M.O.P</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Roldan Medio</td>
                        <td>Sunday-10 2024</td>
                        <td>Gcash</td>
                        <td>Pending</td>
                        <td><small> $</small>1500</td>
                        <td>
                            <a href="{{route('orderlist.view')}}" >
                                <button class="btn-view">
                                    <span class="material-symbols-outlined">
                                        view_list
                                        </span>
                                </button>
                            </a>

                            <a href="" >
                                <button class="btn-edit">
                                    <span class="material-symbols-outlined">
                                        done
                                    </span>
                                </button>
                            </a>
                            
                            <button class="btn-delete"><span class="material-symbols-outlined">
                                cancel
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
