@extends('admin.layout.layout')
@section('main-container')
    <div class="page-wrapper">
        <div class="form-container">
            <form action="{{route('adminColorForm.post')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="colorName">Color Name:</label>
                    <input type="text" id="colorName" name="colorName">
                </div>
                <div class="form-group">
                    <label for="colorCode">Color Code:</label>
                    <input type="text" id="colorCode" name="colorCode">
                </div>
                <button type="submit">Add Color</button>
            </form>
        </div>
    </div>
    <style>
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

    </style>
@endsection
