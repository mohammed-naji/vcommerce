<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">VCommerce</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Categories"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tags"></i>
            <span>Categories</span>
        </a>
        <div id="Categories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.categories.index') }}">All Categories</a>
                <a class="collapse-item" href="{{ route('admin.categories.create') }}">Add New</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Products"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Products</span>
        </a>
        <div id="Products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.products.index') }}">All Products</a>
                <a class="collapse-item" href="{{ route('admin.products.create') }}">Add New</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Discounts"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-percent"></i>
            <span>Discounts</span>
        </a>
        <div id="Discounts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.discounts.index') }}">All Discounts</a>
                <a class="collapse-item" href="{{ route('admin.discounts.create') }}">Add New</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-shopping-cart"></i>
        <span>Orders</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-users"></i>
        <span>Customers</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-comments"></i>
        <span>Reviews</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-file-alt"></i>
        <span>Reports</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Products"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Sliders</span>
        </a>
        <div id="Products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('admin.products.index') }}">All Products</a>
                <a class="collapse-item" href="{{ route('admin.products.create') }}">Add New</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
