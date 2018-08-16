@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Importer votre fichier</h1>

            </div>

            @include('components.alerts')

            <form class="form-horizontal" method="POST" action="{{ url('/admin/import') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                    <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

                    <div class="col-md-6">
                        <input id="csv_file" type="file" class="form-control" name="csv_file" required>

                        @if ($errors->has('csv_file'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="header" checked> File contains header row?
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Parse CSV
                        </button>
                    </div>
                </div>
            </form>

            <form class="offset-md-3 col-md-6" method="post" action="{{ url('/admin/import') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileHelp" name="file" accept=".csv" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choisissez un fichier...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary ">Importer votre fichier</button>
                </div>
            </form>

        </div>



    @endslot

@endcomponent