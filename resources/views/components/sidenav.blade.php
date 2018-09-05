<nav id="sidebar" class="gradient-background">
    <div class="sidebar-header">
        <div class="right-align hidden-md-up">
            <button type="button" id="sidebarRemove" class="btn btn-link btn-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{ asset('icons/co-white.svg') }}" alt="logo appServices"> <br/>
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <ul class="list-unstyled components">
        <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("/admin") }}">
                <i class="fas fa-bars"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-sitemap"></i>
                Products
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li class="nav-item {{ Request::is('admin/categories') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/admin/categories") }}">Categories</a>
                </li>
                <li class="nav-item {{ Request::is('admin/brands') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/admin/brands") }}">Brands</a>
                </li>
                <li class="nav-item {{ Request::is('admin/products') || Request::is('admin/product') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/admin/products") }}">Products</a>
                </li>
                <li class="nav-item {{ Request::is('admin/attributes') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/admin/attributes") }}">Attributes</a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ Request::is('admin/questions') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("/admin/questions") }}">
                <i class="fas fa-comments"></i>
                Questions
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("/admin/users") }}">
                <i class="fas fa-users"></i>
                Users
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/import') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url("/admin/import") }}">
                <i class="fas fa-database"></i>
                Data import
            </a>
        </li>
    </ul>

    <div class="center-align align-self-end mt-auto">
        <button type="button" class="btn btn-outline-secondary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            Logout
        </button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>






</nav>