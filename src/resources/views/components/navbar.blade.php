<nav class="navbar navbar-expand-md navbar-light navbar-laravel align-items-start">
    <div class="container d-flex flex-column">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/storage/app/public/CO.svg" alt="">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav d-flex flex-column">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/") }}">Home</a>
                </li>
                <li class="nav-item {{ Request::is('categories') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/categories") }}">Categories</a>
                </li>
                <li class="nav-item {{ Request::is('brands') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/brands") }}">Marques</a>
                </li>
                <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/products") }}">Produits</a>
                </li>
                <li class="nav-item {{ Request::is('attributes') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/attributes") }}">Attributs</a>
                </li>
                <li class="nav-item {{ Request::is('default_values') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url("/default_values") }}">Valeur par défaut</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ url('/categories') }}">
                                Categories
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>