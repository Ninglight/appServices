@component('layouts.common')

    @slot('body')

        <div id="admin">

            @include('components.sidenav')

            <main id="main">
                {{ $main }}
            </main>
        </div>

    @endslot

@endcomponent