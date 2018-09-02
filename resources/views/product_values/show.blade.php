@component('layouts.app')


    @slot('main')

        <div class="container">
            <h1 class="mt-5 text-center">{{ $default_value->name }}</h1>
            <a href="{{ url('/default_values') }}" class="btn btn-link">Return</a>

            <p>Attribut : {{ $default_value->attribute->name }}</p>



            @if (Auth::check())
                <a href="{{action('DefaultValueController@edit', $default_value->id)}}" class="btn btn-warning">Modifier</a>
                <form action="{{action('DefaultValueController@destroy', $default_value->id)}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            @endif



        </div>



    @endslot

@endcomponent