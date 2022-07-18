<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tecnologias
            </h2>
        </div>
    </x-slot>

    <x-container>
        <ul>
            @foreach ($tags as $tag)
            <li>
                <a href="{{ route('tags.show', $tag) }}" class="text-indigo-500">{{ $tag->title }}</a>
            </li>
            @endforeach
        </ul>
    </x-container>
</x-app-layout>