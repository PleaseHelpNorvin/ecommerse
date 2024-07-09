<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landing Page</title>
    <style>
        body {
            height: 100vh;
            width: 100%;
            background: #038183;
            font-family: sans-serif;
            text-align: center;
            color: white;
            font-size: 24px;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        header {
            background: #2e354f;
            padding: 1.5em 0;
        }

        .main {
            height: 671px;
            display: flex;
            flex: 1;
        }

        .left {
            background: #41c1ba;
            width: 50%;
            padding: 1.5em 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .right {
            background-image: url('{{ asset('backround.png') }}'); /* Change 'your-image.jpg' to your actual image path */
            background-size: cover;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #333;
            padding: 1.5em;
            text-align: center;
        }

        .Shop-now-btn {
            background: #1d4355;
            color: white;
            border: 0;
            border-radius: 20px;
            padding: 0.9em 2.5em;
            margin-top: auto;
            text-decoration: none;
        }

        .Shop-now-btn:hover {
            background: #f2f1ec;
            color: black;
            transition: 0.5s;
        }

        .picture-container {
            display: flex;
            flex-direction: row;
            padding: 3em 0 0 0;
            margin: 0;
            width: 100%;
            height: 100%;
            /* overflow: hidden; */
        }

        .left-picture{
            justify-content: right;
        }
        .left-picture,
        .right-picture {
            padding: 0;
            margin: 0;
            flex: 1;
            display: flex;
            /* justify-content: center; */
            align-items: center;
            /* border: 1px */
        }

        .left-animated-image {
            height: 150px;
            width: 150px;
            animation: leftupslide 5s infinite alternate;
        }
        .right-animated-image {
            height: 150px;
            width: 150px;
            animation: rightupslide 5s infinite alternate;
        }
        .right-animated-image,.left-animated-image{
            margin: 0;
            padding: 0;
            /* border: 1px solid black; */
            border-radius: 50%;
        }

        @keyframes leftupslide {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-50%);
            }
        }
        @keyframes rightupslide {
            0% {
                transform: translateY(-50%);
            }

            100% {
                transform: translateY(0);
            }
        }
        @media (max-width: 450px){
            .main{
                display: flex;
                flex-direction: column;
            }
            .left,.right{
                width: 100%;
                height: 100%;
            }
        }
        @media (max-width: 800px){
            .main{
                display: flex;
                flex-direction: column;
            }
            .left,.right{
                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>

<body>
    {{-- <header>
        HEADER
    </header> --}}
    <div class="main">
        <aside class="left">
            <div class="picture-container">
                <div class="left-picture">
                    {{-- left --}}
                    <img src="{{ asset('tatoy.png')}}" class="left-animated-image" alt="Image 1">
                </div>
                <div class="right-picture">
                    {{-- right --}}
                    <img src="{{ asset('tatoy.png')}}" class="right-animated-image" alt="Image 1">
                </div>
            </div>
        </aside>
        <aside class="right">
            <h2 style="margin-bottom: 1rem; color: black;">Discover Products</h2>
            <p style="font-size: 20px; margin-bottom: 2rem; color: black;">For a Life Well Lived</p>
            <a href="{{ route('login.view') }}" class="Shop-now-btn">Shop Now</a>
        </aside>
    </div>
</body>

</html>
