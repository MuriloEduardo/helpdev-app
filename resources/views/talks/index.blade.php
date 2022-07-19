<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Suas conversas
            </h2>
        </div>
    </x-slot>
    <x-container>
        <livewire:talks-list />
    </x-container>
</x-app-layout>