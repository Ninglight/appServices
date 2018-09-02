@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Importer votre fichier</h1>

            </div>

            <!--<div class="bd-callout">
                <h5>Informations complémentaire pour l'import</h5>
                <p>De type </p>
            </div>-->

            @include('components.alerts')

            <div class="row">

                <form class="col-md-6" method="post" action="{{ url('/admin/import') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Catégorie de produit à importer</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('csv_file') ? ' has-error' : '' }}">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" aria-describedby="fileHelp"
                                   name="file" accept=".csv" required>
                            <label class="custom-file-label" for="fileInput">Choisissez un fichier...</label>
                            @if ($errors->has('csv_file'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('csv_file') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="header" checked> Le fichier contient un header ?
                            </label>
                        </div>
                    </div>

                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary ">Importer votre fichier</button>
                    </div>
                </form>

            </div>

            <div class="my-4">
                <h2>Information relative aux imports</h2>
                <p>L'import de données de cette application sert à importer deux type de données : <span class="text-primary">Des produits et leurs attributs</span>.</p>
            </div>
            <div class="my-4">
                <h3>Les produits</h3>
                <p>La <span class="text-primary">référence constructeur</span> d'un produit est sa preuve de vérité. C'est à dire que ce qui définit un produit est sa référence constructeur.</p>
                <p>Lors de l'import de produit, toutes données différentes seront remplacés, sauf si elles sont vides. Cela est très utile pour des mise à jour produit, cependant, il faut faire doublement attention aux informations utilisés.</p>
                <p>Les données liés aux produits sont, entre parenthèses ont retrouve l'identifiant pour l'import :</p>
                <ul>
                    <li>Nom (name)</li>
                    <li>Description (description)</li>
                    <li>Référence constructeur (constructor_reference)</li>
                    <li>Prix (price)</li>
                    <li>Lien de la page produit (url_ecommerce)</li>
                    <li>Lien vers l’image du produit (external_url_img)</li>
                    <li>Visible ou non sur le site (status)</li>
                    <li>Marque (brand_id)</li>
                </ul>
            </div>

            <div class="my-4">
                <h3>Les attributs</h3>
                <p>Les attributs doivent être crées en amont d'un import, avec leurs valeurs par défaut. L'attribut <span class="text-primary">identification</span>, permettra pour les valeurs par défaut de reconnaître les attributs dans votre fichier d'import.
                La logique introduite est de reconnaître si une cellule <span class="text-primary">contient</span> ou <span class="text-primary">est</span> la valeur <span class="text-primary">identification</span>.</p>
                <p>Pour illustrer le propos, on identifira l'identifiant <span class="text-primary">Casque filaires</span> par l'id utilisé dans Magento, soit <span class="text-primary">250</span>, dans la liste des catégorie d'un produit.</p>
                <p>L'import de valeur d'un produit fonctionne sous forme d'<span class="text-primary">annule et remplace</span>.</p>
            </div>


        </div>



    @endslot

@endcomponent

