<x-app-layout>
    <x-slot name="header">
        <livewire:talks-head :talk="$talk" />
    </x-slot>
    <x-container>
        <div class="flex">
            <div class="w-1/4">
                <livewire:talks-list :talk="$talk" />
            </div>

            <div class="pl-6 w-full">
                <livewire:talks-body :talk="$talk" />
            </div>
        </div>
    </x-container>
</x-app-layout>