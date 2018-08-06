@component('layouts.app')


    @slot('main')

        <div class="container">
            <h1 class="mt-5 text-center">{{ $brand->name }}</h1>
            <img src="{{ $brand->url_logo }}" alt="logo {{ $brand->name }}">

            <a href="{{ url('/brands') }}" class="btn btn-link">Return</a>
            @if (Auth::check())
                <a href="{{action('BrandController@edit', $brand->id)}}" class="btn btn-warning">Modifier</a>
                <form action="{{action('BrandController@destroy', $brand->id)}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            @endif

        </div>

    @endslot

@endcomponent