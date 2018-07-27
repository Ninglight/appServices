@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="mt-5 mb-2 text-center">Voici la liste des produits</h1>

            @include('components.alerts')

            <div class="text-center">
                <a href="{{ url("/products/create") }}" class="btn btn-secondary my-3"><i class="fas fa-plus mr-1"></i>Créer un nouveau produit</a>
            </div>

            @if(count($products))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Réf. Constructeur</th>
                        <th scope="col">Réf. Connexing</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)

                        <a href="{{ url("/products/$product->id") }}">
                            <tr class="table-row" data-href="{{ url("/products/$product->id") }}">
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->constructor_reference }}</td>
                                <td>{{ $product->connexing_reference }}</td>
                                <td class="d-flex">
                                    <a href="{{ url("/products/$product->id") }}" class="btn btn-outline-secondary">En savoir plus</a>
                                    @if (Auth::check())
                                        <a href="{{action('ProductController@edit', $product->id)}}" class="btn btn-warning">Modifier</a>
                                        <form action="{{action('ProductController@destroy', $product->id)}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Supprimer</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        </a>

                    @endforeach

                    </tbody>
                </table>

            @else

                <p class="text-center">Aucun produit n'est affichable actuellement</p>

            @endif

        </div>



    @endslot

@endcomponent