@extends('layouts.main')

@section('content')

    <div class="container">

        <h1 class="text-center">HOME</h1>
        @foreach ($trains as $train)
        @php
            $dateTimeDeparture=date_create( $train->departure );
            $hourDeparture=date_format($dateTimeDeparture, 'H:i:s');
            $dayDeparture=date_format($dateTimeDeparture, 'd/m/Y');
            $dateTimeArrival=date_create( $train->arrival );
            $hourArrival=date_format($dateTimeArrival, 'H:i:s');
            $dayArrival=date_format($dateTimeArrival, 'd/m/Y');
            $durationTravel=date_diff($dateTimeDeparture,$dateTimeArrival);
        @endphp

        <div class="card w-100">
            <div>
                <span>{{ $train->type }}</span>
                <span>{{ $train->train_code }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <span>{{ $train->departure }}</span>
                    <span>{{ $train->departure_station }}</span>
                </div>
                <div>
                    <span>{{ $durationTravel->format("%H:%i:%s") }}</span>
                </div>
                <div class="d-flex flex-column">
                    <span>{{ $train->arrival }}</span>
                    <span>{{ $train->arrival_station }}</span>
                </div>
                <div>
                    <a class="btn btn-primary">dettagli</a>
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
