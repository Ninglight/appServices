@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="my-5 text-center">Mettre à jour la valeur du produit</h1>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ action('ProductValueController@update', $product_value->id) }} }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Produit</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="product_id">
                            @foreach( $products as $product)
                                <option value="{{ $product->id }}" {{$product->id == $product_value->attribute->id ? 'selected' : ''}}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Produit</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="product_id">
                            @foreach( $default_values as $default_value)
                                <option value="{{ $product->id }}" {{$product->id == $product_value->attribute->id ? 'selected' : ''}}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>

            </div>

        </div>



    @endslot

@endcomponent