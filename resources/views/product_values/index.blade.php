@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="mt-5 mb-2 text-center">Liste des valeurs par défaut</h1>

            @include('components.alerts')

            <div class="text-center">
                <a href="{{ url("/default_values/create") }}" class="btn btn-secondary my-3"><i class="fas fa-plus mr-1"></i>Créer une nouvelle valeur par défaut</a>
            </div>

            @if(count($default_values))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Attribut</th>
                        <th scope="col">Value</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($default_values as $default_value)

                        <tr class="table-row" data-href="{{ url("/default_values/$default_value->id") }}">
                            <th scope="row">{{ $default_value->id }}</th>
                            <td>{{ $default_value->attribute->name }}</td>
                            <td>{{ $default_value->value }}</td>
                            <td class="d-flex">
                                @if (Auth::check())
                                    <a href="{{action('DefaultValueController@edit', $default_value->id)}}"
                                       class="btn btn-warning">Modifier</a>
                                    <form action="{{action('DefaultValueController@destroy', $default_value->id)}}" method="post">
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

                <p class="text-center">Aucun valeur par défaut n'est affichable actuellement</p>

            @endif

        </div>



    @endslot

@endcomponent