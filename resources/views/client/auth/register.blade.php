<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>
    <style>
        html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
        }

        a{
            text-decoration: none;
            color: black;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f2f2f2;
        }

        .container {
            background: #82ddd9;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #41c1ba;
        }

        .form-container input[type="text"],
        .form-container input[type="password"],
        .form-container input[type="email"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #82ddd9;
            height: 30px;
            width: 100%;
            border: none;
            outline: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #41c1ba;
            color: white;
        }
        .text-danger{
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form class="register-form" action="{{ route('register.post')}}" method="POST">
                @csrf
                <h2>Register</h2>
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username" >
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" >
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email Address" >
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="fullname" placeholder="Full Name" >
                    @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="phonenumber" placeholder="Phone Number" >
                    @error('phonenumber')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" value="Register">
            </form>
            <p>have an account? <a href="{{route('login.view')}}">Login now!</a></p>
        </div>
    </div>
</body>

</html>
