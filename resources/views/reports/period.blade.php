@php
  /** @var \App\Detainer $detainer */
  /** @var \App\Wagon $wagon */
@endphp

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="text-center">
      <h3 class="mt-3">Отчет за период</h3>
      <h4>{{ $shiftStartsAt->format('d.m.Y H:i') }} &mdash; {{ $shiftEndsAt->format('d.m.Y H:i') }}</h4>
    </div>

    <div class="d-flex justify-content-center">
      <div class="w-75 p-3">
        <p class="text-center lead"></p>
        <table class="table table-sm table-bordered">
          <tbody>
          <tr class="font-weight-bolder">
            <td width="60%">Задержано: всего / длительно простаивающих<br><span class="small text-muted">в том числе:</span></td>
            <td width="20%" class="text-center">
              {{ detainedPeriodCount(null, $shiftStartsAt, $shiftEndsAt) }}
            </td>
            <td width="20%" class="text-center">
              {{ detainedLongPeriodCount(null, $shiftStartsAt, $shiftEndsAt) }}
            </td>
          </tr>

          @foreach($detainers as $detainer)
            <tr>
              <td>{{ $detainer->name }}</td>
              <td class="text-center">
                {{ detainedPeriodCount($detainer, $shiftStartsAt, $shiftEndsAt) }}
              </td>
              <td class="text-center">
                {{ detainedLongPeriodCount($detainer, $shiftStartsAt, $shiftEndsAt)}}
              </td>
            </tr>

          @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="mt-2">
      <h3 class="text-center">Движение вагонов</h3>

      @if($wagons->count())
        @include('reports.wagons-table')
      @else
        <p class="lead ml-3">Информации по операциям с задержанными вагонами за этот период нет!</p>

      @endif
    </div>

  </div>
@endsection

