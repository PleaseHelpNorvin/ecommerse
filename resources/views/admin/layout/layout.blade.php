<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.header')
</head>

<body>
    <div class="side-nav">
        @include('admin.includes.sidenav')
    </div>
    <div class="wrapper">
        <div class="overlay"></div>
        <nav>
            @include('admin.includes.nav')
        </nav>
        <div class="mobileSearch-container">
            test
        </div>
        <main>
            <div class="main-container">
                @yield('main-container')
            </div>
        </main>
    </div>
    <script>
        function toggleMobileNav() {
            const mobileNav = document.querySelector('.mobile-nav');
            mobileNav.classList.toggle('show');

            const overlay = document.querySelector('.overlay');
            overlay.classList.toggle('show');
        }

        function closeMobileNavOnClickOutside(event) {
            const mobileNav = document.querySelector('.mobile-nav');
            const toggleButton = document.querySelector('.hamburger');
            if (!mobileNav.contains(event.target) && !toggleButton.contains(event.target)) {
                mobileNav.classList.remove('show');

                const overlay = document.querySelector('.overlay');
                overlay.classList.remove('show');
            }
        }

        function toggleSlideBody() {
            let slideBody = document.querySelector('.slide-body-container');
            slideBody.classList.toggle('active');
        }
        function secondToggleSlideBody() {
            let slideBody = document.querySelector('.second-slide-body-container');
            slideBody.classList.toggle('active');
        }
        function mobileToggleSlideBody() {
            let slideBody = document.querySelector('.mobile-slide-body-container');
            slideBody.classList.toggle('active');
        }
        function secondMobileToggleSlideBody() {
            let slideBody = document.querySelector('.mobile-second-slide-body-container');
            slideBody.classList.toggle('active');
        }

        function toggleProfileDropdown(){
            let mobileDropdown = document.querySelector('.profile-dropdown-content');
            mobileDropdown.classList.toggle('active');
        }


        function toggleSearch() {
        const mobileSearch = document.querySelector('.mobileSearch-container');
        const searchToggle = document.querySelector('.search-toggle');
        const searchIcon = searchToggle.querySelector('.material-symbols-outlined');
        
        mobileSearch.classList.toggle('show');
        
        if (mobileSearch.classList.contains('show')) {
            searchIcon.textContent = 'close';
        } else {
            searchIcon.textContent = 'search';
        }
    }

        function hideSearch() {
            const mobileSearch = document.querySelector('.mobileSearch-container');
            mobileSearch.classList.remove('show');
        }

                document.addEventListener("DOMContentLoaded", function() {
            var tdElements = document.querySelectorAll(".table tbody tr td");

            tdElements.forEach(function(td) {
                // Check if content overflows
                if (td.scrollWidth > td.clientWidth) {
                    td.classList.add("truncate-text"); // Add a class for styling
                }
            });
        });


        document.querySelector('.profile-dropdown-img').addEventListener('click', toggleProfileDropdown);
        document.querySelector('.mobile-slide-head-container').addEventListener('click', mobileToggleSlideBody);
        document.querySelector('.mobile-second-head-container').addEventListener('click', secondMobileToggleSlideBody);
        document.querySelector('.slide-head-container').addEventListener('click', toggleSlideBody);
        document.querySelector('.second-head-container').addEventListener('click', secondToggleSlideBody);
        document.querySelector('.search-toggle').addEventListener('click', toggleSearch);
        document.querySelector('.hamburger').addEventListener('click', toggleMobileNav);
        document.addEventListener('click', closeMobileNavOnClickOutside);
    </script>
