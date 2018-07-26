@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="mt-5 mb-2 text-center">Bienvenue sur appService by Connexing</h1>

            @include('components.alerts')

        </div>



    @endslot

@endcomponent