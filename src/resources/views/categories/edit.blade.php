@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="my-5 text-center">Mettre à jour une catégorie</h1>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ action('CategoryController@update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="exampleInputTitle">Nom</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp" name="name" value="{{$category->name}}">
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>

            </div>

        </div>



    @endslot

@endcomponent