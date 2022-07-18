<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>
    <x-container>
        <small>Postado à {{ $post->created_at->diffForHumans() }}</small>
        <small>por <a href="{{ route('users.show', $post->user) }}" class="text-indigo-300">{{ $post->user->name }}</a></small>

        <div class="mb-6">
            @foreach($post->tags as $tag)
            <a href="{{ route('tags.show', $tag) }}" class="text-xs text-indigo-300 inline-block rounded bg-indigo-100 px-1">{{ $tag->title }}</a>
            @endforeach
        </div>

        <article>{{ $post->content }}</article>
    </x-container>
</x-app-layout>