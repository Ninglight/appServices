@component('layouts.common')

    @slot('body')


        <div class="login gradient-background">

            <div class="container d-flex justify-content-center align-items-center">
                <div class="card">
                    <div class="card-body">

                        <img class="logo" src="{{ asset('icons/co-color.svg') }}" alt="logo appServices">

                        <h1 class="py-4">Accéder à l'administration</h1>

                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf

                            <div class="form-group left-align">
                                <label for="email">Adresse mail</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group left-align">
                                <label for="password">Mot de passe</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Se connecter
                                </button>
                            </div>

                            <div class="form-group">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Vous avez oubliez votre mot de passe ?
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>

    @endslot

@endcomponent

