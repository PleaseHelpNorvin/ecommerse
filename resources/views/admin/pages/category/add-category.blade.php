@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="form-container">
            <form action="{{ route('adminCategoryForm.post') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="categoryName">Category Name:</label>
                    <input type="text" id="categoryName" name="categoryName">
                    @error('categoryName')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imageUpload">Image Upload:</label>
                    <input type="file" id="imageUpload" name="imageUpload">
                    @error('imageUpload')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <style>
        .form-container {
            margin-top: 20px;
            /* border: 1px solid black; */
            /* width: 100%; */
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            /* background-color: #f2f2f2; */
            padding: 20px;
            border-radius: 10px;
            align-items: center;
            width: 300px;
        }
        .form-group{
            /* border: 1px solid black; */
            margin: 5px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

@endsection