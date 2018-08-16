@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Créer une question</h1>
            </div>

            @include('components.alerts')


            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#question" role="tab"
                       aria-controls="home" aria-selected="true">Général</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#answer" role="tab"
                       aria-controls="profile" aria-selected="false">Réponse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#information" role="tab"
                       aria-controls="profile" aria-selected="false">Information</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="question" role="tabpanel" aria-labelledby="home-tab">

                    <form method="post" class="row" action="{{ url('/admin/questions') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="exampleInputTitle">Libellé de la question</label>
                            <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="valueHelp"
                                   name="value" required value="{{ old('value') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Catégorie du produit</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                @foreach( $categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Attribut lié</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="attribute_id">
                                @foreach( $attributes as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Ordre d'apparition</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="order">
                                @for ($i = 1; $i < 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                            <a href="{{action('ProductController@index')}}" class="btn btn-outline-primary">
                                Retour
                            </a>
                            <button type="submit" class="btn btn-primary ">Créer la question</button>
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade" id="answer" role="tabpanel" aria-labelledby="profile-tab">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Libellé de la réponse</th>
                            <th scope="col">Valeur par défault</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <!--foreach($default_values as $default_value)-->

                        <tr class="table-row-fields">
                            <form method="post" action="{{ action('AttributeController@update', 1) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <input name="_method" type="hidden" value="PATCH">
                                <th scope="row">#</th>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputTitle"
                                               aria-describedby="nameHelp"
                                               name="name" required value="$default_value->value">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="default_value">
                                            @foreach( $default_values as $default_value)
                                                <option value="{{ $default_value->id }}">{{ $default_value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td class="d-flex justify-content-end right-align">
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    <form action="{{action('AttributeController@destroy', 1)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-link" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </form>
                        </tr>

                        <tr class="table-row-fields">
                            <form method="post" action="{{ action('AttributeController@update', 1) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <input name="_method" type="hidden" value="PATCH">
                                <th scope="row">#</th>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputTitle"
                                               aria-describedby="nameHelp"
                                               name="name" required value="$default_value->value">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="default_value">
                                            @foreach( $default_values as $default_value)
                                                <option value="{{ $default_value->id }}">{{ $default_value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td class="d-flex justify-content-end right-align">
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    <form action="{{action('AttributeController@destroy', 1)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-link" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </form>
                        </tr>

                        <tr class="table-row-fields table-row-primary-background">
                            <form method="post" method="post" action="{{ url('/admin/attributes') }}"
                                  enctype="multipart/form-data"
                                  enctype="multipart/form-data">
                                @csrf
                                <input name="_method" type="hidden" value="PATCH">
                                <th scope="row">#</th>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputTitle"
                                               aria-describedby="nameHelp"
                                               name="name" required value="$default_value->value">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="default_value">
                                            @foreach( $default_values as $default_value)
                                                <option value="{{ $default_value->id }}">{{ $default_value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td class="d-flex justify-content-end right-align">
                                    <button type="submit" class="btn btn-secondary">Créer une réponse</button>
                                    <form action="{{action('AttributeController@destroy', 1)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-link" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </form>
                        </tr>

                        <!--endforeach-->

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="exampleFormControlSelect1">Title</label>
                            <input type="text" class="form-control" id="exampleInputTitle"
                                   aria-describedby="titleHelp"
                                   name="title" required value="{{ old('title') }}">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="exampleInputTitle">Description</label>
                            <textarea type="text" class="form-control" id="exampleInputTitle"
                                      aria-describedby="descHelp" name="description"
                                      required>{{ old('desc') }}</textarea>
                        </div>
                        <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                            <a href="{{action('ProductController@index')}}" class="btn btn-outline-primary">
                                Retour
                            </a>
                            <button type="submit" class="btn btn-primary ">Créer l'information</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">


            </div>

        </div>


    @endslot

@endcomponent