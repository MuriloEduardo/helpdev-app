<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>
    <x-container>
        <small>Membro à {{ $user->created_at->diffForHumans() }}</small>

        <div class="mt-6 flex justify-between">
            <div>
                <h3 class="text-xl mb-3">Postagens deste dev</h3>
                <ul>
                    @foreach($user->posts as $post)
                    <li><a href="{{ route('posts.show', $post) }}" class="text-indigo-500">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-xl mb-3">Habilidades</h3>
                @foreach($user->tags as $tag)
                <a href="{{ route('tags.show', $tag) }}" class="text-xs text-indigo-300 inline-block rounded bg-indigo-100 px-1">{{ $tag->title }}</a>
                @endforeach
            </div>
        </div>

    </x-container>
</x-app-layout>