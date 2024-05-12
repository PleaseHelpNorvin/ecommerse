@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="form-container">
            <form action="{{route('adminProductForm.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="productName">Product Name:</label>
                    <input type="text" id="productName" name="productName">
                    @error('productName')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description"></textarea>
                    @error('description')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="color_id">Color:</label>
                    <select id="color_id" name="color_id">
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                        @endforeach
                    </select>
                    @error('color_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="stockQuantity">Stock Quantity:</label>
                    <input type="number" id="stockQuantity" name="stockQuantity">
                    @error('stockQuantity')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price">
                    @error('price')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imageUpload">Image:</label>
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

        input[type="text"],
        textarea,
        select,
        input[type="number"] {
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
