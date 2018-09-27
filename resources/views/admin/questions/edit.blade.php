@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Update a question</h1>
            </div>

            @include('components.alerts')


            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#question" role="tab"
                       aria-controls="home" aria-selected="true">Question</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#answer" role="tab"
                       aria-controls="profile" aria-selected="false">Answer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#information" role="tab"
                       aria-controls="profile" aria-selected="false">Information</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="question" role="tabpanel" aria-labelledby="home-tab">

                    <form method="post" class="row" action="{{ action('QuestionController@update', $question->id) }}"
                          enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="form-group col-md-6">
                            <label for="exampleInputTitle">Question value</label>
                            <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="valueHelp"
                                   name="value" required value="{{ $question->value }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Product category</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                @foreach( $categories as $category)
                                    <option value="{{ $category->id }}" {{$category->id == $question->category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Reference Attribute</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="attribute_id">
                                @foreach( $attributes as $attribute)
                                    <option value="{{ $attribute->id }}" {{$attribute->id == $question->attribute->id ? 'selected' : ''}}>{{ $attribute->name }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Appear order</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="order">
                                @for ($i = 1; $i < $numberQuestion+1; $i++)
                                    <option value="{{ $i }}" {{$i == $question->order ? 'selected' : ''}}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                            <a href="{{action('QuestionController@index')}}" class="btn btn-outline-primary">
                                Back
                            </a>
                            <button type="submit" class="btn btn-primary ">Update this question</button>
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade" id="answer" role="tabpanel" aria-labelledby="profile-tab">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Response</th>
                            <th scope="col">Default value</th>
                            <th scope="col">Appear order</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($question->answers  as $answer)


                            <tr class="table-row-fields">

                                <th scope="row">#</th>
                                <form method="post" action="{{ action('AnswerController@update', $answer->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input name="_method" type="hidden" value="PATCH">
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputTitle"
                                                   aria-describedby="nameHelp"
                                                   name="value" required value="{{ $answer->value }}">
                                        </div>
                                    </td>
                                    <input name="question_id" type="hidden" value="{{ $question->id }}">
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                    name="default_value_id">
                                                @foreach( $question->attribute->default_values as $default_value)
                                                    <option value="{{ $default_value->id }}" {{$default_value->id == $answer->default_value->id ? 'selected' : ''}}>{{ $default_value->value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1" name="order">
                                                @for ($i = 1; $i < count($question->attribute->default_values)+1; $i++)
                                                    <option value="{{ $i }}" {{$i == $answer->order ? 'selected' : ''}}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </td>


                                    <td>
                                        <button type="submit" class="btn btn-primary">Update value</button>
                                    </td>
                                </form>
                                <td class="d-flex justify-content-end right-align">
                                    <form action="{{action('AnswerController@destroy', $answer->id)}}" method="post">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-link" type="submit">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>

                        @endforeach

                        <tr class="table-row-fields table-row-primary-background">
                            <form method="post" action="{{ url('/admin/answers') }}" enctype="multipart/form-data">
                                @csrf
                                <th scope="row">#</th>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputTitle"
                                               aria-describedby="valueHelp"
                                               name="value" required placeholder="Content response">
                                    </div>
                                    <input name="question_id" type="hidden" value="{{ $question->id }}">
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1"
                                                name="default_value_id">
                                            @foreach( $question->attribute->default_values as $default_value)
                                                <option value="{{ $default_value->id }}">{{ $default_value->value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="order">
                                            @for ($i = 1; $i < count($question->attribute->default_values)+1; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </td>
                                <td></td>
                                <td class="d-flex justify-content-end right-align">
                                    <button type="submit" class="btn btn-secondary">Create this value</button>
                                </td>
                            </form>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="profile-tab">

                    @if ($question->information)


                        <form class="row" method="post"
                              action="{{ action('InformationController@update', $question->information->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">


                            <div class="form-group col-sm-12">
                                <label for="exampleFormControlSelect1">Title</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="titleHelp"
                                       name="title" required value="{{ $question->information->title }}">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="exampleInputTitle">Description</label>
                                <textarea type="text" class="form-control" id="exampleInputTitle"
                                          aria-describedby="descHelp" name="content"
                                          required>{{ $question->information->content}}</textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="exampleFormControlSelect1">Destination URL (optional)</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="titleHelp"
                                       name="url_content" value="{{ $question->information->url_content }}">
                            </div>
                            <input name="question_id" type="hidden" value="{{ $question->id }}">
                            <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                                <a href="{{action('QuestionController@index')}}" class="btn btn-outline-primary">
                                    Back
                                </a>
                                <form action="{{action('InformationController@destroy', $question->information->id)}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-outline-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                                <button type="submit" class="btn btn-primary ">Update information</button>
                            </div>

                        </form>

                    @else

                        <form class="row" method="post" action="{{ url('/admin/informations') }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-sm-12">
                                <label for="exampleFormControlSelect1">Title</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="titleHelp"
                                       name="title" required value="{{ old('title') }}">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="exampleInputTitle">Content</label>
                                <textarea type="text" class="form-control" id="exampleInputTitle"
                                          aria-describedby="descHelp" name="content"
                                          required>{{ old('content') }}</textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="exampleFormControlSelect1">Destination URL (optional)</label>
                                <input type="text" class="form-control" id="exampleInputTitle"
                                       aria-describedby="titleHelp"
                                       name="url_content" value="{{ old('url_content') }}">
                            </div>
                            <input name="question_id" type="hidden" value="{{ $question->id }}">
                            <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                                <a href="{{action('QuestionController@index')}}" class="btn btn-outline-primary">
                                    Back
                                </a>
                                <button type="submit" class="btn btn-primary ">Create this information</button>
                            </div>

                        </form>


                    @endif

                </div>
            </div>


            <div class="row">


            </div>


        </div>



    @endslot

@endcomponent