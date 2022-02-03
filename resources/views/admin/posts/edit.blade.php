@extends('layouts.admin')

@section('content')
<div class="container">

  <h1>{{$post->title}}</h1>

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>
              {{$error}}
            </li>
          @endforeach
        </ul>
      </div>
    @endif
  
  <form action="{{route('admin.posts.update', $post)}}" method="POST">
    @csrf
    @method('PUT')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titolo</label>
        <input type="text" value="{{$post->title}}" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Inserisci Titolo">
        @error('title')
        <p class="form-errors">{{$message}}</p>
        @enderror
      </div>
  
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contenuto</label>
        <input type="text" value="{{$post->content}}" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Inserisci Contenuto">
        @error('content')
        <p class="form-errors">{{$message}}</p>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Invia</button>
      <button type="reset" class="btn btn-secondary">RESET</button>
  </form>

</div>
@endsection

@section('title')
  EDIT
@endsection
