@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="my-5 text-center">Créer une valeur par défaut</h1>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ url('/default_values') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Attribut de la valeur</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="attribute_id">
                            @foreach( $attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTitle">Valeur</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp" name="value" required value="{{ old('value') }}">
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>

            </div>

        </div>



    @endslot

@endcomponent