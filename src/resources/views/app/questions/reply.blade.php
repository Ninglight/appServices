@component('layouts.app')

    @slot('main')

        <div class="main-screen d-flex flex-column">

            @include('components.navbar')

            @include('components.alerts')

            <div class="main-background" style="background-image: url({{ asset('images/blank-illustration.svg') }}"></div>

            <div class="main-leaf" style="background-image: url({{ asset('images/main-leaf.svg') }}"></div>

            @if($current_question->information)

                <div class="container-information d-flex justify-content-center" data-toggle="modal" data-target="#exampleModal">
                    <div class="card d-flex flex-row align-items-center justify-content-center">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        <p>{{ $current_question->information->title }}. <span class="text-primary">En savoir plus</span></p>

                    </div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog d-flex justify-content-center" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $current_question->information->title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="card-text">{{ $current_question->information->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>



            @endif

            <div class="container main-content align-self-center mb-auto">

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