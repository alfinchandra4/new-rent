<div class="flex scrollable hover">
    <div class="nav-active-text-primary" data-nav>
        <ul class="nav bg">
            <li class="nav-header hidden-folded">
                <span class="text-muted">Main</span>
            </li>
            <li>
                <a href="{{ route('dashboard.index') }}">
                    <span class="nav-icon text-primary"><i data-feather='home'></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-header hidden-folded">
                <span class="text-muted">Order</span>
            </li>
            <li>
                <a href="{{ route('order.create') }}">
                    <span class="nav-icon text-info"><i data-feather='calendar'></i></span>
                    <span class="nav-text">Buat pesanan</span>
                    <span class="nav-badge"><b class="badge-circle xs text-danger"></b></span>
                </a>
            </li>
            <li>
                <a href="{{ route('order.ongoing') }}">
                    <span class="nav-icon text-info"><i data-feather='calendar'></i></span>
                    <span class="nav-text">Pesanan berlangsung</span>
                </a>
            </li>
            <li>
                <a href="{{ route('order.completed') }}">
                    <span class="nav-icon text-info"><i data-feather='calendar'></i></span>
                    <span class="nav-text">Pesanan selesai</span>
                </a>
            </li>
        </ul>
        <ul class="nav ">
            <li class="nav-header hidden-folded">
                <span class="text-muted">Products</span>
            </li>
            <li>
                <a href="{{ route('products') }}">
                    <span class="nav-icon text-primary"><i data-feather='home'></i></span>
                    <span class="nav-text">Product</span>
                </a>
            </li>
            <li>
                <a href="{{ route('categories') }}">
                    <span class="nav-icon text-primary"><i data-feather='home'></i></span>
                    <span class="nav-text">Category</span>
                </a>
            </li>
        </ul>
    </div>
</div>
