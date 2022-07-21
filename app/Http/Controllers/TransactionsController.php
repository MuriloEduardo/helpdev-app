<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        return view('transactions.index', [
            'transactions' => $user->transactions,
            'balance' => $user->transactions->sum('amount'),
        ]);
    }
}
