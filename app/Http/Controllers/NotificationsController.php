<?php

namespace App\Http\Controllers;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return view('notifications.index', ['unreadNotifications' => $user->unreadNotifications]);
    }
}
