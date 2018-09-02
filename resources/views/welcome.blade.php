@component('layouts.app')

    @slot('main')

        <div class="main-screen d-flex flex-column align-items-start">

            @include('components.navbar')

            @include('components.alerts')

            <div class="main-background" style="background-image: url({{ asset('images/illustration.svg') }}"></div>

            <div class="container main-content welcome-content mb-auto">
                <h1 class="mb-3 left-align">
                    Définissons vos besoins, <br>
                    nous trouvons votre solution
                </h1>
                <a class="btn btn-info my-1" href="{{action('AppQuestionController@selectCategories')}}">
                    Répondre aux questions
                </a>
                <a class="btn btn-outline-info my-1" href="{{action('AppProductController@select')}}">
                    Rechercher directement
                </a>



            </div>
        </div>







    @endslot

@endcomponent