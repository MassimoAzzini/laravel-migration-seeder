@extends('layouts.main')

@section('content')

    <div class="container">

        <h1 class="text-center">HOME</h1>
        @foreach ($trains as $train)

        <div class="card w-100">
            <div>
                <span>{{ $train->Tipo }}</span>
                <span>{{ $train->Codice_treno }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <span>{{ $train->Partenza }}</span>
                    <span>{{ $train->Stazione_di_partenza }}</span>
                </div>
                <div>
                    <span>durata</span>
                </div>
                <div class="d-flex flex-column">
                    <span>{{ $train->Arrivo }}</span>
                    <span>{{ $train->Stazione_di_arrivo }}</span>
                </div>
                <div>
                    <button>dettagli</button>
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
