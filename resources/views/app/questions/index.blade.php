@component('layouts.app')

    @slot('main')

        <div class="main-screen d-flex flex-column">

            @include('components.navbar')

            @include('components.alerts')

            <div class="main-background"
                 style="background-image: url({{ asset('images/blank-illustration.svg') }}"></div>

            <div class="container main-content my-auto pb-5">
                <h1 class="lg-3 center-align mb-5">
                    @lang('global.category_baseline')
                </h1>


                <div class="row d-flex justify-content-center">

                    @foreach($categories as $category)

                        <a href="{{ action('AppQuestionController@initUserPath', $category->id )}}">
                            <div class="card category-card m-2"
                                 style="background-image: url({{ asset('storage/'.$category->url_img) }})">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $category->name }}</h2>
                                </div>
                            </div>
                        </a>

                    @endforeach

                </div>

            </div>
        </div>







    @endslot

@endcomponent