@extends('layouts.backend')

@section('content')
  <div class="card border-primary">
    <div class="card-header">
      <h3>Редактирование пользователя</h3>
    </div>
    <div class="card-body">
      <form id="client-form" action="{{ route('admin.users.update', $user) }}" method="post">

        @method('patch')
        @csrf
        @include('backend.users._form')
        <div class="d-flex justify-content-between align-items-end">
          <div class="d-flex justify-content-between align-items-end">
            <button type="submit" class="btn btn-lg btn-outline-primary mr-2">Сохранить</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-outline-secondary">Отменить</a>
          </div>
          <p class="text-muted">
            <span class="required">*</span>
            <em>Отмечены обязательные поля</em>
          </p>
        </div>
      </form>
    </div>
  </div>
@endsection





