@component('layouts.app')


    @slot('main')

        <div class="container">
            <h1 class="mt-5 text-center">{{ $category->name }}</h1>

            <a href="{{ url('/categories') }}" class="btn btn-link">Return</a>
            @if (Auth::check())
                <a href="{{action('CategoryController@edit', $category->id)}}" class="btn btn-warning">Modifier</a>
                <form action="{{action('CategoryController@destroy', $category->id)}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            @endif



        </div>



    @endslot

@endcomponent