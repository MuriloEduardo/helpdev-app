<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notificações
            </h2>
        </div>
    </x-slot>

    <x-container>
        @forelse ($unreadNotifications as $notification)
        <livewire:notifications :notification="$notification" />
        @empty
        <div>Sem notificações por aqui</div>
        @endforelse
    </x-container>
</x-app-layout>