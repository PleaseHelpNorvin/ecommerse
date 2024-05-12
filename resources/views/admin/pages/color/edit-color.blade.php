@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="form-container">
            <form action="{{ route('editColorForm.post', $colors->id) }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                <div class="form-group">
                    <label for="colorName">Color Name:</label>
                    <input type="text" id="colorName" name="colorName" value="{{ $colors->name }}">
                </div>
                <div class="form-group">
                    <label for="colorCode">Color Code:</label>
                    <input type="text" id="colorCode" name="colorCode" value="{{ $colors->code }}">
                </div>
                <button type="submit">Update Color</button>
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
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }
        .form-group{
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