@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="card-wrapper">
            <div class="count-card-div">
                User Count
            </div>
            <div class="count-card-div">
                Order Count
            </div>
            <div class="count-card-div">
                User 
            </div>
            <div class="count-card-div">
                User 
            </div>
        </div>
        <div class="dashboard-content-container">
            {{-- <div class="chart-wrapper"> --}}
                <div class="chart-container">
                    pie chart
                </div>
                <div class="chart-container">
                    pie chart
                </div>
                <div class="chart-container">
                    pie chart
                </div>
                <div class="chart-container">
                    pie chart
                </div>
                <div class="chart-container">
                    pie chart
                </div>
                <div class="chart-container">
                    pie chart
                </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection