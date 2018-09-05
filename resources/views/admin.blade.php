@component('layouts.admin')

    @slot('main')

        <div class="container">

            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Dashboard</h1>






            </div>

            @include('components.alerts')

        </div>



    @endslot

@endcomponent