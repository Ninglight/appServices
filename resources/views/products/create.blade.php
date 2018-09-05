@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Create a product</h1>
            </div>

            @include('components.alerts')


            <form method="post" action="{{ url('/admin/products') }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="form-group col-sm-12">
                        <label for="exampleFormControlSelect1">Status</label><br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary">
                                <input type="radio" name="status" id="option1" autocomplete="off" value="1" required>
                                Enabled
                            </label>
                            <label class="btn btn-primary">
                                <input type="radio" name="status" id="option2" autocomplete="off" value="0" required>
                                Disabled
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputTitle">Name</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp"
                               name="name" required value="{{ old('name') }}">
                    </div>

                </div>
                <div class="row">

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlSelect1">Brand</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                            @foreach( $brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="exampleInputTitle">Description</label>
                        <textarea type="text" class="form-control" id="exampleInputTitle" aria-describedby="descHelp"
                                  name="description" required value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputTitle">Constructor reference</label>
                        <input type="text" class="form-control" id="exampleInputTitle"
                               aria-describedby="constructorHelp" name="constructor_reference" required
                               value="{{ old('constructor_reference') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputTitle">Connexing reference</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="connexingHelp"
                               name="connexing_reference" required value="{{ old('connexing_reference') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputTitle">Link to external picture</label>
                        <input type="text" class="form-control" id="external_url_imgTitle"
                               aria-describedby="external_url_imgHelp" name="external_url_img" required
                               value="{{ old('external_url_img') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputTitle">Link to ecommerce page</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="connexingHelp"
                               name="url_ecommerce" required value="{{ old('url_ecommerce') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputTitle">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">€</span>
                            </div>
                            <input type="number" class="form-control" id="exampleInputTitle"
                                   aria-describedby="connexingHelp" data-number-to-fixed="2"
                                   data-number-stepfactor="100" name="price" value="00.00" step="0.01" required
                                   value="{{ old('price') }}">
                        </div>
                    </div>



                    <div class="col-sm-12 mt-4 mb-4 d-flex justify-content-between">
                        <a href="{{action('ProductController@index')}}" class="btn btn-outline-primary">
                            Back
                        </a>
                        <button type="submit" class="btn btn-primary ">Create a product</button>
                    </div>
                </div>
            </form>
        </div>


    @endslot

@endcomponent