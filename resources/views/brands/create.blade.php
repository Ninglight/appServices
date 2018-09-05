@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Create a brand</h1>
            </div>

            @include('components.alerts')


                <form class="row" method="post" action="{{ url('/admin/brands') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-6">
                        <label for="exampleInputTitle">Name</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp" name="name">
                    </div>
                    <div class="form-group col-md-6 form-group-file">
                        <label for="logoUrlInput" class="form-trigger-file">logo</label><br/>
                        <input type="file" class="form-control-file" id="logoInput" aria-describedby="logoHelp" name="logo" value="{{old('url_logo')}}" accept="image/*" required>
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                        <a href="{{action('BrandController@index')}}" class="btn btn-outline-primary">
                            Back
                        </a>
                        <button type="submit" class="btn btn-primary ">Create a brand</button>
                    </div>
                </form>

        </div>

    @endslot

@endcomponent