@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Liste de questions</h1>

                <a href="{{action('QuestionController@create')}}" class="btn btn-primary ml-auto p-2">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Créer une question
                </a>
            </div>

            @include('components.alerts')

            @if(count($questions))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Attribut</th>
                        <th scope="col">Ordre</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($questions as $question)

                        <tr class="table-row" data-href="{{action('QuestionController@edit', $question->id)}}">
                            <th scope="row">{{ $question->id }}</th>
                            <td>{{ $question->value }}</td>
                            <td>{{ $question->category->name }}</td>
                            <td>{{ $question->attribute->name }}</td>
                            <td>{{ $question->order }}</td>
                            <td class="d-flex justify-content-end right-align">
                                <a href="{{action('QuestionController@edit', $question->id)}}" class="btn btn-link">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{action('QuestionController@destroy', $question->id)}}" method="post">
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

                <p class="text-center">Aucun produit n'est affichable actuellement</p>

            @endif

        </div>



    @endslot

@endcomponent