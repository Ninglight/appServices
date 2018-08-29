@component('layouts.admin')

    @slot('main')


        <div class="container">
            <div class="mt-2 mb-2 d-flex flex-column align-items-start flex-wrap">
                <button type="button" id="sidebarCollapse" class="btn btn-link btn-title pl-0 hidden-md-up">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Importer votre fichier</h1>

            </div>

            <form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
                {{ csrf_field() }}


                <table class="table">
                    @if (isset($csv_header_fields))
                        <tr>
                            @foreach ($csv_header_fields as $csv_header_field)
                                <th>{{ $csv_header_field }}</th>
                            @endforeach
                        </tr>
                    @endif
                        <tr>
                            @foreach ($csv_data[1] as $key => $value)
                                <td>
                                    <select name="fields[{{ $key }}]">
                                        @foreach ($match_attributes as $match_attribute)
                                            <option value="{{ (\Request::has('header')) ? $match_attribute : $loop->index }}"
                                                    @if ($key === $match_attribute) selected @endif>{{ $match_attribute }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            @endforeach
                        </tr>
                    @foreach ($csv_data as $row)
                        <tr>
                            @foreach ($row as $key => $value)
                                <td>{{ $value }}</td>
                            @endforeach
                        </tr>
                    @endforeach

                </table>

                <button type="submit" class="btn btn-primary">
                    Importer les données
                </button>
            </form>

        </div>

    @endslot

@endcomponent
