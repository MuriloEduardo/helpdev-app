<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $tag->title }}
        </h2>
    </x-slot>
    <x-container>
        <div class="flex justify-between">
            <div>
                <h3 class="mb-6 text-lg">Postagens com essa tecnologia</h3>
                <ul>
                    @forelse($tag->posts as $post)
                    <li>
                        <a href="{{ route('posts.show', $post) }}" class="text-indigo-500">{{ $post->title }}</a>
                    </li>
                    @empty
                    <li class="text-gray-400">Sem postagens com esse tecnologia, por enquanto.</li>
                    @endforelse
                </ul>
            </div>

            <div>
                <h3 class="mb-6 text-lg">Dev's que sabem essa tecnologia</h3>
                <ul>
                    @forelse($tag->users as $user)
                    <li>
                        <a href="{{ route('users.show', $user) }}" class="text-indigo-500">{{ $user->name }}</a>
                    </li>
                    @empty
                    <li class="text-gray-400">Sem participantes que sabem essa tecnologia, por enquanto.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </x-container>
</x-app-layout>