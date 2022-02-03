@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
      <h1>
        Elenco Posts
      </h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titolo</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->slug }}</td>
            <td><a href="{{ route('admin.posts.show', $post) }}" class="btn btn-info">SHOW</a></td>
            <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-success">EDIT</a></td>
            <td><form onsubmit="return confirm('Vuoi davvero eliminare: {{$post->title}}')"
              action="{{route('admin.posts.destroy', $post)}}"
              method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">DELETE</button>
              </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection

@section('title')
  POSTS
@endsection

