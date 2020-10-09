@extends('layout')
@section('content')
<div class="wrapperdiv">
@if($message=Session::get('success'))

<div class="alert alert-success text-center">
 {{$message}}
</div>

@endif
<table class="table table-hover">
<thead class="thead-dark">

    <tr>
      <th scope="col"></th>
      <th scope="col">Title</th>
      <th scope="col">Genre</th>

      <th scope="col"> Release Year</th>
      <th scope="col"> Action</th>

    </tr>
  </thead>
@if($movies)
@foreach($movies as $movie)
  <tbody>
    <tr>
      <td class="align-middle"><img src="{{asset('uploads/'.$movie->poster)}} " class="img-thumbnail"></td>
      <td class="align-middle">{{$movie->title}}</td>
      <td class="align-middle">{{$movie->genre}}</td>
      <td class="align-middle">{{$movie->release_year}}</td>
      <td class="align-middle">
     <form action="{{route('movies.destroy',$movie->id)}}" method="post">
     
    <a href="{{route('movies.show',$movie->id)}}" class="btn btn-info"> Show </a>
    <a href="{{route('movies.edit',$movie->id)}}" class="btn btn-Primary"> Edit </a>
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to Delete?')"> DELETE </button>
  </form>
      </td>

    </tr>
    @endforeach

  </tbody>
  @endif

</table>
<div>
<div class="d-flex">
<div class="mx-auto">

{{ $movies->onEachSide(3)->links() }}

</div>
</div>

@endsection
