@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="my-5 text-center">Mettre à jour une marque</h1>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ action('BrandController@update', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="nameInput">Nom</label>
                        <input type="text" class="form-control" id="nameInput" aria-describedby="nameHelp" name="name" value="{{$brand->name}}">
                    </div>
                    <div class="form-group">
                        <label for="logoUrlInput">Logo</label>
                        <input type="file" class="form-control" id="logoUrlInput" aria-describedby="logoHelp" name="logo" value="{{$brand->url_logo}}" accept="image/*,.svg">
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>

            </div>

        </div>



    @endslot

@endcomponent