@component('layouts.app')

    @slot('main')

        <div class="main-screen d-flex">

            @include('components.navbar')

            @include('components.alerts')

            <div class="main-background" style="background-image: url({{ asset('images/main.svg') }}"></div>
            <div class="main-leaf" style="background-image: url({{ asset('images/main-leaf.svg') }}"></div>

            <div class="container main-content align-self-center">
                <h1 class="mb-3 left-align">
                    Définissons vos besoins, <br>
                    nous trouvons votre solution
                </h1>
                <button class="btn btn-info">
                    Répondre aux questions
                </button>
            </div>
        </div>


        <div class="container mt-3">


            <div class="products-filter d-flex">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <div class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <img src="{{ asset('icons/filter.svg') }}" alt="">
                                    Filtrer les resultats
                                </div>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="products-list d-flex flex-wrap align-content-start justify-content-around">

                <div class="card">
                    <img class="card-img-top" src="https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/j/a/jabra-speak710-bluetooth.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/j/a/jabra-speak710-bluetooth.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>

                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/j/a/jabra-speak710-bluetooth.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/j/a/jabra-speak710-bluetooth.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/j/a/jabra-speak710-bluetooth.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="https://www.connexing.fr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/j/a/jabra-speak710-bluetooth.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                    </div>
                </div>

            </div>
        </div>




    @endslot

@endcomponent