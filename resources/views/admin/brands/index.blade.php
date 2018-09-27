@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Brands list</h1>

                <a href="{{action('BrandController@create')}}" class="btn btn-primary ml-auto p-2">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Create a brand
                </a>
            </div>

            @include('components.alerts')

            @if(count($brands))

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($brands as $brand)

                        <tr class="table-row" data-href="{{action('BrandController@edit', $brand->id)}}">
                            <th scope="row">{{ $brand->id }}</th>
                            <td>
                                <img src="{{ asset('storage/'.$brand->url_logo) }}" alt="logo {{ $brand->name }}" width="50">
                            </td>
                            <td>{{ $brand->name }}</td>
                            <td class="d-flex justify-content-end right-align">
                                <a href="{{action('BrandController@edit', $brand->id)}}" class="btn btn-link">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{action('BrandController@destroy', $brand->id)}}" method="post">
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

                <p class="text-center">Any brand registred.</p>

            @endif

        </div>



    @endslot

@endcomponent