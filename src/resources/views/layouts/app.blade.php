@component('layouts.common')

    @slot('body')

        <div id="app">

            @include('components.navbar')

            <main class="">
                {{ $main }}
            </main>"
        </div>

    @endslot

@endcomponent