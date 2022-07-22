<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Adicionar saldo
            </h2>
        </div>
    </x-slot>
    <x-container>
        <livewire:transactions-create-form />
    </x-container>
</x-app-layout>