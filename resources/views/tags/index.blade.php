<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tecnologias
            </h2>
        </div>
    </x-slot>

    <x-container>
        <div class="flex flex-wrap">
            @foreach ($tags as $tag)
            <div class="p-3">
                <a href="{{ route('tags.show', $tag) }}" class="text-indigo-500">{{ $tag->title }}</a>
                <br>

                <div>
                    <small>
                        {{ $tag->posts->count() }} postagens
                    </small>
                    <span class="text-gray-300">|</span>
                    <small>
                        {{ $tag->users->count() }} dev's
                    </small>
                </div>
            </div>
            @endforeach
        </div>
    </x-container>
</x-app-layout>