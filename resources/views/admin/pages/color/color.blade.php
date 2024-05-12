@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="page-header-wrapper">
            <div class="page-search-container">
                <form action="{{ route('color.search')}}" method="GET">
                    @csrf
                    <input type="search" name="search-color" placeholder="Search Color">
                    <button>
                        <span class="material-symbols-outlined">
                            search
                            </span>
                    </button>
                </form>
            </div>
            <a href="{{route('adminColorForm.view')}}" class="page-btn">Add Color</a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Color ID</th>
                        <th>Color Name</th>
                        <th>Color Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($colors as $color)
                        <tr>
                            <td>{{$color->id}}</td>
                            <td>{{$color->name}}</td>
                            <td>{{$color->code}}</td>
                            <td >
                                <div class="td-flex">
                                    <a href="{{route('editColorForm.view', $color->id)}}" >
                                        <button class="btn-edit">
                                            <span class="material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                    </a>
                                    <form action="{{ route('color.delete', $color->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-delete"><span class="material-symbols-outlined">
                                            delete
                                        </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
                
            </table>
            <div class="pagination-container">
                {{-- {{ $products->links() }} --}}
            </div>
        </div>


    </div>
    @endsection
