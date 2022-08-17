<x-app-layout>
    <x-slot name="header">
        <livewire:talks-head :talk="$talk" />
    </x-slot>
    <x-container>
        <div class="grid grid-cols-4 gap-6">
            <livewire:talks-list :talk="$talk" />

            <div class="col-span-3">
                <livewire:talks-body :talk="$talk" />
            </div>
        </div>
    </x-container>
</x-app-layout>