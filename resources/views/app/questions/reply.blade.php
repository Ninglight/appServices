@component('layouts.app')

    @slot('main')

        <div class="main-screen d-flex flex-column">

            @include('components.navbar')

            @include('components.alerts')

            <div class="main-background"
                 style="background-image: url({{ asset('images/blank-illustration.svg') }}"></div>

            @if($current_question->information)

                <div class="container-information d-flex justify-content-center" data-toggle="modal"
                     data-target="#exampleModal">
                    <div class="card d-flex flex-row align-items-center justify-content-center">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        <p>{{ $current_question->information->title }}
                            <span class="text-primary">@lang('global.questions_readmore')</span></p>

                    </div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog d-flex justify-content-center" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title"
                                    id="exampleModalLabel">{{ $current_question->information->title }}</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="card-text">{{ $current_question->information->content }}</p>
                                @if($current_question->information->url_content)
                                    <div class="right-align">
                                        <a href="#" class="btn btn-primary">@lang('global.questions_readmore')</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>



            @endif

            <div class="container main-content align-self-center my-auto pb-5">

                <h1 class="lg-3 center-align mb-3">
                    {{ $current_question->value }}
                    @if($current_question->attribute->assignment_multiple == 1)
                        <br><span class="text-minimize">@lang('global.questions_multiple_announce')</span>
                    @endif
                </h1>


                @if($current_question->attribute->assignment_multiple == 0)

                    <div class="row d-flex justify-content-center">

                        @foreach($current_question->answers->sortBy('order') as $answer)

                            <form class="my-2" method="post" action="{{ action('AppQuestionController@updateUserPath') }}" enctype="multipart/form-data">
                                @csrf
                                <input name="current_question" type="hidden" value="{{ $current_question->id }}">
                                <input name="answer" type="hidden" value="{{ $answer->id }}">

                                <button class="btn btn-primary mx-2">
                                    {{ $answer->value }}
                                </button>
                            </form>

                        @endforeach

                    </div>

                @else

                    <form class="my-2" method="post" action="{{action('AppQuestionController@updateUserPath')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <input name="current_question" type="hidden" value="{{ $current_question->id }}">

                        <div class="row d-flex justify-content-center">

                            @foreach($current_question->answers as $answer)

                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary mx-2">
                                        <input type="checkbox" autocomplete="off" name="answers[{{ $answer->id }}]" value="{{ $answer->id }}"> {{ $answer->value }}
                                    </label>
                                </div>

                            @endforeach

                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button class="btn btn-primary mx-2">
                                @lang('global.questions_multiple_validate')
                            </button>

                        </div>

                    </form>

                @endif

                <div class="row d-flex justify-content-center">

                    <form method="post" action="{{action('AppQuestionController@updateUserPath')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <input name="current_question" type="hidden" value="{{ $current_question->id }}">
                        <input name="answer" type="hidden" value="null">

                        <button class="btn btn-link mx-2">
                            @lang('global.questions_skip')
                        </button>
                    </form>

                </div>


                <div class="container question-navigation d-flex flex-row justify-content-center align-items-start">

                    <form method="post" action="{{action('AppQuestionController@updateUserPath')}}"
                          enctype="multipart/form-data">
                        @csrf
                        <input name="current_question" type="hidden" value="{{ $current_question->id }}">

                        <button type="submit" class="btn btn-link">
                            @lang('global.questions_return')
                        </button>
                    </form>

                    <div class="question-navigation-bullet">
                        <ul>
                            @foreach($questions as $question)
                                <li>
                                    <form method="post" action="{{action('AppQuestionController@updateUserPath')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input name="current_question" type="hidden" value="{{ $current_question->id }}">

                                        <a class={{ $question->id == $current_question->id ? "is-active" : "" }} href=""></a>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                        <p>1/{{ count($questions) }}</p>
                    </div>


                    <a class="btn btn-link">
                        @lang('global.questions_cancel')
                    </a>

                </div>


            </div>
        </div>


    @endslot

@endcomponent