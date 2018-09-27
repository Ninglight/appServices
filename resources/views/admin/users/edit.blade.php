@component('layouts.admin')

    @slot('main')

        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Update a User</h1>
            </div>

            @include('components.alerts')


            <form class="row" method="post" action="{{ action('UserController@update', $user->id) }}"
                  enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">

                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                           aria-describedby="descHelp"
                           name="name" required value="{{ $user->name }}" autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Mail adress</label>
                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                           aria-describedby="descHelp"
                           name="email" required value="{{ $user->email }}" autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="mt-4 mb-4 d-flex justify-content-between col-sm-12">
                    <a href="{{action('UserController@index')}}" class="btn btn-outline-primary">
                        Back
                    </a>
                    <button type="submit" class="btn btn-primary">Update this users</button>
                </div>
            </form>


        </div>



    @endslot

@endcomponent