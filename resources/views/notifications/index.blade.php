<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notificações
            </h2>

            @if ($unreadNotifications->count())
            <form action="{{ route('notifications.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="p-3 bg-gray-300 hover:bg-gray-200 text-sm rounded">Marcar todas como lidas</button>
            </form>
            @endif
        </div>
    </x-slot>

    <x-container>
        @if (session('message'))
        <div class="text-green-600 mb-6">
            {{ session('message') }}
        </div>
        @endif

        @forelse ($unreadNotifications as $notification)
        <livewire:notifications :notification="$notification" />
        @empty
        <div>Sem notificações por aqui</div>
        @endforelse
    </x-container>
</x-app-layout>