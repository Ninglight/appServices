@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="mt-5 mb-2 text-center">Voici la liste des catégories de produit</h1>

            @include('components.alerts')

            <div class="text-center">
                <a href="{{ url("/categories/create") }}" class="btn btn-secondary my-3"><i class="fas fa-plus mr-1"></i>Créer une offre</a>
            </div>

            @if(count($categories))

                <div class="row">
                    <div class="card-columns">

                        @foreach($categories as $category)

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $loop->iteration }}# {{ $category->name }}</h5>
                                    <a href="{{ url("/categories/$category->id") }}" class="btn btn-outline-secondary">En savoir plus</a>
                                    @if (Auth::check())
                                        <a href="{{action('CategoryController@edit', $category->id)}}" class="btn btn-warning">Modifier</a>
                                        <form action="{{action('CategoryController@destroy', $category->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                        </form>
                                    @endif
                                </div>
                            </div>

                        @endforeach

                    </div>

                </div>

            @else

                <p class="text-center">Aucune offre actuellement</p>

            @endif

        </div>



    @endslot

@endcomponent