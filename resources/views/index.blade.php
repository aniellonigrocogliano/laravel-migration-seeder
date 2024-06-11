@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-between flex-wrap">
        <h1 class="text-center">Lista treni</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Azienda</th>
                    <th scope="col">Stazione di partenza</th>
                    <th scope="col">Stazione di arrivo</th>
                    <th scope="col">Numero di treno</th>
                    <th scope="col">Orario di arrivo</th>
                    <th scope="col">Orario di partenza</th>
                    <th scope="col">Durata viaggio</th>
                    <th scope="col">In orario</th>
                    <th scope="col">Cancellato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Trains as $Trains)
                    @include('partials.table')
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
