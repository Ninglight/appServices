@component('layouts.app')

    @slot('main')

        <div class="main-screen d-flex flex-column">

            @include('components.navbar')

            @include('components.alerts')

            <div class="main-background" style="background-image: url({{ asset('images/blank-illustration.svg') }}"></div>

            <div class="main-leaf" style="background-image: url({{ asset('images/main-leaf.svg') }}"></div>

            <div class="container main-content align-self-center mb-auto pb-5">
                <h1 class="lg-3 center-align mb-5">
                    Séléctionnez une catégorie de produit
                </h1>

                <div class="row d-flex justify-content-center">

                    @foreach($categories as $category)

                        <a href="{{ action('AppProductController@index', ['category' => $category->id] )}}">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card category-card" style="background-image: url({{ asset('storage/'.$category->url_img) }})">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $category->name }}</h2>
                                    </div>
                                </div>
                            </div>
                        </a>

                    @endforeach

                </div>

            </div>
        </div>







    @endslot

@endcomponent