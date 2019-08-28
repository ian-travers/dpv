@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row mt-2">
      <div class="col-2">
        @include('backend.left-sidebar')
      </div>
      <div class="col-10">
        Content
        <div class="">
          {!! $lastTenDaysStats->container() !!}
        </div>

        <div class="">
          {!! $chartBy->container() !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  {!! $lastTenDaysStats->script() !!}
  {!! $chartBy->script() !!}
@endsection

