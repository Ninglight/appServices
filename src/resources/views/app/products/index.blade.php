@component('layouts.app')

    @slot('main')

        @include('components.navbar')

        @include('components.alerts')

        <div class="container products-container">

            <div class="card filter-card w-100 p-3 mt-4">
                <h2>Filtrer les resultats</h2>

                <form method="post" action="{{action('AppProductController@updateFilters')}}" enctype="multipart/form-data">
                    @csrf
                    <input name="category" type="hidden" value="{{ $category->id }}">

                    <div class="row">

                        @foreach($category->attributes as $attribute)

                            <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                <label for="exampleFormControlSelect1">{{ $attribute->name }}</label><br>
                                <div class=" btn-group-toggle" data-toggle="buttons">
                                    @foreach($attribute->default_values as $default_value)
                                        <label class="btn btn-outline-info btn-radio @if($filters) @foreach($filters as $filter) {{ $default_value->id == $filter->id ? 'active' : '' }} @endforeach @endif">
                                            <input type="radio" name="{{ $attribute->identification }}" id="{{ $default_value->value }}" autocomplete="off" value={{ $default_value->id }} @if($filters) @foreach($filters as $filter) {{ $default_value->id == $filter->id ? 'checked' : '' }} @endforeach @endif> {{ $default_value->value }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                        @endforeach

                    </div>

                    <div class="row mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary mx-2">Mettre à jour les filtres</button>
                        <a href="{{ action('AppProductController@index', ['category' => $category->id] )}}" class="btn btn-outline-primary mx-2">
                            Retirer les filtres
                        </a>
                    </div>

                </form>
            </div>


            <div class="row p-3">
                <h2>Liste des articles</h2>
            </div>

            <div class="row d-flex justify-content-center flex-row align-items-stretch mb-3">

                @if(count($products) > 0 )

                    @foreach($products as $product)

                        <a class="col-lg-3 col-md-4 col-6 product-card mt-3" href="{{action('AppProductController@show', $product->id )}}">
                            <div class="card">
                                <img class="card-img-top" onerror="this.onerror=null;this.src='{{ asset('images/blank.svg') }}';" src="{{ $product->external_url_img }}" alt="Card image cap">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }}</h3>
                                </div>
                            </div>
                        </a>

                    @endforeach

                @else

                    <p class="text-muted">Aucun résultat pour votre recherche.</p>

                @endif

            </div>

        </div>


    @endslot

@endcomponent