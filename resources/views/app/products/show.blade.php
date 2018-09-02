@component('layouts.app')

    @slot('main')

        @include('components.navbar')

        @include('components.alerts')

        <div class="container products-container">

            <div class="row">

                <div class="col-md-7 product-img">
                    <img src="{{ $product->external_url_img }}" alt="image {{ $product->name }}" onerror="this.onerror=null;this.src='{{ asset('images/blank.svg') }}';">
                </div>

                <div class="col-md-5 product-main">
                    <div class="w-100 mt-5">
                        <img src="{{ asset('storage/'.$product->brand->url_logo) }}" alt="">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <p class="text-muted product-category">{{ $product->category->name }}</p>
                        <p class="product-description">{{ $product->description }}</p>

                        <div class="d-flex justify-content-center flex-column center-align">
                            <p class="product-price">{{ $product->price }} €</p>
                            <a href="{{ $product->url_ecommerce }}" class="btn btn-primary">
                                Commander sur connexing.fr
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row d-flex justify-content-center my-5">
                <ul class="product-data list-group col-md-6 col-sm-10">
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="font-weight-bold">Référence constructeur</p>
                        <p>{{ $product->constructor_reference }}</p>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <p class="font-weight-bold">Référence connexing</p>
                        <p>{{ $product->connexing_reference }}</p>
                    </li>


                    @foreach($product->category->attributes as $attribute)
                        @foreach($product->product_values as $product_value)
                            @if($product_value->attribute->id == $attribute->id)
                                <li class="list-group-item d-flex justify-content-between">
                                    <p class="font-weight-bold">{{ $attribute->name }}</p>
                                    <p>{{ $product_value->default_value->value }}</p>
                                </li>
                            @endif
                        @endforeach
                    @endforeach

                </ul>
            </div>

        </div>


    @endslot

@endcomponent