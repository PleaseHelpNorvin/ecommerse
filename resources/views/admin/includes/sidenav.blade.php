<div class="sidenav-header">
    <h1>Logo Test</h1>
</div>
<div class="sidenav-main">
    <div class="sidenav-content {{ Request::route()->named('adminDashboard.view') ? 'active' : '' }}">
        <a href="{{ route('adminDashboard.view') }}">
            <span class="material-symbols-outlined">
                dashboard
            </span>
            Dashboard
        </a>
    </div>
    {{-- <div class="sidenav-content {{ Request::route()->named('adminDelivery.view') ? 'active' : '' }}">
        <a href="{{ route('adminDelivery.view') }}">
            <span class="material-symbols-outlined">
                local_shipping
            </span>
            Delivered
        </a>
    </div> --}}
    <div class="sidenav-content {{ Request::route()->named('adminOrder.view')
        || Request::route()->named('orderlist.view')
        || Request::route()->named('order.search')  ? 'active' : '' }}">
        <a href="{{ route('adminOrder.view') }}">
            <span class="material-symbols-outlined">
                orders
            </span>
            Orders
        </a>
    </div>
    <div class="sidenav-content-slide-container ">
        <div class="slide-head-container {{ Request::route()->named('adminCode.view')
            || Request::route()->named('adminCategory.view')
            || Request::route()->named('adminProduct.view')
            || Request::route()->named('adminCategoryForm.view')
            || Request::route()->named('adminProductColor.view')
            || Request::route()->named('category.search')
            
            ? 'active' : '' }}">
                <span class="material-symbols-outlined">
                    pages
                </span>
                <p>Pages</p>
        </div>
        <div class="slide-body-container {{ Request::route()->named('adminCode.view')
                || Request::route()->named('adminCategory.view')
                || Request::route()->named('adminProduct.view')
                || Request::route()->named('adminCategoryForm.view')
                || Request::route()->named('adminProductColor.view') ? 'active' : '' }}">
            <div class="slide-wrapper {{ Request::route()->named('adminCategory.view','adminCategoryForm.view') ? 'active' : '' }}">
                <div class=slide-line><span></span></div>
                <a href="{{ route('adminCategory.view')}}">
                    <span class="material-symbols-outlined">
                        category
                    </span>
                    Category
                </a>
            </div>
            <div class="slide-wrapper {{ Request::route()->named('adminProduct.view') ? 'active' : '' }}">
                <div class=slide-line></div>
                <a href="{{ route('adminProduct.view')}}">
                    <span class="material-symbols-outlined">
                        inventory
                    </span>
                    Products
                </a>
            </div>
            {{-- <div class="slide-wrapper {{ Request::route()->named('adminProductColor.view') ? 'active' : '' }}">
                <div class=slide-line></div>
                <a href="{{ route('adminProductColor.view')}}">
                    <span class="material-symbols-outlined">
                        palette
                    </span>
                    colors
                </a>
            </div> --}}
        </div>
    </div>
    <div class="second-sidenav-content-slide-container" >
        <div class="second-head-container {{ Request::route()->named('adminUser.view') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                person
            </span>
            <p>Users</p>
        </div>
        <div class="second-slide-body-container {{ Request::route()->named('adminUser.view') ? 'active' : '' }}">
            <div class="slide-wrapper {{ Request::route()->named('adminUser.view') ? 'active' : '' }}">
                <div class=slide-line></div>
                <a href="{{ route('adminUser.view')}}">
                    <span class="material-symbols-outlined">
                        person_check
                    </span>Users List
                </a>
            </div>
        </div>
    </div>
    

</div>