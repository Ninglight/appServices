<nav id="navbar" class="navbar mt-2 primary-color d-flex ">
    <div class="sidebar-header d-flex flex-row w-100 ">

        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{ asset('icons/co-color.svg') }}" alt="logo appServices"> <br/>
            {{ config('app.name', 'Laravel') }}
        </a>

        <ul class="navbar-nav d-flex flex-row p-2">
            <li class="mx-3 nav-item align-content-center active">
                <a class="nav-link" href="{{ url('/') }}">Accueil</a>
            </li>
            <li class="mx-3 nav-item">
                <a class="nav-link" href="{{ action('AppQuestionController@selectCategories') }}">Assistant</a>
            </li>
            <li class="mx-3 nav-item">
                <a class="nav-link" href="{{ action('AppProductController@index') }}">Les produits</a>
            </li>
        </ul>

    </div>
</nav>