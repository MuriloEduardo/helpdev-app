<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Talk;

class TalksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('talks.index', ['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Talk  $talk
     * @return \Illuminate\Http\Response
     */
    public function show(Talk $talk)
    {
        return view('talks.show', ['talk' => $talk]);
    }

}
