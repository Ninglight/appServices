@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="mt-5 mb-2 text-center">Voici la liste des produits</h1>

            @include('components.alerts')

            <div class="text-center">
                <a href="{{ url("/attributes/create") }}" class="btn btn-secondary my-3"><i class="fas fa-plus mr-1"></i>Créer
                    un nouvel attribut</a>
            </div>

            @if(count($attributes))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($attributes as $attribute)

                        <tr class="table-row" data-href="{{ url("/attributes/$attribute->id") }}">
                            <th scope="row">{{ $attribute->id }}</th>
                            <td>{{ $attribute->category->name }}</td>
                            <td>{{ $attribute->name }}</td>
                            <td class="d-flex">
                                @if (Auth::check())
                                    <a href="{{action('AttributeController@edit', $attribute->id)}}"
                                       class="btn btn-warning">Modifier</a>
                                    <form action="{{action('AttributeController@destroy', $attribute->id)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                                @endif
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            @else

                <p class="text-center">Aucun attribut n'est affichable actuellement</p>

            @endif

        </div>



    @endslot

@endcomponent