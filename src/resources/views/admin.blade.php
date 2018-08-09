@component('layouts.admin')

    @slot('main')

        <div class="container">

            <div class="mt-2 mb-2 d-flex flex-row align-items-center flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title p-2">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="p-2">Tableau de bord</h1>
            </div>

            @include('components.alerts')

        </div>



    @endslot

@endcomponent