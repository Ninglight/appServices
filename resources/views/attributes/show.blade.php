@component('layouts.app')


    @slot('main')

        <div class="container">
            <h1 class="mt-5 text-center">{{ $attribute->name }}</h1>
            <a href="{{ url('/attributes') }}" class="btn btn-link">Return</a>

            <p>Catégorie : {{ $attribute->category->name }}</p>



            @if (Auth::check())
                <a href="{{action('AttributeController@edit', $attribute->id)}}" class="btn btn-warning">Modifier</a>
                <form action="{{action('AttributeController@destroy', $attribute->id)}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            @endif



        </div>



    @endslot

@endcomponent