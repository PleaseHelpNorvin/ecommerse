
<div class="hamburger">
    <span class="material-symbols-outlined">
        menu
    </span>
    
</div>
<div class="search-toggle">
    <span class="material-symbols-outlined">
        search
    </span>
</div>
{{-- <div class="mobileSearch-container">
    test
</div> --}}
<div class="mobile-nav">
    @include('admin.includes.mobile-sidenav')
</div>
{{-- <div class = "search-container">

</div> --}}
<div class="nav-spacer"></div>
<div class ="profile-dropdown">
    <img src="{{asset('roldan.png')}}" alt="" class="profile-dropdown-img">
    <div class="profile-dropdown-content">
        <a href="{{route('admin.logout')}}">Logout</a>
    </div>
</div>
{{-- <div class="profile-dropdown-content">
    <a href="">Logout</a>
</div> --}}