@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        @if(Auth::guard('student'))
          <span></span>
          <h1 class="panel-title">Welcome s {{auth('student')->user()->first_name.' '.auth('student')->user()->last_name}}</h1>
        @elseif(Auth::guard('employee'))
          <h1 class="panel-title">Welcome f{{auth('employee')->user()->first_name.' '.auth('employee')->user()->last_name}}</h1>
        @endif
      </div>
      <div class="panel-body">
        @if(Auth::guard('student'))
          <strong>Email: </strong>{{auth('student')->user()->email}}
        @elseif(Auth::guard('employee'))
          <strong>Email: </strong>{{auth('employee')->user()->email}}
        @endif
      </div>
      <div class="panel-footer">
        <form method="POST" action="{{route('logout')}}">
          {{csrf_field()}}
          <button class="btn btn-danger btn-xs btn-block">Logout</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection()
