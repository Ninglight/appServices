@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="my-5 text-center">Créer un produit</h1>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ url('/products') }}" enctype="multipart/form-data">
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
                        <label for="exampleFormControlSelect1">Marque</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                            @foreach( $brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Nom du produit</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp" name="name" required value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Description</label>
                        <textarea type="text" class="form-control" id="exampleInputTitle" aria-describedby="descHelp" name="description" required value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Réf. Constructeur</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="constructorHelp" name="constructor_reference" required value="{{ old('constructor_reference') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Réf. Connexing</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="connexingHelp" name="connexing_reference" required value="{{ old('connexing_reference') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Prix</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">€</span>
                            </div>
                            <input type="number" class="form-control" id="exampleInputTitle" aria-describedby="connexingHelp" data-number-to-fixed="2" data-number-stepfactor="100" name="price" value="00.00" required value="{{ old('price') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Lien vers le site ecommerce</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="connexingHelp" name="url_ecommerce" required value="{{ old('url_ecommerce') }}">
                    </div>

                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>

            </div>

        </div>



    @endslot

@endcomponent