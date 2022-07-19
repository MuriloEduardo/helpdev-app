<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $talk->post->title }}
            </h2>
        </div>
    </x-slot>
    <x-container>
        <div class="grid grid-cols-4 gap-4">
            <livewire:talks-list :post="$talk->post" />

            <div class="col-span-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
                    <h4 class="text-xl text-green-600"><strong>Opa!</strong> {{ $talk->user->name }} <strong>disse que sabe te ajudar!</strong></h4>
                    <p>Bora trocar uma ideia?</p>
                    <small>Sejam objetivos nas conversas e saibem que qualquer coisa tudo estará seguro e transparente para ambos.</small>
                </div>


                @can(['post-owner', 'accept-talk'], $talk)
                <div class="my-4">
                    <livewire:talks-accept :talk="$talk" />
                </div>
                @endcan

                <div class="mt-6">
                    <livewire:messages-create-form />
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>