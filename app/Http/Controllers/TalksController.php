<?php

namespace App\Http\Controllers;

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
        $user = auth()->user();
        $talk = $user->talks->first();

        if (!$talk) {
            return view('talks.index');
        }

        return redirect()->route('talks.show', $talk);
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
