<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(8);
        return view('home', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::with('category')->findOrFail($id);
        return view('movies.show', compact('movie'));
    }
}
