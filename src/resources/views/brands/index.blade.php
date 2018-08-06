@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="mt-5 mb-2 text-center">Voici la liste des marques de produit</h1>

            @include('components.alerts')

            <div class="text-center">
                <a href="{{ url("/brands/create") }}" class="btn btn-secondary my-3"><i class="fas fa-plus mr-1"></i>Créer
                    une offre</a>
            </div>


            @if(count($brands))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($brands as $brand)

                        <tr class="table-row" data-href="{{ url("/brands/$brand->id") }}">
                            <th scope="row">{{ $brand->id }}</th>
                            <td><img src="{{ asset('storage/'.$brand->url_logo) }}" alt="logo {{ $brand->name }}"
                                     width="50"></td>
                            <td>{{ $brand->name }}</td>
                            <td class="d-flex">
                                @if (Auth::check())
                                    <a href="{{action('BrandController@edit', $brand->id)}}" class="btn btn-warning">Modifier</a>
                                    <form action="{{action('BrandController@destroy', $brand->id)}}" method="post">
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

                <p class="text-center">Aucune offre actuellement</p>

            @endif

        </div>



    @endslot

@endcomponent