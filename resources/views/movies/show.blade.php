@extends('layout')
@section('content')
@if($movie)
<div class="wrapperdiv">
<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="{{asset('uploads/'.$movie->poster)}}" alt="Card image cap" style="width:18 rem">
  <div class="card-body">
    <h5 class="card-title">{{$movie->title}}</h5>
    <p class="card-text">{{$movie->genre}} |{{$movie->release_year}}</p>
  </div>
</div>

</div>
@endif





@endsection