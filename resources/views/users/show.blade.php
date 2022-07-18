<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>
    <x-container>
        <small>Membro à {{ $user->created_at->diffForHumans() }}</small>
    </x-container>
</x-app-layout>