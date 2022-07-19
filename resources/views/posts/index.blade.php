<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Todas postagens
            </h2>

            <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Criar pedido de ajuda</a>
        </div>
    </x-slot>

    <x-container>
        @if (session('message'))
        <div class="text-green-500 mb-6">
            {{ session('message') }}
        </div>
        @endif

        @forelse ($posts as $post)
        <div class="my-4 bg-white overflow-hidden shadow-sm sm:rounded-lg p-3 border-b border-gray-200">
            <a href="{{ route('posts.show', $post) }}" class="text-indigo-500">{{ $post->title }}</a>

            <div>
                <span class="font-bold text-green-700">R${{ number_format($post->amount, 2, ',', '.') }}</span>
            </div>

            <div>
                <small>{{ $post->created_at->diffForHumans() }}</small>
                <small>por <a href="{{ route('users.show', $post->user) }}" class="text-indigo-300">{{ $post->user->name }}</a></small>
            </div>

            <div>
                @foreach($post->tags as $tag)
                <a href="{{ route('tags.show', $tag) }}" class="text-xs text-indigo-300 inline-block rounded bg-indigo-100 px-1">{{ $tag->title }}</a>
                @endforeach
            </div>
        </div>
        @empty
        <div class="text-gray-400">Sem postagens por aqui, que tal <a href="{{ route('posts.create') }}" class="text-indigo-500">Criar um pedido de ajuda</a>?</div>
        @endforelse
    </x-container>
</x-app-layout>