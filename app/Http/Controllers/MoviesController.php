<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $movies=Movie::latest()->paginate(3);
    
        //dd($movies);

        return view('movies.index',compact('movies'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $genres=['Action','Comedy','Horror','Biopic','Sports'];

        return view('movies.create',compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'release_year' => 'required',
            'poster' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);
        $imageName='';

        if($request->poster){

   $imageName=time().''.$request->poster->extension();

   $request->poster->move(public_path('uploads'),$imageName);


        }

        $data = new Movie([
            'title' => $request->title,
            'genre' => $request->genre,
            'release_year' => $request->release_year,
            'poster' => $imageName
            

        ]);
        $data->save();

        return redirect('/movies')->with('success', 'Movie has been added successfully!');


    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres=['Action','Comedy','Horror','Biopic','Sports'];

        return view('movies.update',compact('movie','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'release_year' => 'required',
            'poster' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);
        $imageName='';

        if($request->poster){

   $imageName=time().''.$request->poster->extension();

   $request->poster->move(public_path('uploads'),$imageName);


        }

        $data = new Movie([
            'title' => $request->title,
            'genre' => $request->genre,
            'release_year' => $request->release_year,
            'poster' => $imageName
            

        ]);
        $data->update();

        return redirect('/movies')->with('success', 'Movie has been updated successfully!');



        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movies  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie=Movie::findorFail($id);

       $movie->delete();

       return redirect()->route('movies.index')->with('success','Movie deleted Successfully');

    }
}