</body>
<style>
    /* layout styles */
    .truncate-text {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        width: 100%;
        font-family: "poppins", sans-serif;
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 100%;
        /* border: 1px solid skyblue; */
    }

    nav,
    main,
    footer {
        /* flex: 1; */
    }

    nav {
        height: 65px;
        min-height: 60px;
        background-color: #82ddd9;
        display: flex;
        align-items: center;
        /* justify-content: space-between; */
        padding: 0 20px 0 30px;
        /* z-index: 0; */
    }
    .nav-spacer{
        width: 100%;
    }

    main {
        background: #f2f1ec;
        max-height: calc(100% - 65px);
        height: 100%;
        box-sizing: border-box;
    }

    .main-container {
        padding: 10px 10px 10px 10px;
        overflow-y: auto;
        height: calc(100% - 22px);
        background: #f2f1ec;

        /* border: 1px solid black; */
    }
    .main-container::-webkit-scrollbar{
        display: none;
    }

    .side-nav {
        width: 18%;
        /* Adjust width as needed */
        min-width: 300px;
        background-color: #41c1ba;
        transition: width 4s ease;
        z-index: 4;
    }

    .sidenav-header {
        /* border: 1px solid black; */
        padding: 10px;
        height: 60px;
    }

    /* header */
    .search-container {
        border: 1px solid black;
        height: 70%;
        width: 400px;
    }
    .profile-dropdown {
        /* background: #41c1ba; */
        display: flex;
        flex-direction: column;
        /* border: 1px solid white; */
        justify-items: center;
        align-items: center;
        position: relative; /* Needed for absolute positioning */
        cursor: pointer;
    }

    .profile-dropdown img{
        height: 50px;
        width: 50px;
        border-radius: 100px;
    }

    .profile-dropdown-content{
        display: none;
        flex-direction: column;
        /* justify-content: center; */
        padding: 10px 0 10px 0 ;
        align-content: flex-start;
    }
    .profile-dropdown-content a{
        display: flex;
        /* align-items: a; */
        justify-content: center;
    }
    .profile-dropdown-content.active {
        background: #82ddd9;
        margin-top: 55px;
        height: 100px;
        width: 88px;
        position: absolute;
        z-index: 999; /* Increased z-index */
        display: block;
    }

    nav .material-symbols-outlined {
        display: none;
    }

    .mobile-nav {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 30%;
        height: 100%;
        background-color: #41c1ba;
        transition: width 4s ease;
        overflow-y: auto;
    }
    .mobile-nav::-webkit-scrollbar{
        display: none;
    }

    .overlay {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        width: 60%;
        max-width: 60%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
        z-index: 1;
    }

    .sidenav-main {
        /* border: 1px solid black; */
        width: 100%;
        /* height: calc(100% - 100px); */
    }

    /* .slide-head-container:hover,
    .second-head-container:hover, */
    .sidenav-content:hover,
    .slide-wrapper a:hover {
        background: #f2f1ec;
        
    }
    .sidenav-content-slide-container:hover,
    .second-sidenav-content-slide-container:hover,
    .mobile-slide-head-container:hover,
    .mobile-second-head-container:hover{
        color: #f2f1ec;
        /* font */
    }
    .second-head-container.active,
    .slide-head-container.active,
    .mobile-slide-head-container.active,
    .mobile-second-head-container.active{
        color: #f2f1ec;
    }
    .sidenav-content.active{
        background: #f2f1ec;

    }
    .search-toggle {
        padding: 0 0 0 10px;
        display: none;
    }
    .search-toggle.show{
        border: 1px solid brown;
        display: none;
    }
    .mobileSearch-container{
        /* border: 1px solid black; */
        background: red;
        margin-top: 60px;
        width: 100%;
        height: 50px;
        position: absolute;
        display: none;
    }
    .mobileSearch-container.show{
        display: none;
    }
    /* side nav content */
    .sidenav-content{
        /* border: 1px solid black; */
        display: flex;
        flex-direction: row;
        justify-content: start;
        align-items: center;
        padding: 10px;
        height: 10%;
        min-height: 60px;
    }

    .second-slide-body-container.active,
    .slide-body-container.active{
        display: block;
    }
    .slide-wrapper.active{
        background: #f2f1ec;
    }

    .mobile-second-sidenav-content-slide-container,
    .mobile-sidenav-content-slide-container,
    .second-sidenav-content-slide-container,
    .sidenav-content-slide-container{
        /* display: flex;
        flex-direction: column; */
        /* justify-content: center;
        height: 10%; */
        padding: 10px 0 10px 10px;
        min-height: 45px;

        /* border: 1px solid black; */
    }
    
    .mobile-second-head-container,
    .mobile-slide-head-container,
    .second-head-container,
    .slide-head-container,
    .second-slide-body-container {
        display: flex;
        flex-direction: row;
        justify-content: start;
        align-items: center;
        cursor: pointer;
        /* border: 1px solid black; */
        /* height: 100%; */
    }

    .mobile-second-slide-body-container,
    .mobile-slide-body-container,
    .second-slide-body-container,
    .slide-body-container{
        display: none;
    }

    .mobile-second-slide-body-container.active,
    .mobile-slide-body-container.active,
    .second-slide-body-container.active,
    .slide-body-container.active{
    /* display: block; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 100%;
        gap: 5px;
    }

    .mobile-second-slide-body-container a,
    .mobile-slide-body-container a,
    .second-slide-body-container a,
    .slide-body-container a{
        /* margin-left: 10px; */
        display: flex;
        justify-content: start;
        align-items: center;
        /* border: 1px solid black; */
        width: 100%;
    }
    .slide-wrapper .material-symbols-outlined,
    .sidenav-content .material-symbols-outlined,
    .slide-head-container .material-symbols-outlined,
    .second-head-container .material-symbols-outlined{
        margin: 0 5px 0 5px;
    }
    .slide-wrapper{
        padding: 0;
        /* border: 1px solid black; */
        width: 100%;
        height: 50px;
        display: flex;
        flex-direction: row;
        

    }
    .slide-line{
        /* border-right: 4px solid black; */
        /* background: white; */
        width: 10%;
        /* height: 100%; */
        min-width: 4;
        display: inline-block;

    }


    .sidenav-content ,
    .sidenav-content ,
    .mobile-slide-head-container,
    .mobile-second-head-container,
    .mobile-second-slide-body-container ,
    .mobile-slide-body-container ,
    .second-slide-body-container ,
    .slide-body-container ,
    .slide-head-container ,
    /* .slide-head-container , */
    .second-head-container,
    .slide-wrapper a,
    .sidenav-content a,
    .second-slide-body-container a{
        font-size: 20px;
        text-decoration: none;
        /* background: red; */
    }
    .mobile-slide-body-container,
    .mobile-second-slide-body-container,
    .slide-body-container,
    .second-slide-body-container
{
        
    }
    /* content */
    .page-wrapper{
        /* border: 1px solid black; */
        background: #f2f1ec;
        height: calc(100% - 2px);
        /* width: 100%; */
        /* max-height: calc(100% - 2px); */
        /* border-radius: 10px; */
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        overflow: auto;
        /* padding: 10px; */
    }
    .page-wrapper::-webkit-scrollbar{
        display: none;
    }
    .page-header-wrapper{
        /* border: 1px solid black; */
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .table img{
        /* border: 1px solid black; */
        height: 100px;
        width: 100px;
    }
    .table{
        /* border: 1px solid black; */
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        text-emphasis: wrap;
        text-overflow: ellipsis;

        /* border-radius: 100px; */

        margin-top: 10px;
    }
    .table thead{
        background: #82ddd9;
        color: #fff;
    }
    .table thead tr th{
        font-size: 0.9rem;
        padding: 0.8rem;
        letter-spacing: 0.2rem;
        vertical-align: top;
        border: 1px solid white
    }
    .table tbody tr td{
        font-size: 1rem;
        letter-spacing: 0.2rem;
        font-weight: normal;
        text-align: center;
        /* border: 1px solid black; */
        /* background: #f2f1ec; */
        /* display: flex; */
        border: 1px solid white;
        padding: 0.4rem;
    }
    .table  .td-flex{
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 10px;
        /* td */
    }

    .table tr:nth-child(even){
        background: #fcfcfb;
    }
    .table tr:hover td{
        background: #82ddd9;
        color: #000000;
        transition: all 0.3s ease-in-out;
        cursor: pointer;
    }
    .table button{
        display: inline-block;
        border: none;
        margin: 0 auto;
        padding: 0.4rem;
        border-radius: 10px;
        outline: none;
        cursor: pointer;
    }
    .btn-delete{
        background: red;
        color: white;
    }
    .btn-edit{
        background: #41c1ba;
        color: white;
    }
    .btn-view{
        background: #82ddd9;
        color: white;
    }
    /* Order Page Styles */

    .order-nav{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 100%;
        /* width: calc(100% - 15px); */
        /* border:1px solid black; */
        margin-top: 10px;
        border-radius: 10px;
        /* padding: 0 10px 0 10px; */
    }

    .order-nav a{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        /* border-radius: 10px; */
        text-decoration: none;
        background: #41c1ba;
        color: aliceblue;
        height: 40px;
        
        /* padding: 10px; */
        /* margin: 0 10px; */
    }


    .order-nav a:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .order-nav a:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .page-search-container{
        /* border: 1px solid black; */
        width: 30%;
        height: 35px;
        border-radius: 5px;
        background: #fff;
        display: flex;
        flex-direction: row;
        justify-content: center;
        /* margin: 0px 0 10px 0; */
    }
    .page-search-container form{
        width: 100%;
        /* height: calc(100% - 0px); */
        height: 100%;
        border-radius: 5px;
        display: flex;
        flex-direction: row;
    }
    .page-search-container input{
        border-radius: 5px;
        width: 100%;
        border:none;
        outline: none;
    }
    
    .page-search-container button{
        border: none;
        border-radius: 5px;
        background: #fff;
        cursor: pointer;
    }
    
    .page-btn{
        /* border: 1px solid black; */
        background: #41c1ba;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        /* max-width: 280px; */
        height: 40px;
        text-decoration: none;
        border-radius: 5px;
        /* width: 10%S; */
    }
    .card-wrapper{
        /* border: 1px solid red; */
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        gap: 10px;
        height: auto;
    }
    .count-card-div{
        /* border: 1px solid black; */
        height: 100px;
        width: 300px;
        border-radius: 5px;
        /* margin: 10px; */
        display: flex;
        justify-content: center;
        align-items: center;
        /* box-shadow: #000000; */
        color: #fff;
        background: #82ddd9;
    }
    .count-card-div:nth-child(even) {
        /* Add your styles for even elements here */
        background-color: #41c1ba; /* Example background color */
    }
    .dashboard-content-container{
        /* border: 1px solid black; */
        margin-top: 10px;
        height: auto;
        /* background: #fff; */
        /* overflow: auto; */
        padding: 5px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

        /* gap: 5px; */
    }
    
    .chart-container{
        /* border: 1px solid black; */
        background: #82ddd9;
        width: 500px;
        height: 500px;
        margin: 2px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .pagination-container {
        display: flex;
        justify-content: center;
        /* width: 100%; */
        /* border: 1px solid black; */
        border-radius: 5px;
        background: #82ddd9;
        text-align: center;
        margin-top: 20px; /* Adjust the margin as needed */
    }

    .pagination-container .pagination {
        display: inline-block;
        padding: 0;
        margin: 0;
        
    }

    .pagination-container .pagination li {
        display: inline;
        margin: 0;
    }

    .pagination-container .pagination li a {
        display: inline-block;
        padding: 5px 10px;
        text-decoration: none;
        color: #333;
        border: 1px solid #ccc;
        margin-right: 5px;
        border-radius: 3px;
    }

    .pagination-container .pagination li a.active {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination-container .pagination li a:hover {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }
    .pagination-container nav{
        /* border: 1px solid black; */
        width: 200px;
        justify-content: center;
    }
    .pagination-container a{
        /* border: solid black; */
        padding: 20px
    }

    .orderlist-container{
        /* border:1px solid black; */
        border-radius: 5px;
        background: white;
        padding: 10px;
        height: 100%;
        display:flex;
        flex-direction: column;
        justify-content: flex-start;
        gap: 10px;
        overflow: auto;
        
    }
    .orderlist-container::-webkit-scrollbar{
        display: none;
    }
    .orderitem-container{
        border: 1px solid red;
        border-radius: 10px;
        background: #41c1ba;
        height: 150px;
        min-height: 150px;
        display: flex;
        flex-direction: row;
    }
    .page-head-container{
        margin-bottom: 10px;
        /* border: 1px solid black; */
        display: flex;
        align-items: center;
        flex-direction: row;
        gap: 10px;
    }
    .image-container{
        width: 150px;
        min-width: 150px;
        max-width: 150px;
        height: 100%;
        max-height: 150px;
        /* border: 1px solid black; */
    }
    .image-container img{
        width: 100%;
        height: 100%;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .name-container,
    .color-container,
    .price-container,
    .quantity-container{
        /* border:1px solid black; */
        width: 100%;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    /* .page-head-container {

    } */

    /* media for small screens */
    @media(max-width: 1024px) {
        .chart-container{
            width: 300px;
            height: 300px;
        }
        .page-search-container{
            width: 50%;
            height: 50px;
        }
        .side-nav {
            display: none;
        }
        nav .material-symbols-outlined{
            display: block;
            margin-right: 10px;
            cursor: pointer;

        }
        
        .mobile-nav {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 55%;
            /* min-width: 250px; */
            z-index: 2;
            height: 100%;
            background-color: #41c1ba;
        }
        .mobile-nav.show{
            display: block;
        }
        /* Show the overlay when mobile-nav is open */
        .mobile-nav.show+.overlay,
        .overlay.show {
            display: block;
        }


    }
    @media(max-width: 768px) {
        .chart-container{
        /* border: 1px solid black; */
        background: #82ddd9;
        width: 300px;
        height: 300px;
        margin: 2px;
    }
    .page-btn{
        margin-top: 10px;
    }

    .table tbody tr td {
        width: 100%;
        /* overflow: hidden; */
        /* white-space: nowrap; Prevent text from wrapping */
        /* text-overflow: ellipsis; Truncate text with ellipsis */
        max-width: calc(100% - 15px);
        /* max-width: 200px; */
    }

    .main-container {
        padding: 10px 10px; 
    }

    .table-container {
        /* border: 1px solid black; */
        overflow-x: auto;
        /* overflow-y: none; */
    }
    .table-container::-webkit-scrollbar{
        display: none;
    }

    .table {
        /* display: flex; */
        overflow: auto;
        width: 100%;
    }
    .table:-webkit-scrollbar{
        display: none;
    }

    .mobile-nav {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 45%;
        z-index: 2;
        height: 100%;
        background-color: #41c1ba;
    }

    .mobile-nav.show {
        display: block;
        transition: width 4s ease;
    }

    /* Show the overlay when mobile-nav is open */
    .mobile-nav.show+.overlay,
    .overlay.show {
        display: block;
    }

    .search-toggle.show {
        display: none;
    }

    .order-nav {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .order-nav a {
        justify-content: flex-start;
        margin: 0 10px;
    }

    .order-nav a:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 0;
    }

    /* Apply border-radius to the last child */
    .order-nav a:last-child {
        border-top-right-radius: 0;
        border-bottom-right-radius: 10px;
    }

    .table thead {
        display: none; /* Hide table header on smaller screens */
    }

    .table tr,
    .table td {
        display: block;
        width: 100%;
        /* max-width: calc(100% - 50px); */
    }

    .table tr {
        /* Add border to table rows for better visibility */
        margin-bottom: 10px; /* Add margin between table rows for better spacing */
        width: 100%;
    }
    .page-search-container{
        width: calc(100% - 4px);
        height: 50px;
        min-height: 50px;
        margin: 10px 0 0px 0;
    }
}


    @media(max-width: 431px) {
        /* .page-search-container{
            width: 100%;
            height: 50px;
            margin: 10px 0 10px 0;
        } */

        .body{
            width: 100%;
        }
        .search-container {
            display: none;
        }
        .mobile-nav {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 60%;
            /* min-width: 250px; */
            z-index: 2;
            height: 100%;
            background-color: #41c1ba;
            overflow-y: auto;
        }
        /* .mobile-nav:: { */
        
        /* } */
        .search-toggle {
            display: block;
        }
        .search-toggle.show{
            display: block;
        }
        .mobileSearch-container.show{
            display: block;
        }
    }
</style>

</html>
