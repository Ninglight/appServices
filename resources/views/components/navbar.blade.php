<!--<nav id="navbar" class="navbar mt-2 primary-color d-flex ">
    <div class="sidebar-header d-flex flex-row w-100 ">

    </div>
</nav>-->

<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img class="logo" src="{{ asset('icons/co-color.svg') }}" alt="logo appServices"> <br/>
        {{ config('app.name', 'Laravel') }}
    </a>
    @if (Route::getCurrentRoute()->uri != '/')
        <button class="text-primary navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            @lang('global.nav_name')
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav d-flex flex-row justify-content-center p-2">
                <li class="mx-3 nav-item align-content-center active">
                    <a class="nav-link @if (Route::getCurrentRoute()->uri == '/') active @endif" href="{{ url('/') }}">@lang('global.nav_home')</a>
                </li>
                <li class="mx-3 nav-item">
                    <a class="nav-link @if (explode('/', Route::getCurrentRoute()->uri)[0] == 'questions') active @endif" href="{{ action('AppQuestionController@selectCategories') }}">@lang('global.nav_questions')</a>
                </li>
                <li class="mx-3 nav-item">
                    <a class="nav-link @if (explode('/', Route::getCurrentRoute()->uri)[0] == 'products') active @endif" href="{{ action('AppProductController@select') }}">@lang('global.nav_products')</a>
                </li>
            </ul>
        </div>
    @endif

</nav>