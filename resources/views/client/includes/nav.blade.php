<div class="profile-circular-image">
    <img src="{{ asset('roldan.png') }}" alt="Profile Image">
    <div class="profile-text">
        <h1>Welcome,</h1>
        <p>{{$username}}</p>
    </div>
    <button class="hamburger">
        <div class="bar"></div>
    </button>
</div>

<div class="search-container">
    @if (Route::currentRouteNamed('cart.view'))
        <div class="cart-head-dropdown" style="">
            <button class="cart-head-dropdown-btn" id="cart-head-dropdown-btn">Categories dropdown 1</button>
            <div class="cart-head-dropdown-content">
                <p>tasdasd</p>
                <p>tasdasd</p>
                <p>tasdasd</p>
                <p>tasdasd</p>
                <p>tasdasd</p>
                <p>tasdasd</p>
                <p>tasdasd</p>
                <p>tasdasd</p>
            </div>
        </div>
        <div class="cart-head-dropdown" style="">
            <button class="cart-head-dropdown-btn" id="cart-head-dropdown-btn">Item dropdown 2</button>
            <div class="cart-head-dropdown-content">
                test2
            </div>
        </div>
    @else
        <div class="search-input-container">
            <form action="{{ route('dashboard.search', ['username' => $username ]) }}" method="GET">                
                @csrf
                <div class="search">
                    <input class="search-input" type="text" name="dashboard-search" placeholder="Search">
                    <button class="search-icon-btn"><span class="search-icon material-symbols-outlined">search</span></button>
                </div>
            </form>
        </div>
    @endif
</div>

<ul class="mobile-nav">
    <button class="close-menu">
        <span class="material-symbols-outlined">
            close
        </span>
    </button>
    <li>
        <a href="{{ route('dashboard.view', ['username' => $username]) }}">
            <span class="material-symbols-outlined">
                home
            </span>Home
        </a>
    </li>
    <li><a href="{{ route('cart.view',['username' => $username]) }}">
        <span class="material-symbols-outlined">
                shopping_cart
            </span>Add to Cart
        </a>
    </li>
    {{-- <li><a href=""><span class="material-symbols-outlined">
                settings
            </span>Settings</a>
    </li> --}}
    <li><a href=""><span class="material-symbols-outlined">
                account_circle
            </span>Profile</a>
    </li>
</ul>


{{-- <div class="ul-container"> --}}
<ul>
    <li>
        <a href="{{ route('dashboard.view', ['username' => $username]) }}">
            <span class="material-symbols-outlined">
                home
            </span>Home
        </a>
    </li>
    <li><a href="{{ route('cart.view', ['username' => $username]) }}"><span class="material-symbols-outlined">
                shopping_cart
            </span>Add to Cart
        </a>
    </li>
    <li><a href="{{ route('clientorder.view', ['username' => $username]) }}"><span class="material-symbols-outlined">
        shopping_bag
        </span>Orders</a>
    </li>
    <li>
        <div class="profile-nav-dropdown">
            <span class="material-symbols-outlined">
                account_circle
            </span>
            <p>Profile</p>
            <div class="profile-dropdown-content">
                <a href="">
                    <span class="material-symbols-outlined">
                        edit
                    </span>
                    <p>Edit Profile</p>
                </a>
                <a href="{{route('client.logout')}}">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <p>Log Out</p>
                </a>
            </div>
        </div>
    </li>
</ul>

{{-- </div> --}}
<script>
var dropdownBtns = document.querySelectorAll('.cart-head-dropdown-btn');

dropdownBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
        var dropdownContent = this.nextElementSibling;
        dropdownContent.classList.toggle('show');
    });
});

window.onclick = function(event) {
    if (!event.target.matches('.cart-head-dropdown-btn')) {
        var dropdowns = document.getElementsByClassName('cart-head-dropdown-content');
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
</script>
