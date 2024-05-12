<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
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
        }

        .container {
            background: #82ddd9;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-form {
            width: 300px;
            padding: 20px;
            border-radius: 5px;
            background-color: #41c1ba;
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-form input[type="submit"] {
            background-color: #82ddd9;
            color: white;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error{
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <form class="login-form" action="{{route('login.auth')}}" method="POST">
            @csrf
            <h2>Login</h2>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" >
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" >
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            @if(session('message'))
                <div class="error">{{ session('message') }}</div>
            @endif
            <input type="submit" value="Login">
            <p>No account? <a href="{{route('register.view')}}">Register here!</a></p>
        </form>
    </div>
</body>

</html>
