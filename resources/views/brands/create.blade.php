@component('layouts.app')

    @slot('main')

        <div class="container">
            <h1 class="my-5 text-center">Créer une marque</h1>

            @include('components.alerts')

            <div class="row">

                <form class="offset-md-3 col-md-6" method="post" action="{{ url('/brands') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputTitle">Name</label>
                        <input type="text" class="form-control" id="exampleInputTitle" aria-describedby="nameHelp" name="name">
                    </div>
                    <div class="form-group">
                        <label for="logoUrlInput">Logo</label>
                        <input type="file" class="form-control" id="logoUrlInput" aria-describedby="logoHelp" name="logo" accept="image/*,.svg">
                    </div>
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>

            </div>

        </div>



    @endslot

@endcomponent