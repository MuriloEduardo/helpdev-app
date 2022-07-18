<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dev's
            </h2>
        </div>
    </x-slot>

    <x-container>
        <ul>
            @forelse ($users as $user)
            <li>
                <a href="{{ route('users.show', $user) }}" class="text-indigo-500">{{ $user->name }}</a>
            </li>
            @empty
            <li>Sem participantes ainda.</li>
            @endforelse
        </ul>
    </x-container>
</x-app-layout>