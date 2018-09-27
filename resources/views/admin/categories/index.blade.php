@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Categories list</h1>

                <a href="{{action('CategoryController@create')}}" class="btn btn-primary ml-auto p-2">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Create a category
                </a>
            </div>

            @include('components.alerts')

            @if(count($categories))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Identification</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)

                        <tr class="table-row" data-href="{{action('CategoryController@edit', $category->id)}}">
                            <th scope="row" class="">{{ $category->id }}</th>
                            <td class="">{{ $category->name }}</td>
                            <td class="">{{ $category->identification }}</td>
                            <td class="d-flex justify-content-end right-align">
                                <a href="{{action('CategoryController@edit', $category->id)}}" class="btn btn-link">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{action('CategoryController@destroy', $category->id)}}" method="post">
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

                <p class="text-center">Any category registred</p>

            @endif

        </div>



    @endslot

@endcomponent