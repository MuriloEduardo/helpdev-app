<?php

namespace App\Http\Livewire;

use App\Events\TransactionCreated;
use App\Models\User;
use Livewire\Component;

class TransactionsCreateForm extends Component
{
    public $amount;

    protected $rules = [
        'amount' => 'required|numeric',
    ];

    public function user(): User
    {
        return auth()->user();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function submit()
    {
        $this->validate();

        $transaction = $this->user()->transactions()->create([
            'amount' => $this->amount,
        ]);

        TransactionCreated::dispatch($transaction);

        return redirect()->route('transactions.index')
            ->with('message', 'Saldo adicionado com sucesso!');
    }

    public function render()
    {
        return view('livewire.transactions-create-form');
    }
}
