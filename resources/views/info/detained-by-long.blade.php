@extends('layouts.app')

@section('breadcrumbs', '')

@section('content')
  <div class="container-fluid">
    <h3 class="mt-3">Длительно простаивающие вагоны: {{ $detainer->name }}</h3>
    <div class="row mt-3">

      <div class="col-9">

        @if(!$wagons->count())
          <div class="alert alert-warning border">
            На текущий момент вагоны отсутствуют!
          </div>

        @else
          @include('info.wagons-table')
        @endif

        <nav>
          {{ $wagons->appends(request()->only(['term']))->links() }}
        </nav>
      </div>
      <div class="col-3">

        @include('info.sidebar')
      </div>
    </div>
  </div>
@endsection

