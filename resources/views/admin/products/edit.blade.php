@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Update a product</h1>
            </div>

            @include('components.alerts')


            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                       aria-controls="home" aria-selected="true">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                       aria-controls="profile" aria-selected="false">Attributes</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


                    <form method="post" action="{{ action('ProductController@update', $product->id) }} }}"
                          enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label><br>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary {{$product->status == 1 ? ' active' : ''}}">
                                    <input type="radio" name="status" id="option1" autocomplete="off"
                                           value="1" {{$product->status == 1 ? 'checked' : ''}}> Activé
                                </label>
                                <label class="btn btn-primary {{$product->status == 0 ? ' active' : ''}}">
                                    <input type="radio" name="status" id="option2" autocomplete="off"
                                           value="0" {{$product->status == 0 ? 'checked' : ''}}> Désactivé
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Name</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="nameHelp"
                                       name="name" required value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                    @foreach( $categories as $category)
                                        <option value="{{ $category->id }}" {{$category->id == $product->category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Brand</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="brand_id">
                                    @foreach( $brands as $brand)
                                        <option value="{{ $brand->id }}" {{$brand->id == $product->brand->id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="exampleInputTitle">Description</label>
                                <textarea type="text" class="form-control" id="exampleInputTitle"
                                          aria-describedby="descHelp" name="description"
                                          required>{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Constructor reference</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="constructorHelp" name="constructor_reference" required
                                       value="{{ $product->constructor_reference }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Connexing reference</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="connexingHelp" name="connexing_reference" required
                                       value="{{ $product->connexing_reference }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Link to external picture</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="connexingHelp" name="url_ecommerce" required
                                       value="{{ $product->url_ecommerce }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Link to ecommerce page</label>
                                <input type="text" class="form-control" id="external_url_imgTitle"
                                       aria-describedby="external_url_imgHelp" name="external_url_img" required
                                       value="{{ $product->external_url_img }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputTitle">Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">€</span>
                                    </div>
                                    <input type="number" class="form-control" id="exampleInputTitle"
                                           aria-describedby="connexingHelp" data-number-to-fixed="2"
                                           data-number-stepfactor="100" name="price" step="0.01" required
                                           value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                                <a href="{{action('ProductController@index')}}" class="btn btn-outline-primary">
                                    Back
                                </a>
                                <button type="submit" class="btn btn-primary">Update this product</button>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <form method="post"
                              action="{{ action('ProductValueController@update', $product->id) }} }}"
                              enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">



                            <div class="row">
                            @foreach($product->category->attributes as $attribute)

                                @if($attribute->assignment_multiple == 0)

                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">{{ $attribute->name }}</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="{{ $attribute->identification }}">
                                            <option value="null">Unspecified</option>
                                            @foreach($attribute->default_values as $default_value)
                                                <option value="{{ $default_value->id }}" @foreach($product->product_values as $product_value) {{$product_value->default_value_id == $default_value->id ? 'selected' : ''}} @endforeach>{{ $default_value->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                @else

                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect2">{{ $attribute->name }}</label>
                                        <select multiple class="form-control" id="exampleFormControlSelect2" name="{{ $attribute->identification }}[]">
                                            <option value="null">Unspecified</option>
                                            @foreach($attribute->default_values as $default_value)
                                                <option value="{{ $default_value->id }}"  @foreach($product->product_values as $product_value) {{$product_value->default_value_id == $default_value->id ? 'selected' : ''}} @endforeach>{{ $default_value->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                @endif


                            @endforeach

                            <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                                <a href="{{action('ProductController@index')}}" class="btn btn-outline-primary">
                                    Back
                                </a>
                                <button type="submit" class="btn btn-primary">Update attributes</button>
                            </div>
                            </div>

                        </form>

                </div>
            </div>


        </div>



    @endslot

@endcomponent