@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Mettre à jour un attribut produit</h1>
            </div>

            @include('components.alerts')

            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general" role="tab"
                       aria-controls="home" aria-selected="true">Général</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#attribute" role="tab"
                       aria-controls="profile" aria-selected="false">Valeurs</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="home-tab">
                    <form method="post" action="{{ action('AttributeController@update', $attribute->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Catégorie produit</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    @foreach( $categories as $category)
                                        @if ($attribute->category_id == $category->id)
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
                                       aria-describedby="nameHelp" name="name" value="{{ $attribute->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Code Attribut</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="identificationHelp" name="identification" value="{{ $attribute->identification }}">
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="assignment_multiple" id="assignment_multiple" {{ $attribute->assignment_multiple == true ? 'checked' : '' }}>
                                    <label class="form-check-label" for="defaultCheck1">
                                        Il s'agit d'un attribut aux valeurs multiples.
                                    </label>
                                </div>
                            </div>
                            <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                                <a href="{{action('AttributeController@index')}}" class="btn btn-outline-primary">
                                    Retour
                                </a>
                                <button type="submit" class="btn btn-primary">Mettre à jour l'attribut</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="attribute" role="tabpanel" aria-labelledby="profile-tab">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Valeur</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($attribute->default_values  as $default_value)



                            <tr class="table-row-fields">

                                <th scope="row">#</th>
                                <form method="post" action="{{ action('DefaultValueController@update', $default_value->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input name="_method" type="hidden" value="PATCH">
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputTitle"
                                                   aria-describedby="nameHelp"
                                                   name="value" required value="{{ $default_value->value }}">
                                        </div>
                                    </td>
                                    <input name="attribute_id" type="hidden" value="{{ $attribute->id }}">

                                <td>
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </td>
                                </form>
                                <td class="d-flex justify-content-end right-align">
                                    <form action="{{action('DefaultValueController@destroy', $default_value->id)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-link" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach

                        <tr class="table-row-fields table-row-primary-background">
                            <form method="post" action="{{ url('/admin/default_values') }}" enctype="multipart/form-data">
                                @csrf
                                <th scope="row">#</th>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputTitle"
                                               aria-describedby="valueHelp"
                                               name="value" required value="{{ old('value') }}">
                                    </div>
                                    <input name="attribute_id" type="hidden" value="{{ $attribute->id }}">
                                </td>
                                <td></td>
                                <td class="d-flex justify-content-end right-align">
                                    <button type="submit" class="btn btn-secondary">Créer une valeur</button>
                                </td>
                            </form>
                        </tr>

                        </tbody>
                    </table>


                </div>
            </div>

        </div>



    @endslot

@endcomponent