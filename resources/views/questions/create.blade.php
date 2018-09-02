@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Créer une question</h1>
            </div>

            @include('components.alerts')

            <form method="post" class="row" action="{{ url('/admin/questions') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="exampleInputTitle">Libellé de la question</label>
                    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="valueHelp"
                           name="value" required value="{{ old('value') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlSelect1">Catégorie du produit</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        @foreach( $categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlSelect1">Attribut lié</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="attribute_id">
                        @foreach( $attributes as $attribute)
                            <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlSelect1">Ordre d'apparition</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="order">
                        @for ($i = 1; $i < $numberQuestion+1; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                    <a href="{{action('ProductController@index')}}" class="btn btn-outline-primary">
                        Retour
                    </a>
                    <button type="submit" class="btn btn-primary ">Créer la question</button>
                </div>
            </form>

        </div>


    @endslot

@endcomponent