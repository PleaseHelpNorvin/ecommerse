<div class="sidenav-header">
    <h1>Logo Test</h1>
</div>
<div class="sidenav-main">
    <div class="sidenav-content {{ Request::route()->named('adminDashboard.view') ? 'active' : '' }}">
        <span class="material-symbols-outlined">
            dashboard
        </span>
        <a href="{{ route('adminDashboard.view') }}">Dashboard</a>
    </div>
    <div class="sidenav-content {{ Request::route()->named('adminOrder.view')
    || Request::route()->named('order.search')
    || Request::route()->named('orderlist.view')
    ? 'active' : '' }}">
        <span class="material-symbols-outlined">
            orders
        </span>
        <a href="{{ route('adminOrder.view') }}">Orders</a>
    </div>
    <div class="mobile-sidenav-content-slide-container">
        <div class="horizontal-line"></div> <!-- Horizontal line -->

        <div class="mobile-slide-head-container {{  Request::route()->named('adminCode.view')
        || Request::route()->named('adminCategory.view')
        || Request::route()->named('adminProduct.view')
        || Request::route()->named('editCategoryForm.view')
        || Request::route()->named('adminCategoryForm.view')
        || Request::route()->named('category.search')
        || Request::route()->named('adminProductForm.view')
        || Request::route()->named('product.search')


        ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                pages
            </span>
            <p>Pages</p>
        </div>
        <div class="mobile-slide-body-container {{  Request::route()->named('adminCode.view')
        || Request::route()->named('adminCategory.view')
        || Request::route()->named('adminProduct.view')
        || Request::route()->named('editCategoryForm.view')
        || Request::route()->named('adminCategoryForm.view')
        || Request::route()->named('category.search')
        || Request::route()->named('editProductForm.view')
        || Request::route()->named('adminProductForm.view')
        || Request::route()->named('product.search')? 'active' : '' }}">

            <div class="slide-wrapper {{ Request::route()->named('adminCategory.view')
            || Request::route()->named('editCategoryForm.view')
            || Request::route()->named('adminCategoryForm.view')
            || Request::route()->named('category.search') ? 'active' : '' }}">
                <div class=slide-line><span></span></div>
                <a href="{{ route('adminCategory.view')}}">
                    <span class="material-symbols-outlined">
                        category
                    </span>
                    Category
                </a>
            </div>
            <div class="slide-wrapper {{ Request::route()->named('adminProduct.view')
            || Request::route()->named('editProductForm.view')
            || Request::route()->named('adminProductForm.view')
            || Request::route()->named('product.search') ? 'active' : '' }}">
                <div class=slide-line></div>
                <a href="{{ route('adminProduct.view')}}">
                    <span class="material-symbols-outlined">
                        inventory
                    </span>
                    Products
                </a>
            </div>
        </div>
    </div>
    <div class="mobile-second-sidenav-content-slide-container" >
        <div class="mobile-second-head-container  {{ Request::route()->named('adminUser.view') ? 'active' : '' }}">
            <span class="material-symbols-outlined">
                person
            </span>
            <p>Users</p>
        </div>
        <div class="mobile-second-slide-body-container {{ Request::route()->named('adminUser.view') ? 'active' : '' }}">
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