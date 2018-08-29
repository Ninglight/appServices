@component('layouts.app')

    @slot('main')

        @include('components.navbar')

        @include('components.alerts')

        <div class="main-leaf" style="background-image: url({{ asset('images/main-leaf.svg') }}"></div>

        <div class="container">

            <div class="row">

                <div class="card w-100">
                    <h2>Filtrer les resultats</h2>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Statut</label><br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="status" id="option1" autocomplete="off" value="1"> Activé
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="status" id="option2" autocomplete="off"
                                       value="0"> Désactivé
                            </label>
                        </div>
                    </div>

                </div>
            </div>


            <div class="row">
                <h2>Liste des articles</h2>
            </div>

            <div class="row d-flex justify-content-center">

                @foreach($products as $product)

                    <a class="col-lg-3 col-md-4 col-sm-6" href="{{action('AppProductController@show', $product->id )}}">
                        <div class="card">
                            <img class="card-img-top" src="{{ $product->external_url_img }}" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $product->name }}</h2>
                            </div>
                        </div>
                    </a>

                @endforeach

            </div>


        </div>


    @endslot

@endcomponent