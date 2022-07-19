<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dev's
            </h2>
        </div>
    </x-slot>

    <x-container>
        <div class="flex flex-wrap">
            @forelse ($users as $user)
            <div class="m-3 bg-white overflow-hidden shadow-sm sm:rounded-lg p-3 border-b border-gray-200">
                <a href="{{ route('users.show', $user) }}" class="text-indigo-500">{{ $user->name }}</a>
                <br>
                <div>
                    <small>
                        {{ $user->posts->count() }} postagens
                    </small>
                    <span class="text-gray-300">|</span>
                    <small>
                        {{ $user->tags->count() }} habilidades
                    </small>
                </div>
            </div>
            @empty
            <div class="text-gray-400">Sem participantes, ainda.</div>
            @endforelse
        </div>
    </x-container>
</x-app-layout>