<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Suas transações
            </h2>
        </div>
    </x-slot>
    <x-container>
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
                            @else
                            @endif
                    </td>
                    <td class="text-right">{{ $transaction->created_at }}</td>
                </tr>
                @empty
                <p>Sem transações, por enquanto...</p>
                @endforelse
            </tbody>
        </table>
    </x-container>
</x-app-layout>