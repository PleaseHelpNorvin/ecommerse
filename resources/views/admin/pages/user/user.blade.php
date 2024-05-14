@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="page-header-wrapper">
            <div class="page-search-container">
                <form action="{{route('user.search')}}" method="GET">
                    <input type="text" name="search-user" placeholder="Search User">
                    <button>
                        <span class="material-symbols-outlined">
                            search
                            </span>
                    </button>
                </form>
            </div>
        </div>
        {{-- <div class="order-nav">
            <a href="">All</a>
            <a href="">Active</a>
            <a href="">Inactive</a>
            <a href="">Cancelled</a>
        </div> --}}
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($userlist as $user)
                        <tr>
                            <td>{{ $user ->id}}</td>
                            <td>{{ $user->username}}</td>
                            <td>{{ $user->fullname}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->phonenumber}}</td>
                            <td >
                                {{-- <button class="btn-edit"><span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button> --}}
                                <button class="btn-delete"><span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Data Available</td>
                            <td>No Data Available</td>
                            <td>No Data Available</td>
                            <td>No Data Available</td>
                            <td>No Data Available</td>
                            <td>No Data Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection