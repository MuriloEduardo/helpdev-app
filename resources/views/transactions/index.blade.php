<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Suas transações
            </h2>

            <a href="{{ route('transactions.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Adicionar saldo</a>
        </div>
    </x-slot>
    <x-container>
        @if (session('message'))
        <div class="text-green-600 mb-6">
            {{ session('message') }}
        </div>
        @endif

        <div class="text-2xl flex flex-col items-end mb-6">
            <h3>Saldo</h3>
            <span class="font-bold">
                R${{ number_format($balance, 2, ',', '.') }}
            </span>
        </div>

        <table class="w-full">
            <thead class="text-left">
                <tr>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th class="text-right">Data</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                <tr>
                    <td>R${{ number_format($transaction->amount, 2, ',', '.') }}</td>
                    <td>
                        @if ($transaction->amount < 0) <div>
                            <span>Quantia descontada como garantia em </span>
                            <a href="{{ route('posts.show', $transaction->talk->post) }}">{{
                                $transaction->talk->post->title
                                }}</a>
                            <span> para </span>
                            <a href="{{ route('users.show', $transaction->talk->user) }}">{{
                                $transaction->talk->user->name }}</a>
                            </div>
                            @elseif (!$transaction->talk_id)
                            <span>Saldo adicionado</span>
                            @else
                            <span>Recebimento de recompensa</span>
                            @endif
                    </td>
                    <td class="text-right">{{ $transaction->created_at }}</td>
                </tr>
                @empty
                <tr>
                    <td>Sem transações, por enquanto...</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </x-container>
</x-app-layout>