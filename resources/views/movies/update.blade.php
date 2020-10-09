@extends('layout')

@section('content')


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Movie </h2>
            </div>
            @if($errors->any())
  <div class="alert alert-danger">
  <strong> Somethig is Wrong with your input !!</strong>
@foreach($errors->all() as $error)
 <ul>
   <li> 
  {{$error}}

   </li>

 </ul>
@endforeach
@endif
    </div>
    </div>

    <form action="{{route('movies.update',$movie->id)}}" method="post" enctype="multipart/form-data">
@csrf
  @method('put')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="{{$movie->title}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
              <strong> Genre </strong>

              <select name="genre" id="genre">
                <option value="">Select genre</option>
               @if($genres)
                @foreach($genres as $genre)
                @if($genre == $movie->genre)

                <option value="{{ $genre }}"selected>{{$genre}} </option>
                @else
                <option value="{{$genre}}">{{$genre}}
  </option>
                @endif
                @endforeach

              @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Release Year</strong>
                    <input type="text" name="release_year"class="form-control"value="{{$movie->release_year}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
             <strong> Poster </strong>
                <input type="file" name="poster" class="form-control" value=" ">  
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
       </div>


        </div>

    </form>

 @endsection

