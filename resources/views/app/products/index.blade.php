@component('layouts.app')

    @slot('main')

        @include('components.navbar')

        @include('components.alerts')

        <div class="container products-container">

            <form method="post" action="{{action('AppProductController@updateFilters')}}" enctype="multipart/form-data">
                @csrf
                <input name="category" type="hidden" value="{{ $category->id }}">


                <div class="row p-3">
                    <h2>{{ __('global.products_baseline') }}</h2>
                </div>


                <div class="accordion w-100" id="accordionExample">
                    <div class="card filter-card">
                        <div class="card-header" id="headingOne">
                            <h2 data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                <i class="fas fa-filter"></i>{{ __('global.filter_baseline') }}
                            </h2>

                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body">


                                <div class="row d-flex justify-content-center">

                                    @foreach($category->attributes as $attribute)

                                        @if($attribute->assignment_multiple == 0)

                                            <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                                <label for="exampleFormControlSelect1">{{ $attribute->name }}</label><br>
                                                <div class=" btn-group-toggle" data-toggle="buttons">
                                                    @foreach($attribute->default_values as $default_value)
                                                        <label class="btn btn-outline-info btn-radio @if($filters) @foreach($filters as $filter) {{ $default_value->id == $filter->id ? 'active' : '' }} @endforeach @endif">
                                                            <input type="radio" name="{{ $attribute->identification }}[{{ $default_value->id }}]"
                                                                   id="{{ $default_value->value }}" autocomplete="off"
                                                                   value={{ $default_value->id }} @if($filters) @foreach($filters as $filter) {{ $default_value->id == $filter->id ? 'checked' : '' }} @endforeach @endif> {{ $default_value->value }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>

                                        @else

                                            <div class="col-lg-3 col-md-4 col-sm-6 form-group">
                                                <label for="exampleFormControlSelect1">{{ $attribute->name }}</label><br>
                                                <div class=" btn-group-toggle" data-toggle="buttons">
                                                    @foreach($attribute->default_values as $default_value)
                                                        <label class="btn btn-outline-info btn-radio @if($filters) @foreach($filters as $filter) {{ $default_value->id == $filter->id ? 'active' : '' }} @endforeach @endif">
                                                            <input type="checkbox" name="{{ $attribute->identification }}[{{ $default_value->id }}]"
                                                                   id="{{ $default_value->value }}" autocomplete="off"
                                                                   value={{ $default_value->id }} @if($filters) @foreach($filters as $filter) {{ $default_value->id == $filter->id ? 'checked' : '' }} @endforeach @endif> {{ $default_value->value }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>


                                        @endif

                                    @endforeach


                                </div>

                                <div class="row mt-3 d-flex justify-content-center">
                                    <button type="submit"
                                            class="btn btn-primary mx-2">{{ __('global.filter_validate') }}
                                    </button>
                                    <a href="{{ action('AppProductController@index', ['category' => $category->id] )}}"
                                       class="btn btn-outline-primary mx-2">
                                        {{ __('global.filter_trash') }}
                                    </a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

            </form>


            <div class="row d-flex justify-content-center flex-row align-items-stretch my-3">

                @if(count($products) > 0 )

                    @foreach($products as $product)

                        <a class="col-lg-3 col-md-4 col-6 product-card mt-3"
                           href="{{action('AppProductController@show', $product->id )}}">
                            <div class="card">
                                <div class="card-img d-flex align-items-center">
                                    <img class="card-img-top"
                                         onerror="this.onerror=null;this.src='{{ asset('images/blank.svg') }}';"
                                         src="{{ $product->external_url_img }}" alt="Card image cap">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title">{{ $product->name }}</h3>
                                </div>
                            </div>
                        </a>

                    @endforeach

                @else

                    <p class="text-muted">{{ __('global.products_any') }}</p>

                @endif

            </div>

        </div>


    @endslot

@endcomponent