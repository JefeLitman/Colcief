@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h1 class="panel-title">Welcome {{auth()->user()->name}}</h1>
      </div>
      <div class="panel-body">

      </div>
    </div>
  </div>
</div>
@endsection()
