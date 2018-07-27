@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="my-5 text-center">Créer un attribut produit</h1>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ url('/attributes') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Catégorie du produit</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Nom de l'attribut</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp" name="name" required value="{{ old('name') }}">
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>

            </div>

        </div>



    @endslot

@endcomponent