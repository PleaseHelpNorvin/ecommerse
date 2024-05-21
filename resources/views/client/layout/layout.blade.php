<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.includes.header')
</head>

<body>
    <header>
        @include('client.includes.nav')
    </header>
    <main>
        @yield('main')
    </main>
    {{-- <footer>
        @include('client.includes.footer')
    </footer> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const username = getUsernameFromURL();

            if (window.location.pathname === `/client/cart/${username}`) {
                const leftContainer = document.getElementById('product-left-container');
                const rightContainer = document.getElementById('product-right-container');

                if (leftContainer && rightContainer) {
                    leftContainer.addEventListener('scroll', function() {
                        rightContainer.scrollTop = leftContainer.scrollTop;
                    });

                    rightContainer.addEventListener('scroll', function() {
                        leftContainer.scrollTop = rightContainer.scrollTop;
                    });
                } else {
                    console.error('One or both containers not found.');
                }
            }
        });

// Function to extract the username from the URL
    function getUsernameFromURL() {
        // Split the pathname by '/' and get the last segment
        const segments = window.location.pathname.split('/');
        return segments[segments.length - 1];
    }

        document.addEventListener('DOMContentLoaded', function() {
            const menu_btn = document.querySelector('.hamburger');
            const mobile_menu = document.querySelector('.mobile-nav');
            const close_menu_btn = document.querySelector('.close-menu');

            menu_btn.addEventListener('click', function() {
                // console.log('Menu button clicked');

                menu_btn.classList.toggle('is-active');
                mobile_menu.classList.toggle('is-active');
            });

            close_menu_btn.addEventListener('click', function() {
                menu_btn.classList.remove('is-active');
                mobile_menu.classList.remove('is-active');
            });
        });

        function flipProductItem(element) {
            // Find the closest parent with the class 'mobile-product-item-container'
            var container = element.closest('.mobile-product-item-container');
            if (container) {
                // Toggle the 'flipped' class for the found container
                container.classList.toggle('flipped');
            }
        }
    </script>
