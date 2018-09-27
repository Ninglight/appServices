@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Products list</h1>

                <a href="{{action('ProductController@create')}}" class="btn btn-primary ml-auto p-2">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Create a product
                </a>
            </div>

            @include('components.alerts')

            @if(count($products))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Constructor ref</th>
                        <th scope="col">Connexing ref</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)

                        <tr class="table-row" data-href="{{action('ProductController@edit', $product->id)}}">
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->brand->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->constructor_reference }}</td>
                            <td>{{ $product->connexing_reference }}</td>
                            <td class="d-flex justify-content-end right-align">
                                <a href="{{action('ProductController@edit', $product->id)}}" class="btn btn-link">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{action('ProductController@destroy', $product->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-link" type="submit">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            @else

                <p class="text-center">Aucun produit n'est affichable actuellement</p>

            @endif

        </div>



    @endslot

@endcomponent