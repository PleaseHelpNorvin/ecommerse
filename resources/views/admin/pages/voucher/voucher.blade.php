@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <a href="" class="page-btn">Add Voucher</a>
        <div class="order-nav">
            <a href="">All</a>
            <a href="">Used</a>
            <a href="">Not Used</a>
            {{-- <a href="">Cancelled</a> --}}
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Voucher ID</th>
                        <th>Voucher Name</th>
                        <th>Value</th>
                        <th>Status</th>
                        <th>Redeemed By</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>VDz10zc</td>
                        <td>Secret Voucher!</td>
                        <td>₱100</td>
                        <td>Used</td>
                        <td>Roldan Medio</td>
                        <td>
                            <a href="" >
                                <button class="btn-edit">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </a>
                            <button class="btn-delete"><span class="material-symbols-outlined">
                                    delete
                                </span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection