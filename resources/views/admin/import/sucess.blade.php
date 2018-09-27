@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Résultat de l'import</h1>

            </div>

            @include('components.alerts')

            <h2>Imports réussis</h2>

            <table class="table">
                <tbody>
                    @if(count($import_sucess) > 0)

                        @foreach($import_sucess as $sucess_item)

                            <tr>
                                <td>{{ dd($sucess_item) }}</td>
                            </tr>

                        @endforeach

                    @else

                        <p class="text-muted">Ancun enregitrement n'a pu être inséré.</p>

                    @endif


                </tbody>
            </table>

            <h2>Erreurs retournée</h2>

            <table class="table">
                <tbody>
                @foreach($import_errors as $error_item)
                    <tr>
                        <td>{{ $error_item['message'] }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>



    @endslot

@endcomponent

