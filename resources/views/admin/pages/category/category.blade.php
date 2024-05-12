@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="page-header-wrapper">
            <div class="page-search-container">
                <form action="{{route('category.search')}}" method-="GET">
                    <input type="search" placeholder="Search Category" name="search-category">
                    <button>
                        <span class="material-symbols-outlined">
                            search
                            </span>
                    </button>
                </form>
            </div>
            <a href="{{route('adminCategoryForm.view')}}" class="page-btn">Add Category</a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Image</th>
                        <th>Category Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>
                                <img src="{{ asset($cat->imagePath) }}" alt="Category Image">
                            </td>
                            <td>{{$cat->categoryName}}</td>
                            <td>
                                <div class="td-flex">
                                    <a href="{{ route('editCategoryForm.view', $cat->id)}}">
                                        <button class="btn-edit">
                                            <span class="material-symbols-outlined">
                                                edit
                                            </span>
                                        </button>
                                    </a>
                                    <form action="{{route('category.delete', $cat->id)}}" method="POST">
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
        </div>
    </div>

    
@endsection