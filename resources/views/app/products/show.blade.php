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
                        <div class="right-align">
                            <img class="product-brand-img ml-auto" src="{{ asset('storage/'.$product->brand->url_logo) }}" alt="logo {{$product->brand->name}}">
                        </div>
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <p class="text-muted product-category">{{ $product->category->name }}</p>
                        <p class="product-description">{{ $product->description }}</p>

                        <div class="d-flex justify-content-center flex-column center-align">
                            @if(__('global.product_price') == 'true')
                                <p class="product-price">{{ $product->price }} € {{ __('global.product_price_taxe') }}</p>
                            @endif
                            @if($product->url_ecommerce)
                                <a href="{{ $product->url_ecommerce }}" class="btn btn-primary" target="_blank">
                                    {{ __('global.product_link_connexing') }}
                                </a>
                            @endif
                            <a href="{{ __('global.product_link_quotation_link') }}" class="btn btn-outline-primary mt-2" target="_blank">
                                {{ __('global.product_link_quotation') }}
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