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

    /**
     * Removing resources from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $message = false;
        $user = auth()->user();
        $unreadNotifications = $user->unreadNotifications;

        if (count($unreadNotifications)) {
            $unreadNotifications->markAsRead();

            $message = 'Todas notificações foram marcadas como lidas.';
        }

        return redirect()->route('notifications.index')
            ->with('message', $message);
    }
}
