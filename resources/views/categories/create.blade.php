@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Créer une catégorie</h1>
            </div>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nameInputTitle">Nom</label>
                        <input type="text" class="form-control" id="nameInputTitle" aria-describedby="nameHelp" name="name">
                    </div>
                    <div class="form-group form-group-file">
                        <label for="logoUrlInput" class="form-trigger-file">Image</label>
                        <input type="file" class="form-control-file" id="imageInput" aria-describedby="imageHelp" name="image" accept="image/*" required>
                    </div>
                    <div class="form-group">
                        <label for="identificationInputTitle">Code d’identification</label>
                        <input type="text" class="form-control" id="identificationInputTitle" aria-describedby="identificationHelp" name="identification">
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between">
                        <a href="{{action('CategoryController@index')}}" class="btn btn-outline-primary">
                            Retour
                        </a>
                        <button type="submit" class="btn btn-primary ">Créer une catégorie</button>
                    </div>
                </form>

            </div>

        </div>



    @endslot

@endcomponent