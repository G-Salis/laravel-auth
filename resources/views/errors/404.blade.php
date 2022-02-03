@extends('layouts.admin')
@section('content')

<div class="container text-center">
  <h1>
    ERROR 404! PAGINA NON TROVATA!!!
  </h1>
  <p>{{$exception->getMessage()}}</p>
</div>
  
@endsection