</body>
<style>
    .wrapper{
        width: 100%;
        background: #f2f1ec;
        /* border: 1px solid black; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .orderitems-header{
        /* border: 1px solid black; */
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }
    .orderitems-link{
        border: none;;
        border-radius: 5px;
        outline: none;
        background: #41c1ba;
        width: 100px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 10px 10px 0;

    }
    /* .orderitems-spacer{
        width: 100%;
    } */
    .orderitem-container{
        /* border:1px solid black; */
        background:#41c1ba;
        height: 100%;
        width: 100%;
        padding: 5px;
        overflow: auto;
    }
    .orderitem-container::-webkit-scrollbar{
        display: none;
    }
    .orderitems{
        /* border: 1px solid red; */
        border-radius: 5px;
        background: #f1f1f1;
        height: 120px;
        margin-bottom: 5px;
        display: flex;
        justify-content: center;
    }
    .orderitems-divider{
        /* border: 1px solid black; */
        /* border-radius: 5px; */

        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .orderitems-divider:first-child{
        /* border: 1px solid BLUE; */
        width: 150px;
    }
    .orderitems-divider img{
        border-radius: 5px;
        height: 100%;
        min-width: 150px;
        max-width: 150px;
    }


    .order-header{
        /* border: 1px solid black; */
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        background: #41c1ba;
        display: flex;
        flex-direction: row;

        width: 100%;
        height: 40px;
    }
    .order-divider{
        /* border: 1px solid red; */
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .order-container{
        /* border: 1px solid black; */
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        background: #82ddd9;
        width: 100%;
        height: 100%;
        padding: 10px;
        overflow: auto;
    }
    .order-container::-webkit-scrollbar{
        display: none;
    }

    .order-item{
        /* border: 1px solid black; */
        border-radius: 5px;
        background: #f1f1f1;
        height: 200px;
        margin-bottom: 10px;
        padding: 5px;
        display: flex;
        flex-direction: row;
    }
    .order-image{
        /* border: 1px solid black; */
        height: 100%;
        /* width: 300px; */
    }
    .order-image img {
        border-radius: 10px;
        height: 100%;
        /* min-height: 180px; */
        max-width: 180px;
        width: 100%;
        /* min-width: 300px; */
        /* max-width: 300px; */
    }
    .order-name,
    .order-color,
    .order-quantity,
    .order-price,
    .order-action,
    .order-color{
        /* border: 1px solid black; */
        flex: 1;
        display: flex;
        justify-content: center;
        overflow: hidden;
        align-items: center;
        width: 100%;
    }
    .order-action{
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        /* border: 10px; */
    }
    .order-action button, .order-action a{
        border: none;
        outline: none;
        cursor: pointer;
        height: 50px;
        width: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
    }
    .order-action button{
        background: red;
    }
    .order-action a{
        background: #41c1ba;
    }


    .checkoutform-container{
        border: 1px solid red;
        width: 90%;
        height: 90%;
        border-radius: 10px;
        background: #82ddd9;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .checkoutform-group{
        display: flex;
        flex-direction: column;
        padding: 10px;
        border: 1px solid black;
    }
    .checkoutform-group input{
        outline: none;
        border: none;
    }


    
    /* =====================entercode-roots================== */

    .products-right-container,
    .products-left-container {
        /* border: 1px solid black; */
        height: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .img-option {
        display: flex;
        flex-direction: column;
        border-right: 1px solid #41c1ba;
    }

    .img-option img {
        height: 50px;
        width: 50px;
    }

    .product-view-img-container {
        /* border: 3px solid burlywood; */
        border-radius: 20px;
        display: flex;
        padding: 10px;
        
        /* height: calc(100vh - 250px); */
        /* width: calc(100vw - 350px); */
        width: 100%;

        flex-direction: row;
        justify-content: center;
        align-items: center;
    }

    .product-view-img-container img {
        border-radius: 20px;
        /* z-index: -1; */
        height: 100%;
        max-height: 35em;
        width: 100%;
    }

    .products-right-container .product-desc {
        /* height: 100%; */
        /* border: 1px solid green; */
        font-weight: normal;
        /* overflow: hidden; */
        padding: 10px;
        display: flex;
    }

    .product-view-text-container {
        /* border: 1px solid black; */
        height: calc(100vh - 150px);
        background: #ffffff;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        border-radius: 20px;
        width: 100%;
        padding: 15px;
        /* justify-content: center; */
    }

    .product-name,
    .product-price,
    .product-desc,
    .product-color-h5,
    .product-color,
    .product-number,
    .product-add {
        /* border: 1px solid darkorchid; */
        /* height: 15%; */
        width: 100%;
        
    }

    .product-color {
        /* width: 50% */
        display: flex;
        flex-direction: row;
    }

    .product-color span {
        border: 1px solid black;
        border-radius: 100px;
        width: 50px;
        height: 50px;
    }

    .product-price,
    .product-color-h5,
    .product-number {
        font-size: 24px;
    }

    .product-add {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 5px;
    }

    .product-add label {
        /* flex */
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid black;
        border-radius: 20px;
        padding: 0 20px;
        height: 30px;
    }

    .product-add span {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        border: 1px solid black;
        border-radius: 100px;
        width: 30px;
        height: 30px;
    }

    .product-price {
        margin: 0 0 10px 10px;
    }

    .product-name,
    .product-color span,
    .product-add span,
    .product-add label {
        margin: 10px 0 10px 10px;
    }

    .product-color-h5,
    .product-number {
        margin-left: 10px;
    }

    .product-name {
        font-size: 64px;
    }

    .product-addtocart {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        /* border: 1px solid black; */
        /* width: 100% */
    }

    .product-addtocart button {
        margin: 10px;
        background: #41c1ba;
        color: white;
        border: none;
        border-radius: 10px;
        outline: none;
        height: 50px;
        width: 150px;
    }

    /* =====================entercode-roots================== */
    .entercode-form-container {
        border-radius: 20px;
        margin: 2rem;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-items: center;
        /* border: 2px dotted blue; */
        background: #ffffff;
    }

    .entercode-container {
        display: flex;
        justify-content: center;
        align-content: center;
        /* border: 2px solid black; */
        height: 100%;
        width: 100%;
        background: #41c1ba;
    }

    /* =====================Cart-roots================== */
    .cart-container {
        display: flex;
        flex-direction: column;
        /* border: 2px solid black; */
        height: calc(100vh - 64px);
        
        width: 100%;
        
    }
    .cart-container form{
        height: 100%;
    }


    .product-item-img-check {
        display: none;
    }

    .cart-main-container {
        display: flex;
        flex-direction: row;
        width: 100%;
        /* border: 2px solid darkgreen; */
        height: 90%;
    }

    .cart-right {
        background: #f2f1ec;
    }

    .cart-left {
        background: #41c1ba;
    }

    .cart-left,
    .cart-right {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .cart-head-left,
    .cart-head-right {
        background: hsla(0, 0%, 85%, 0.8);
        height: 40px;
        width: 100%;
        /* border: 1px solid lightslategray; */
        display: flex;
        align-items: center;
        padding: 0 10px 0 10px;
    }

    .cart-head-right {
        justify-content: space-between;
        display: flex;
    }

    .cart-head-left {
        background-color: hsl(173, 58%, 42%);
    }

    .cart-head-left p,
    .cart-head-right p {
        color: white;
    }

    .product-left-container,
    .product-right-container {
        background: #41c1ba;
        /* border: 1px dotted lightpink; */
        padding: 10px 10px 10px 10px;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        overflow-y: auto;
    }

    .mobile-product-left-container {
        background: #41c1ba;
        border: 1px dotted lightpink;
        padding: 10px 10px 10px 10px;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        /* gap: 20px; */
        /* margin-bottom: 50px; */
        overflow-y: auto;
    }

    .mobile-product-left-container::-webkit-scrollbar {
        display: none;
    }

    .mobile-product-left-container {
        display: none;
    }

    /* mobile cart flip */
    .mobile-product-item-container .back {
        /* width: */
    }

    .mobile-product-item-container {
        position: relative;
        width: 100%;
        height: 8rem;
        perspective: 1000px;

    }

    .mobile-product-item-container .unitPrice-container,
    .mobile-product-item-container .Quanity-container,
    .mobile-product-item-container .totalPrice-container,
    .mobile-product-item-container .Actions-container {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
    }


    .mobile-product-item-container .front,
    .mobile-product-item-container .back {
        display: flex;
        flex-direction: row;
        width: 100%;
        height: 100%;
        position: absolute;
        backface-visibility: hidden;
        border-radius: 20px;
        transition: transform 0.5s;
        background: white;
    }

    .mobile-product-item-container .front {
        transform: rotateX(0deg);
    }

    .mobile-product-item-container .back {
        transform: rotateX(180deg);
    }

    .mobile-product-item-container.flipped .front {
        transform: rotateX(-180deg);
    }

    .mobile-product-item-container.flipped .back {
        transform: rotateX(0);
    }


    .product-left-container::-webkit-scrollbar {
        display: none;
    }

    .product-right-container::-webkit-scrollbar {
        display: none;
    }

    .product-right-container {
        background: #f2f1ec;
        /* justify-content: space-between; */
        /* border: 1px dotted lightpink; */
    }



    .product-item-container {
        /* border: 1px solid black; */
        border-radius: 20px;
        background: white;
        width: 100%;
        height: 8rem;
        min-height: 8rem;
        padding: 0 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        /* HERE */
    }

    .product-item-container .material-symbols-outlined {
        display: none;
    }

    /* .mobile-product-item-container {
            border: 1px solid black;
        border-radius: 20px;
        background: white;
        width: 100%;
        height: 8rem;
        min-height: 8rem;
        padding: 0 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    } */
    .mobile-product-item-container .material-symbols-outlined {
        display: none;
    }

    .mobile-product-item-container {
        /* display: none; */
    }

    .mobile-product-item-container .back,
    .mobile-product-item-container .front {
        display: flex;
        /* border: 1px solid blue; */
    }

    /* .mobile-product-item-container .product-item-img,
    .mobile-product-item-container .product-item-name,
    .mobile-product-item-container .product-item-variation {
        display: flex;
        
        align-items: center;
        flex: 1;
        height: 100%;
        padding: 0 10px;
    } */

    .product-item-img ,
    .product-item-name p,
    .product-item-variation p {
        margin: 0;
        /* border: 1px solid blue; */
        /* Remove default margins */
    }
    .product-item-img img{
        width: 200px;
        height: 100px;
        border-radius: 10px;
    }

    .product-item-img ,
    .product-item-name,
    .product-item-variation {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 1;
        height: 100%;
        width: 100%;
        /* border: 1px solid black; */
        padding: 0 10px;
    }

    .product-item-img ,
    .product-item-name p,
    .product-item-variation p {
        margin: 0;
        /* Remove default margins */
    }

    .cart-footer {
        display: flex;
        flex-direction: column;
        height: 10%;
        min-height: 0;
        transition: height 0.5s ease;
        z-index: 1;
        background: white;
    }

    /* .cart-footer-head, */
    .cart-footer-main,
    .cart-footer-footer {
        height: 100%;
        /* min-height: 80px; */
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        /* box-shadow: 20px black; */
        border: 1px solid black;
        /* border-bottom: 3px dashed gray; */
    }
    .cart-footer-footer form{
        display: flex;
        justify-content: flex-end;
        align-items: center;
        width: 100%;
    }

    .cart-footer-main {
        opacity: 0;
        height: 0;
        display: flex;
        flex-direction: row;
        align-items: center;
        overflow: hidden;
        transition: opacity 0.3s ease, height 0.3s ease;
    }

    .show-footer-main {
        opacity: 1;
        height: 100%;
    }

    /* .cart-footer-head {
        padding: 0 10px 0 10px;
        justify-content: flex-end;
    } */

    .cart-footer-head .enter-code-a {
        color: #41c1ba;
        text-decoration-line: underline;
    }

    .cart-footer.show-footer-main {
        height: auto;
        /* Auto height when .show-footer-main is active */
        transition: height 0.5s ease;
        /* Adjust transition for auto height */
    }

    .voucher-a {
        display: flex;
        flex-direction: row;
        margin-right: 100px;
        padding: 5px 0 5px 0;
        /* Adjust margin as needed */
    }

    .voucher {
        display: flex;
        flex-direction: row;
        color: white;
        text-decoration: none;
        background: #41c1ba;
        /* Set background color */
        padding: 10px 5px 10px 2px;
        /* Adjust padding as needed */
        border-radius: 5px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        text-transform: uppercase;
    }

    .voucher-icon {
        width: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-right: 2px dashed #f2f1ec;
        margin-right: 5px;
        /* Adjust margin as needed */
    }

    .material-symbols-outlined {
        font-size: 20px;
    }

    .cart-footer-main {
        padding: 0 10px 0 10px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
    }

    .cart-delete {
        margin: 0 50px 0 50px;
        border: none;
        background: white;
        color: red;
    }

    .cart-delete:hover {
        color: darkred;
    }

    .cart-footer-footer {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
    }

    .check-out-a {
        display: flex;
        margin: 5px 10px 5px 10px;
        background: darkcyan;
        color: white;
        width: 110px;
        height: 40px;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        border-radius: 50px
    }

    .cart-footer-footer p {
        color: black;
    }

    /* =====================Roots================== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: sans-serif;
        font-size: 16px;
    }


    html {
        width: 100%;
        height: 100vh;
        border: 2px solid rgb(0, 0, 0);
        /* min-width: 122px; */
        overflow: auto;
    }

    html::-webkit-scrollbar {
        display: none;
    }

    body {
        height: 100%;
        /* border: 1px dotted violet; */
    }

    header {
        background: #82ddd9;
        display: flex;
        flex-direction: row;
        align-items: center;
        /* border: 3px dashed skyblue; */
        height: 60px;
        margin: 0;
        padding: 0 25px 0 25px;
    }

    main {
        /* border: 2px solid royalblue; */
        display: flex;
        flex-direction: row;
        height: calc(100vh - 63px);
        background: #ffffff;
    }

    .left {
        background: #41c1ba;
        /* border: 3px dotted mediumspringgreen; */
        width: 50%;
        height: 100%;
        /* min-height: 100%; */
    }

    .left p,
    .right p {
        padding: 20px 0 20px 20px;
    }

    .right {
        background: #f2f1ec;
        /* border: 3px dotted midnightblue; */
        width: 50%;
        height: 100%;
    }

    footer {
        /* border: 1px solid red; */
        background: #f2f1ec;
        display: none;
    }

    /* =====================header/nav===================== */
    .profile-circular-image {
        display: flex;
        /* justify-content: center; */
        justify-items: flex-start;
        /* width: 100%; */
    }

    .profile-circular-image img {
        border-radius: 100px;
        /* border: 1px solid black; */
        height: 50px;
        width: 50px;
    }

    .profile-text {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-left: 10px;
        /* align-items: center; */
        justify-content: center;
    }

    .search-container {
        width: 30%;
        min-width: 500px;
        height: 40px;
        margin-left: 40px;
        margin-right: 40px;
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    .search-input-container {
        /* border: 1px solid black; */
        border-radius: 10px;
        background: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    .search-icon-btn {
        margin-left: 10px;
        margin-right: 10px;
        /* border: 1px solid blue; */
        outline: none;
        border: none;
        background: transparent;
        font-size: 24px;
        cursor: pointer;
    }

    .search {
        /* border: 1px solid blueviolet; */
        display: flex;
        align-items: center;
        height: 100%;
        width: 100%;
        border: none;
        /* background: #41c1ba */
    }

    .search-input {
        padding-left: 5px;
        border-radius: 10px;
        width: 100%;
        outline: none;
        height: 100%;
        border: none;
        /* border: 1px solid rgb(13, 228, 170); */
        /* box-sizing: border-box; */
    }

    .search-input-container form {
        width: 100%;
        height: 100%;

    }

    .cart-head-dropdown {
        width: 100%;
    }

    .cart-head-dropdown-btn {
        background-color: #f1f1f1;
        color: gray;
        position: relative;
        height: 100%;
        width: 100%;
        border: none;
        cursor: pointer;
        border-radius: 10px;
    }

    .cart-head-dropdown-content {
        display: none;
        position: relative;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }
    
    .cart-head-dropdown-content a{
        /* display: none; */
        color: #41c1ba;
    }
    
    .cart-head-dropdown-content.show {
        display: block;
        overflow: auto;
        /* height: 100px; */
        /* Adjust height as needed */
        transition: max-height 20s ease;
    }

    .cart-head-dropdown-content.show::-webkit-scrollbar {
        display: none;
    }


    .hamburger {
        display: none;
        width: 35px;
        height: 35px;
        cursor: pointer;

        appearance: none;
        background: none;
        border: none;
        outline: none;
    }

    .hamburger .bar,
    .hamburger:after,
    .hamburger:before {
        content: '';
        display: block;
        width: 100%;
        height: 5px;
        background: white;
        margin: 5px 0px;
        transition: 0.4s;
    }

    .close-menu {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: absolute;
        top: 0;
        right: 0;
        width: 60px;
        height: 60px;
        background: transparent;
        border: none;
        cursor: pointer;
        z-index: 99;
    }

    .mobile-nav .close-menu .material-symbols-outlined {
        width: 100%;
        height: 100%;
        border: none;
        /* background-color: none; */
        font-size: 50px;
        justify-content: center;
        align-content: center;
        background-color: transparent;
        margin: 15px 30px 10px 10px;
    }

    .hamburger.is-active:before {
        transform: rotate(-45deg) translate(-8px, 6px);
    }

    .hamburger.is-active:after {
        transform: rotate(45deg) translate(-8px, -7px);
    }

    .hamburger.is-active .bar {
        opacity: 0;
    }

    .mobile-nav {
        position: fixed;
        top: 0;
        left: 100%;
        width: 100%;
        min-height: 100vh;
        display: block;
        z-index: 98;
        background-color: #82ddd9;
        /* margin-top: 150px; */
        padding-top: 150px;
        transition: 0.4s;
    }

    .mobile-nav.is-active {
        left: 0;
    }

    .mobile-nav a,
    .mobile-nav .material-symbols-outlined {
        display: block;
        text-align: center;
        margin-bottom: 16px;
        width: 100%;
        max-width: 200px;
        margin: 0 auto 16px;
        padding: 12px 16px;
        background-color: aliceblue;

        color: black;
        text-decoration: none;
    }

    .mobile-nav a:hover,
    .mobile-nav .material-symbols-outlined:hover {
        background-color: aqua;

    }

    .ul-container {
        display: none;
    }

    ul {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        list-style-type: none;

        /* justify-items: space-between; */
    }
    li{
        height: 100%;
        /* border: 1px solid black; */
    }

    a {
        display: flex;
        flex-direction: column;
        text-align: center;
        text-decoration: none;
        color: white;
        font-size: 15px;
    }

    li span {
        display: inline-block;
        text-decoration: none;
        color: white;
    }

    li span:hover,
    a:hover {
        color: black;
    }

    .profile-nav-dropdown {
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
        position: relative;
    }

    .profile-nav-dropdown p {
        color: white;
    }

    .profile-nav-dropdown p:hover {
        color: black;
    }

    .profile-dropdown-content {
        position: absolute;
        top: 100%;
        width: 120px;
        justify-content: center;
        align-items: center;
        background-color: #ffffff;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        flex-direction: row;
        display: none;
        width: 150px;
        background: #82ddd9
    }

    /* Show dropdown when parent is hovered */
    .profile-nav-dropdown:hover .profile-dropdown-content {
        display: block;
    }

    /* Style links inside the dropdown */
    .profile-dropdown-content a {
        display: flex;
        align-items: center;
        flex-direction: row;
        padding: 10px;
        color: black;
        /* width: 200px; */
        /* Set link color */
        text-decoration: none;
        /* Remove underline */
    }
    .profile-dropdown-content span{
        padding-right: 5px;
    }

    /* Change link color on hover */
    .profile-dropdown-content a:hover {
        background-color: #f2f2f2;
        /* Change background color */
    }

    /* ======================font sizes======================= */

    main p {
        font-weight: bold;
        font-size: 18px;
    }

    .categories-container p,
    .products-container p {
        /* font-weight: none; */
        font-weight: normal;
        font-size: 16px;
    }

    .profile-text p,
    .profile-text h1 {
        width: 100px;
        color: #f2f1ec;
    }

    /* ======================content======================= */

    .categories-container {
        display: flex;
        flex-direction: row;
        flex-shrink: 0;
        /* border: 1px solid green; */
        padding: 1rem 1rem 1rem 1rem;
        /* width: 100%; */
        max-width: inherit;
        height: auto;
        overflow-x: auto;
    }

    .categories-container::-webkit-scrollbar {
        display: none;
    }

    .categories-container p {
        padding: 0 0 0 0;
    }

    .categories-item {
        /* border: 2px solid pink; */
        display: flex;
        flex-direction: column;
        background: darkcyan;
        border-radius: 20px;
        margin-right: 10px;
        min-width: 240px;
        max-width: 240px;
        /* max-width: inherit; */
        height: calc(100vh - 160px);
        /* gap: 20px; */
    }

    .categories-img-container {
        border: 1px solid black;
        height: 100%;
    }

    .categories-img-container img {
        width: 100%;
        height: 100%;
    }

    .categories-text-container {
        border: 1px solid black;
        height: 60%;
    }

    .categories-item:last-child {
        margin-right: 0;
    }

    .products-container {
        /* border: 1px solid plum; */
        padding: 10px;
        width: 100%;
        height: calc(100vh - 127px);
        overflow-y: auto;
    }

    .products-container::-webkit-scrollbar {
        display: none;
    }

    .products-item {
        /* border: 1px solid lightskyblue; */
        background: whitesmoke;
        border-radius: 10px;
        margin-bottom: 10px;
        min-height: 200px;
        max-height: 200px;
        /* overflow: hidden; */
        /* overflow: auto; */
        display: flex;
        flex-direction: row;
    }

    .item-image-container {
        /* border: 1px solid black; */
        width: 40%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .item-image-container img {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        height: 180px;
        width: 180px;
    }

    .item-text-container {
        /* border: 1px dotted blue; */
        display: flex;
        flex-direction: column;
        width: 400px;
        min-width: 100px;
        max-width: 400px;
        /* width: fit-content; */
        overflow: hidden;
        /* white-space: nowrap;  */
        /* overflow: hidden; */
        
        text-overflow: ellipsis;
        /* align-items: center; *
        /* justify-items: center; */
    }

    .item-rating-container {
        /* border: 1px solid orange; */
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding-left: 10px;
        /* align-content: center; */
    }

    .item-text-container h5,
    .item-text-container h3,
    .item-rating-container {
        /* justify-content: ; */
        /* align-content: center; */
        text-overflow: ellipsis;

        height: 100%;
    }

    .item-text-container h5,
    .item-text-container h3 {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding-left: 10px
    }

    .product-item-btn {
        /* border: 1px solid skyblue; */
        width: 10%;
        /* height: 200px; */
        display: flex;
        flex-direction: column;
        align-content: center;
        justify-items: center;
    }

    .product-item-btn a {
        /* justify-self: center; */
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
    }

    .product-item-btn:hover {
        background: #41c1ba;
    }

    .categories-img-container {
        /* border: 1px solid black; */
        border: none;
    }

    .categories-img-container img {
        border-radius: 20px;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
    }

    .categories-text-container {
        /* border: 1px solid black; */
        border: none;
    }

    .categories-text-container p {
        padding: 0 10px 0 0;
    }

    .categories-text-container form {
        width: 100%;
        height: 100%;
    }

    .categories-text-container button {
        display: flex;
        height: 100%;
        width: 100%;
        justify-content: center;
        align-items: center;
        outline: none;
        border: none;
        background: darkcyan;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
        /* margin-left: 10px; */
    }

    .products-item:last-child {
        margin-bottom: 0;
    }


    /* =========================Media Queries========================= */
    @media(min-width:921px) {
        .mobile-nav {
            display: none;
        }

        .hamburger {
            display: none;
        }

        .mobile-product-item-container {
            overflow-y: none;
        }

        .mobile-product-item-container:-webkit-scrollbar {
            display: none;
        }

        .mobile-product-item-container .front {
            transform: rotateY(0deg);
            /* Ensure the front side is always visible */
        }

        .mobile-product-item-container .back {
            /* transform: rotateY(180deg); */

            display: none;
            /* Hide the back side */
        }

    }

    @media(max-width:920px) {
        html {
            width: 100%;
            /* height: 100vh; */
            height: auto;
            border: 3px solid blue;
        }

        .profile-circular-image {
            width: 100%;
        }

        header {
            display: flex;
            /* position: fixed; */
        }

        ul {

            display: none;
            /* display: block; */
            /* z-index: 9999; */
        }

        .hamburger {
            display: block;
        }

        .search-container {
            display: none;
        }

        /* .ul-container {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            height: 100%;
            display: none;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background: #d8b81b;
            z-index: 999;
        } */
        .product-item-container .material-symbols-outlined {
            display: block;
        }
    }

    @media (max-width: 821px) {
        html {
            width: 100%;
            /* height: 100vh; */
            height: auto;
        }

        header {
            height: 150px;
            display: flex;
            flex-direction: column;
            padding-right: 25px;
            justify-content: center;
            /* justify-content: flex-start; */
        }

        .search-container {
            display: block;
        }

        .search-container {
            display: flex;
            flex-direction: row;
        }

        main,
        .cart-main-container {
            display: flex;
            flex-direction: column;
            height: auto;
        }

        .left,
        .right,
        .cart-right,
        .cart-left,
        .cart-head-right,
        .cart-head-left,
        .product-left-container,
        .product-right-container {
            width: 100%;
            /* height: 50%; */
        }

        .left p,
        .right p {
            padding: 20px 0 20px 0;
        }

        footer {
            display: block;
            height: 50px;
        }

        ul {
            display: none;
        }
        /* .product-left-container,
        .product-right-container {
            
        } */
        /* .product-item-container{
            margin: 10px;
        } */

        /* ===================Header/nav======================= */
        .profile-circular-image {
            display: flex;
            align-items: center;
            align-self: flex-start;
        }

        .search-container {
            /* border: 1px dotted darkcyan; */
            width: 100%;
            /* min-width: 710px; */
            height: 60px;
            padding: 0;
            margin-top: 5px;
            /* margin-left: 0; */

        }

        .product-left-container {
            display: none;
        }


        /* ======================content======================= */
        .entercode-form-container {
            height: calc(100vh - 220px);
        }

        .entercode-container {
            width: auto;
            /* height:  ; */
        }

        .categories-container {
            display: flex;
            flex-direction: row;
            overflow-x: scroll;
            width: auto;
            padding-bottom: 16px;
            gap: 20px;
        }

        .categories-item {
            height: 15rem;
        }

        .categories-item p {
            display: flex;
            justify-content: center;
            align-self: center;
        }

        .mobile-product-left-container {
            display: block;
            max-height: 100%;
            border: 1px solid black;
            overflow: auto;
        }
        .cart-footer{
            /* display: none; */
        }

        .cart-right {
            display: none;
        }

        /* .cart-footer-main {
            height: 33%;
        } */
        /* .show-footer-main {
            opacity: 1;
            height: 33%;
        } */
        .cart-main-container {
            height: 475px;
        }

        .show-footer-main {
            height: 45px;
            /* Change height to auto for smaller screens */
        }

        .entercode-container {
            /* height: 100%; */
        }

        .categories-text-container {
            /* display: none; */
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            height: 20%;
            border: none;
            border-radius: 20px;
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }

        .categories-img-container {
            height: 80%;
            border: none;
        }

        .categories-img-container img {
            border-radius: 20px;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
        }

        .categories-text-container p {
            padding: 0 10px 0 0;
        }

        .categories-text-container form {
            width: 100%;
            height: 100%;
        }

        .categories-text-container button {
            display: flex;
            height: 100%;
            width: 100%;
            justify-content: center;
            align-items: center;
            outline: none;
            border: none;
            background: darkcyan;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
            /* margin-left: 10px; */
        }
        /* .product-left-container,
        .product-right-container {
            gap: 10px
        } */
        /* .mobile-product-left-container{
            gap: 10px;
        } */
        .mobile-product-item-container{
            margin-bottom: 10px;
        }
        
    }

    @media (max-width: 768px) {
        .cart-container {
        display: flex;
        flex-direction: column;
        /* border: 2px solid black; */
        /* height: calc(100vh - 64px); */
        /* min-height: 1000px; */
        background: pink;
        
        width: 100%;
        
    }
        /* html{
            height: auto;
        } */
        header {
            height: 150px;
            display: flex;
            flex-direction: column;
            padding-right: 25px;
            justify-content: center;
            /* justify-content: flex-start; */
        }


        main {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .left,
        .right {
            width: 100%;
            /* height: 50%; */
        }

        .left p,
        .right p {
            padding: 20px 0 20px 20px;
        }

        footer {
            display: block;
            height: 50px;
        }

        ul {
            display: none;
        }
        /* .cart-container{ */
            /* border: 1px solid black; */
            /* height: calc(100vh - 156px); */
            /* height: calc(100vh - 110px); */
        /* } */

        /* ===================Header/nav======================= */
        .profile-circular-image {
            display: flex;
            align-items: center;
            align-self: flex-start;
        }

        .search-container {
            /* border: 1px dotted darkcyan; */
            width: 100%;
            /* min-width: 710px; */
            height: 60px;
            padding: 0;
            margin-top: 5px;
            display: flex;
            flex-direction: row;
            /* margin-left: 0; */
        }

        .cart-head-dropdown-btn {
            width: 100%;
            min-width: 100%;
            max-width: 200px;
        }

        /* ======================content======================= */
        .entercode-form-container {
            height: calc(100vh - 220px);
        }

        .entercode-container {
            width: auto;
            /* height:  ; */
        }

        .categories-container {
            display: flex;
            flex-direction: row;
            overflow-x: scroll;
            width: auto;
            padding-bottom: 16px;
            gap: 20px;
        }

        .cart-left {
            max-height: 100%;
        }
        

        .mobile-product-left-container {
            max-height: 100%;
        }

        .mobile-product-item-container {
            /* gap: 20px; */
            margin-bottom: 10px;
        }

        .categories-item {
            height: 15rem;
            min-width: 200px;
        }

        .categories-item p {
            display: flex;
            justify-content: center;
            align-self: center;
        }

        /* .cart-footer-main p{
            padding: 10px 0 10px 0;
        } */
        .cart-main-container {
            /* height: 475px; */
            height: 100vh;
            /* height: 1000px; */
        }
        .cart-footer{

        }
    }

    @media (max-width: 558px) {
        .search-container {
            width: 100%;
            min-width: 100%;
            max-width: 200px;
        }

        .cart-head-dropdown-btn {
            width: 100%;
            min-width: 100%;
            max-width: 100%;
        }

        main,
        .cart-main-container {
            display: flex;
            flex-direction: column;
            height: auto;
        }

        .cart-main-container {
            height: 475px;
        }

        .item-image-container img {
            height: 150px;
            width: 150px;
        }
    }

    @media (max-width: 480px) {
        html {
            width: 100%;
            /* height: 100vh; */
            height: auto;
        }

        header {
            height: 150px;
            display: flex;
            flex-direction: column;
            padding-right: 25px;
            justify-content: center;
            /* justify-content: flex-start; */
        }

        main {
            display: flex;
            flex-direction: column;
            height: auto;
        }

        .left,
        .right {
            width: 100%;
            /* height: 50%; */
        }

        .left p,
        .right p {
            padding: 20px 0 20px 0;
        }

        .cart-main-container {
            /* height: 100vh; */
            height: calc(100vh - 30px);
        }

        .cart-container {
            height: 100%;
        }
        
        footer {
            display: block;
            height: 50px;
        }

        .cart-footer {
            /* height: 20em; */
            height: 100%;
        }

        .cart-footer-head,
        .cart-footer-main,
        .cart-footer-footer {
            /* height: 100%; */
        }

        ul {
            display: none;
        }

        /* ===================Header/nav======================= */
        .profile-circular-image {
            display: flex;
            align-items: center;
            align-self: flex-start;
        }

        .search-container {
            /* border: 1px dotted darkcyan; */
            width: 100%;
            min-width: 330px;
            height: 60px;
            padding: 0;
            margin-top: 5px;
            /* margin-left: 0; */

        }

        /* ======================content======================= */
        .categories-container {
            display: flex;
            flex-direction: row;
            overflow-x: scroll;
            width: auto;
            padding-bottom: 16px;
            gap: 20px;
        }

        .categories-item {
            height: 15rem;
        }

        .categories-item p {
            display: flex;
            justify-content: center;
            align-self: center;
        }

        .cart-main-container {
            /* height: 475px; */
        }

        .search-container {
            width: 100%;
            min-width: 100%;
            max-width: 200px;
        }

        .cart-head-dropdown-btn {
            width: 100%;
            min-width: 100%;
            max-width: 100%;
        }

        .product-view-img-container {
            /* width: cal; */
        }

        .product-view-img-container img {
            /* height: calc(100vh - 550px);
            width: calc(100vh - 600px); */
            height: 100%;
            /* max-height: 200px; */
            /* min-height: 200px; */
            width: 100%;
        }

        .product-item-img img{
            width: 100px;
            height: 50px;
            border-radius: 10px;
        }
    }

    @media(max-width: 378px) {
        .search-container {
            /* border: 1px dotted darkcyan; */
            width: 100%;
            min-width: 200px;
            height: 60px;
            padding: 0;
            margin-top: 5px;
            /* margin-left: 0; */
        }

        .cart-main-container {
            height: 475px;
        }

        .search-container {
            width: 100%;
            min-width: 100%;
            max-width: 200px;
        }

        .cart-head-dropdown-btn {
            width: 100%;
            min-width: 100%;
            max-width: 100%;
        }

        .item-image-container img {
            height: 130px;
            width: 130px;
        }
    }

    @media (max-width: 280px) {

        /* ===================Header/nav======================= */
        .profile-circular-image {
            display: flex;
            align-items: center;
            align-self: flex-start;
        }

        .search-container {
            /* border: 1px dotted darkcyan; */
            width: 100%;
            min-width: 250px;
            height: 60px;
            padding: 0;
            margin-top: 5px;
            /* margin-left: 0; */

        }

        .cart-main-container {
            height: 475px;
        }
    }
            </span>
</style>



</html>
