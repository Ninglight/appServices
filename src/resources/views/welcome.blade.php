@component('layouts.app')

    @slot('main')

        <div class="main-screen d-flex">

            @include('components.navbar')

            @include('components.alerts')

            <div class="main-background" style="background-image: url({{ asset('images/illustration.svg') }}"></div>

            <div class="container main-content align-self-center">
                <h1 class="mb-3 left-align">
                    Définissons vos besoins, <br>
                    nous trouvons votre solution
                </h1>
                <a href="{{action('AppQuestionController@selectCategories')}}">
                    <button class="btn btn-info">
                        Répondre aux questions
                    </button>
                </a>

            </div>
        </div>







    @endslot

@endcomponent