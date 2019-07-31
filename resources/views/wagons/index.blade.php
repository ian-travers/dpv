@php /* @var App\Wagon $wagon */ @endphp

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Вагоны</h1>

        @forelse($wagons as $wagon)
            <ul>
                <li>{{ $wagon }}</li>
            </ul>
        @empty
            <p>Пока нет ни одного вагона.</p>
        @endforelse
    </div>
@endsection

