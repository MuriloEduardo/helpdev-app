<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pedidos de outros dev's
            </h2>

            <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-green-600 active:bg-green-600 focus:outline-none focus:border-green-600 focus:ring ring-green-600 disabled:opacity-25 transition ease-in-out duration-150">
                Preciso de ajuda
            </a>
        </div>
    </x-slot>

    <x-container>
        @if (session('message'))
        <div class="text-green-600 mb-6">
            {{ session('message') }}
        </div>
        @endif

        @forelse ($posts as $post)
        <div class="my-4 bg-white overflow-hidden shadow-sm sm:rounded-lg p-3 border-b border-gray-200">
            <a href="{{ route('posts.show', $post) }}" class="text-indigo-500 text-lg">{{ $post->title }}</a>
            <p class="text-sm">{{ Str::limit($post->content, 300, $end='...') }}</p>

            <div class="flex items-center justify-between">
                <div>
                    @foreach($post->tags as $tag)
                    <a href="{{ route('tags.show', $tag) }}" class="text-xs text-indigo-300 inline-block rounded bg-indigo-100 px-1">{{ $tag->title }}</a>
                    @endforeach
                </div>

                <div>
                    <small>{{ $post->created_at->diffForHumans() }}</small>
                    <small>por <a href="{{ route('users.show', $post->user) }}" class="text-indigo-300">{{ $post->user->name }}</a></small>
                </div>
            </div>
        </div>
        @empty
        <div class="text-gray-400">Sem postagens por aqui, que tal <a href="{{ route('posts.create') }}" class="text-indigo-500">Criar um pedido de ajuda</a>?</div>
        @endforelse
    </x-container>
</x-app-layout>