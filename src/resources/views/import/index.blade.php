@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Importer votre fichier</h1>

            </div>

            <div class="bd-callout">
                <h5>Informations complémentaire pour l'import</h5>
                <p>De type </p>
            </div>

            @include('components.alerts')

            <div class="row">

                <form class="col-md-6" method="post" action="{{ url('/admin/import') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('csv_file') ? ' has-error' : '' }}">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileHelp"
                                   name="file" accept=".csv" required>
                            <label class="custom-file-label" for="fileInput">Choisissez un fichier...</label>
                            @if ($errors->has('csv_file'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="header" checked> Le fichier contient un header ?
                            </label>
                        </div>
                    </div>

                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary ">Importer votre fichier</button>
                    </div>
                </form>

            </div>

        </div>



    @endslot

@endcomponent

