@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-row align-items-center flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title p-2">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="p-2">Mettre à jour une catégorie</h1>
            </div>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ action('CategoryController@update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="exampleInputTitle">Nom</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp" name="name" value="{{$category->name}}">
                    </div>
                    <div class="center-align">
                        <a href="{{action('CategoryController@index')}}" class="btn btn-outline-primary">
                            Retour
                        </a>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>

            </div>

        </div>



    @endslot

@endcomponent