

@if (session('info'))

    <div class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>

@endif

@if (session('success'))

    <div class="alert alert-success" role="alert">
        <strong>Good Job!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@endif

@if ($errors->any())

    <div class="alert alert-danger" role="alert">
        <strong>
            Oups. Nous n'avons pas pu enregistrer votre demande pour la raison suivante :
        </strong>
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif