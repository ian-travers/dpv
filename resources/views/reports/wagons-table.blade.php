@php /* @var App\Wagon $wagon */ @endphp

<table class="table table-sm table-bordered">
  <thead>
  <tr class="text-center">
    <th>#</th>
    <th>Номер вагона</th>
    <th>Прибыл</th>
    <th>Задержан</th>
    <th>Причина</th>
    <th>Возврат</th>
    <th>Отправлен</th>
  </tr>
  </thead>
  <tbody>

  @foreach($wagons as $wagon)
    <tr>
      <td class="text-center">{{ $loop->index + 1 }}</td>
      <td class="text-center">
        <a href="{{ route('show-wagon', $wagon) }}">{{ $wagon->inw }}</a>
      </td>
      <td class="text-center">{{ $wagon->arrived_at ? $wagon->arrived_at->format('d.m.Y H:i') : '' }}</td>
      <td class="text-center">{{ !$wagon->isLocal() ? $wagon->detained_at->format('d.m.Y H:i') : '' }}</td>
      <td>{{ $wagon->reason }}</td>
      <td class="text-center">{!! $wagon->renderReturning() !!}</td>
      <td class="text-center">{{ $wagon->departed_at ? $wagon->departed_at->format('d.m.Y H:i') : ''}}</td>
    </tr>

  @endforeach
  </tbody>
</table>

