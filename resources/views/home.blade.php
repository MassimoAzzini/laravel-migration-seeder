@extends('layouts.main')

@section('content')

    <h1>HOME</h1>

    <div class="container">
        @foreach ($trains as $train)

        <div class="card w-100">
            <div>
                <span>{{ $train->Tipo }}</span>
                <span>{{ $train->Codice_treno }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    {{-- <span>{{ $train->time('Partenza') }}</span> --}}
                    <span>stazione part</span>
                </div>
                <div>
                    <span>durata</span>
                </div>
                <div class="d-flex flex-column">
                    <span>ora part</span>
                    <span>stazione part</span>
                </div>
                <div>
                    <span>dettagli</span>
                </div>
                <div class="d-flex flex-column">
                    <span>a partire da</span>
                    <span>prezzo</span>
                </div>
            </div>

        </div>
        @endforeach

    </div>

@endsection
