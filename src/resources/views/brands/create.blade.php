@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Créer une marque</h1>
            </div>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ url('/admin/brands') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputTitle">Nom</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp" name="name">
                    </div>
                    <div class="form-group form-group-file">
                        <label for="logoUrlInput" class="form-trigger-file">Logo actuelle</label><br/>
                        <input type="file" class="form-control-file" id="logoInput" aria-describedby="logoHelp" name="logo" value="{{old('url_logo')}}" accept="image/*" required>
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <a href="{{action('BrandController@index')}}" class="btn btn-outline-primary">
                            Retour
                        </a>
                        <button type="submit" class="btn btn-primary ">Créer</button>
                    </div>
                </form>

            </div>

        </div>

    @endslot

@endcomponent