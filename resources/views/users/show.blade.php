<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>
    <x-container>
        <small>Membro à {{ $user->created_at->diffForHumans() }}</small>

        <ul>
            @foreach($user->tags as $tag)
            <li>{{ $tag->title }}</li>
            @endforeach
        </ul>

        <div class="mt-6">
            <h3 class="text-xl mb-3">Postagens deste dev</h3>
            <ul>
                @foreach($user->posts as $post)
                <li><a href="{{ route('posts.show', $post) }}" class="text-indigo-500">{{ $post->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </x-container>
</x-app-layout>