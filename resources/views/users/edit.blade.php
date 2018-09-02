@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Mettre à jour un utilisateur</h1>
            </div>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ action('BrandController@update', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">

                    <div class="row">

                        <div class="form-group col-sm-6">
                            <label for="name">Nom</label>
                            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" aria-describedby="descHelp"
                                   name="name" required value="{{ old('name') }}" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="email">Adresse mail</label>
                            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" aria-describedby="descHelp"
                                   name="email" required value="{{ old('email') }}" autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>

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