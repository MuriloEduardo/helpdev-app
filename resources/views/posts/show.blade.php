<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>
    <x-container>
        <article>{{ $post->content }}</article>
    </x-container>
</x-app-layout>