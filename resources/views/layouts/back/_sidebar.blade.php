<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard<sup> </sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">
            <i class="fa fa-th-large"></i>
            <span>Categories</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('brand.index')}}">
            <i class="fa fa-tags"></i>
            <span>Brands</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('product.index')}}">
            <i class="fa fa-archive"></i>
            <span>Products</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('coupon.index')}}">
            <i class="fa fa-eraser"></i>
            <span>Coupon</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('campaign.index')}}">
            <i class="fa fa-calendar-o"></i>
            <span>Campaign</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">
            <i class="fa fa-user"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">
            <i class="fa fa-sliders"></i>
            <span>Slider</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">
            <i class="fa fa-cog"></i>
            <span>Setting</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
