<x-app-layout>
    <x-slot name="header">
        <livewire:talks-head :talk="$talk" />
    </x-slot>
    <x-container>
        <div class="flex items-start">
            <div class="grow-0">
                <livewire:talks-list :talk="$talk" />
            </div>

            <div class="grow px-3">
                <livewire:talks-body :talk="$talk" />
            </div>
        </div>
    </x-container>
</x-app-layout>