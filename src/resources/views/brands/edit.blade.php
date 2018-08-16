@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Mettre à jour une marque</h1>
            </div>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ action('BrandController@update', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="nameInput">Nom</label>
                        <input type="text" class="form-control" id="nameInput" aria-describedby="nameHelp" name="name" value="{{$brand->name}}">
                    </div>
                    <div class="form-group form-group-file">
                        <label for="logoUrlInput" class="form-trigger-file">Logo actuelle</label><br/>
                        <img src="{{ asset('storage/'.$brand->url_logo) }}" alt="image {{ $brand->name }}" width="50" class="mb-2">
                        <input type="file" class="form-control-file" id="logoInput" aria-describedby="logoHelp" name="logo" value="{{$brand->url_logo}}" accept="image/*">
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <a href="{{action('BrandController@index')}}" class="btn btn-outline-primary">
                            Retour
                        </a>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>

            </div>

        </div>



    @endslot

@endcomponent