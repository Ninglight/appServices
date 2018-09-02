@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Créer un attribut produit</h1>
            </div>

            @include('components.alerts')


                    <form method="post" action="{{ url('/admin/attributes') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Catégorie produit</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    @foreach( $categories as $category)
                                        @if (old('category_id') == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Nom</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="nameHelp" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Code Attribut</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="identificationHelp" name="identification" value="{{ old('identification') }}">
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="assignment_multiple" id="assignment_multiple">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Il s'agit d'un attribut aux valeurs multiples.
                                    </label>
                                </div>
                            </div>
                                <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                                    <a href="{{action('AttributeController@index')}}" class="btn btn-outline-primary">
                                        Retour
                                    </a>
                                    <button type="submit" class="btn btn-primary">Créer l'attribut</button>
                                </div>
                            </div>


                    </form>






    @endslot

@endcomponent