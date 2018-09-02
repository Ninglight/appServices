@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Liste des utilisateurs</h1>

                <a href="{{action('UserController@create')}}" class="btn btn-primary ml-auto p-2">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Créer un utilisateur
                </a>
            </div>

            @include('components.alerts')

            @if(count($users))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Adresse mail</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)

                        <tr class="table-row" data-href="{{action('UserController@edit', $user->id)}}">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex justify-content-end right-align">
                                <a id="send" href="{{action('UserController@edit', $user->id)}}" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="Renouvellement de mot de passe">
                                    <i class="fas fa-paper-plane"></i>
                                </a>
                                <form action="{{action('UserController@destroy', $user->id)}}" method="post">
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

                <p class="text-center">Aucun utilisateur n'est enregistré actuellement</p>

            @endif

        </div>



    @endslot

@endcomponent