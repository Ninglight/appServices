@component('layouts.app')


    @slot('main')

        <div class="container">
            <h1 class="mt-5 text-center">{{ $product->brand->name }} - {{ $product->name }}</h1>
            <a href="{{ url('/products') }}" class="btn btn-link">Return</a>

            <p>Catégorie : {{ $product->category->name }}</p>
            <p>Description : {{ $product->description }}</p>
            <p>Réf. constructeur : {{ $product->constructor_reference }}</p>
            <p>Réf. connexing : {{ $product->connexing_reference }}</p>
            <p>Prix : {{ $product->price }}</p>



            @if (Auth::check())
                <a href="{{action('ProductController@edit', $product->id)}}" class="btn btn-warning">Modifier</a>
                <form action="{{action('ProductController@destroy', $product->id)}}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            @endif



        </div>



    @endslot

@endcomponent