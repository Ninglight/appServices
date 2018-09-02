@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Attribut de produit</h1>

                <a href="{{action('AttributeController@create')}}" class="btn btn-primary ml-auto p-2">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Créer un attribut
                </a>
            </div>

            @include('components.alerts')

            @if(count($attributes))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Nom</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($attributes as $attribute)

                        <tr class="table-row" data-href="{{action('AttributeController@edit', $attribute->id)}}">
                            <th scope="row">{{ $attribute->id }}</th>
                            <td>{{ $attribute->category->name }}</td>
                            <td>{{ $attribute->name }}</td>
                            <td class="d-flex justify-content-end right-align">
                                <a href="{{action('AttributeController@edit', $attribute->id)}}" class="btn btn-link">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{action('AttributeController@destroy', $attribute->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-link" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
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