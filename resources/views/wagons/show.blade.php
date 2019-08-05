@php /* @var App\Wagon $wagon */ @endphp

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="d-flex mb-4 justify-content-between">
      <div>
        <h2>Информация по вагону</h2>
      </div>
      <div>
        <a class="btn btn-outline-primary" href="{{ route('wagons.index') }}">Список вагонов</a>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <table class="table table-sm border border-bottom">
          <tbody>
          <tr>
            <td width="15%" class="text-right text-muted">Номер</td>
            <td>{{ $wagon->inw }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Причина задержки</td>
            <td>{{ $wagon->reason }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Груз</td>
            <td>{{ $wagon->cargo }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Экспедитор по БЧ</td>
            <td>{{ $wagon->forwarder }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Собственность</td>
            <td>{{ $wagon->ownership }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Ст. отправления</td>
            <td>{{ $wagon->departure_station }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Ст. назначения</td>
            <td>{{ $wagon->destination_station }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Прибыл</td>
            <td>{{ $wagon->arrived_at }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Задержан</td>
            <td>{{ $wagon->detained_at }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Принятые меры</td>
            <td>{{ $wagon->taken_measure }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Выпущен</td>
            <td>{{ $wagon->released_at }}</td>
          </tr>
          <tr>
            <td width="15%" class="text-right text-muted">Отправлен</td>
            <td>{{ $wagon->departed_at }}</td>
          </tr>
          </tbody>
        </table>

        <div class="text-right">
          <a class="btn btn-outline-primary mr-2" href="{{ route('wagons.edit', $wagon) }}">Редактировать</a>
          <form action="{{ route('wagons.destroy', $wagon) }}" method="post" class="d-inline">

            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Подтверждаете удаление?')" class="btn btn-outline-danger">Удалить</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

