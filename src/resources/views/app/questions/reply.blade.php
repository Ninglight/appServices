@component('layouts.app')

    @slot('main')

        <div class="main-screen d-flex">

            @include('components.navbar')

            @include('components.alerts')

            <div class="main-leaf" style="background-image: url({{ asset('images/main-leaf.svg') }}"></div>

            @if($current_question->information)



                <div class="container-information">
                    <div class="card">
                        <h5 class="card-header">
                            <i class="fas fa-info-circle mr-2"></i>
                            {{ $current_question->information->title }}
                        </h5>

                        <div class="card-body">
                            <p class="card-text">{{ substr($current_question->information->content, 0, 100) . '...' }}</p>
                            <div class="right-align">
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                                    En savoir plus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




            @endif

            <div class="container main-content align-self-center">

                <h1 class="lg-3 center-align mb-3">
                    {{ $current_question->value }}
                </h1>

                <div class="row d-flex justify-content-center">

                    @foreach($current_question->answers as $answer)


                        <form method="post" action="{{action('AppQuestionController@updateUserPath')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="current_question" type="hidden" value="{{ $current_question->id }}">
                            <input name="answer" type="hidden" value="{{ $answer->id }}">

                            <button class="btn btn-primary mx-2">
                                {{ $answer->value }}
                            </button>
                        </form>

                    @endforeach

                </div>

                <div class="row d-flex justify-content-center">

                    <form method="post" action="{{action('AppQuestionController@updateUserPath')}}" enctype="multipart/form-data">
                        @csrf
                        <input name="current_question" type="hidden" value="{{ $current_question->id }}">
                        <input name="answer" type="hidden" value="null">

                        <button class="btn btn-link mx-2">
                            Je ne sais pas.
                        </button>
                    </form>

                </div>




                <div class="">

                    <div class="container question-navigation">
                        <ul>
                            @foreach($questions as $question)
                                <li>
                                    <form method="post" action="{{action('AppQuestionController@updateUserPath')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input name="current_question" type="hidden" value="{{ $current_question->id }}">

                                        <a class={{ $question->id == $current_question->id ? "is-active" : "" }} href=""></a>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                        <p>1/5</p>
                    </div>

                </div>



            </div>
        </div>







    @endslot

@endcomponent