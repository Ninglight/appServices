@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Update a brand</h1>
            </div>

            @include('components.alerts')

                <form class="row" method="post" action="{{ action('BrandController@update', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="form-group col-md-6">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" aria-describedby="nameHelp" name="name" value="{{$brand->name}}">
                    </div>
                    <div class="form-group col-md-6 form-group-file">
                        <label for="logoUrlInput" class="form-trigger-file">Actual logo</label><br/>
                        <img src="{{ asset('storage/'.$brand->url_logo) }}" alt="image {{ $brand->name }}" width="50" class="mb-2">
                        <input type="file" class="form-control-file" id="logoInput" aria-describedby="logoHelp" name="logo" value="{{$brand->url_logo}}" accept="image/*">
                    </div>
                    <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                        <a href="{{action('BrandController@index')}}" class="btn btn-outline-primary">
                            Back
                        </a>
                        <button type="submit" class="btn btn-primary">Update this brand</button>
                    </div>
                </form>

            </div>

        </div>



    @endslot

@endcomponent