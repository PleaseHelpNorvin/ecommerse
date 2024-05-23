@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="card-wrapper">
            <div class="count-card-div">
                <p>Products Counts</p>

                <p>{{$countProducts}}</p>
            </div>
            <div class="count-card-div">
                <p>Orders Counts</p>
                
                <p>{{$countOrders}}</p>
            </div>
            <div class="count-card-div">
                <p>Categories Count</p>
                <p>{{$countCategory}}</p>
            </div>
            <div class="count-card-div">
                <p>Users Counts</p>
                
                <p>{{$countClientUser}}</p>
            </div>
        </div>
    </div>
@endsection