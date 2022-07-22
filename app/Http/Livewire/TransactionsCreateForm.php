<?php

namespace App\Http\Livewire;

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

        $this->user()->transactions()->create([
            'amount' => $this->amount,
        ]);

        return redirect()->route('transactions.index')
            ->with('message', 'Saldo adicionado com sucesso!');
    }

    public function render()
    {
        return view('livewire.transactions-create-form');
    }
}
