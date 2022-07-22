<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $talk->post->title }}
            </h2>

            <div>
                <small>Postado à {{ $talk->post->created_at->diffForHumans() }}</small>
                <small>por <a href="{{ route('users.show', $talk->post->user) }}" class="text-indigo-300">{{ $talk->post->user->name }}</a></small>
                <div class="font-bold text-green-700 text-right">R${{ number_format($talk->post->amount, 2, ',', '.') }}</div>
            </div>
        </div>
    </x-slot>
    <x-container>
        <div class="grid grid-cols-4 gap-4">
            <livewire:talks-list :talk="$talk" />

            <div class="col-span-3">
                <div class="sticky top-0">
                    <div class="text-lg">{{ $talk->post->status->name }}</div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                        <h4 class="text-xl text-green-600"><strong>Opa!</strong> {{ $talk->user->name }} <strong>disse que sabe te ajudar!</strong></h4>
                        <p>Bora trocar uma ideia?</p>
                        <small>Sejam objetivos nas conversas e saibem que qualquer coisa tudo estará seguro e transparente para ambos.</small>
                    </div>

                    <div class="my-4">
                        <livewire:talks-accept :talk="$talk" />
                        <a href="{{ route('transactions.create') }}">Adicionar saldo</a>
                    </div>

                    <div class="mt-6">
                        <livewire:messages-create-form />
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>