@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Update a category</h1>
            </div>

            @include('components.alerts')


            <form class="row" method="post" action="{{ action('CategoryController@update', $category->id) }}"
                  enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="form-group col-md-6">
                    <label for="exampleInputTitle">Nom</label>
                    <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp"
                           name="name" value="{{$category->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="identificationInputTitle">Code d’identification</label>
                    <input type="text" class="form-control" id="identificationInputTitle"
                           aria-describedby="identificationHelp" name="identification"
                           value="{{$category->identification}}">
                </div>
                <div class="form-group col-md-6 form-group-file">
                    <label for="logoUrlInput" class="form-trigger-file">Image actuelle</label><br/>
                    <img src="{{ asset('storage/'.$category->url_img) }}" alt="image {{ $category->name }}" width="50"
                         class="mb-2">
                    <input type="file" class="form-control-file" id="imageInput" aria-describedby="imageHelp"
                           name="image" value="{{$category->url_img}}" accept="image/*">
                </div>

                <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                    <a href="{{action('CategoryController@index')}}" class="btn btn-outline-primary">
                        Back
                    </a>
                    <button type="submit" class="btn btn-primary">Update this category</button>
                </div>
            </form>


        </div>



    @endslot

@endcomponent