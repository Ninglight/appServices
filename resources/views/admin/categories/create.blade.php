@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Create a category</h1>
            </div>

            @include('components.alerts')


                <form class="row" method="post" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="nameInputTitle">Name</label>
                        <input type="text" class="form-control" id="nameInputTitle" aria-describedby="nameHelp" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="identificationInputTitle">identification</label>
                        <input type="text" class="form-control" id="identificationInputTitle" aria-describedby="identificationHelp" name="identification">
                    </div>
                    <div class="form-group col-md-6 form-group-file">
                        <label for="logoUrlInput" class="form-trigger-file">Picture</label>
                        <input type="file" class="form-control-file" id="imageInput" aria-describedby="imageHelp" name="image" accept="image/*" required>
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                        <a href="{{action('CategoryController@index')}}" class="btn btn-outline-primary">
                            Back
                        </a>
                        <button type="submit" class="btn btn-primary ">Create a category</button>
                    </div>
                </form>

        </div>



    @endslot

@endcomponent