<div>
    @forelse($posts as $_post)
    <div>
        <h3 @class([
            'truncate hover:text-clip hover:whitespace-normal' => isset($post),
            'text-gray-400' => isset($post) && $post->id === $_post->id,
            'text-xl' => !isset($post)
        ])>{{ $_post->title }}</h3>
        
        @foreach($_post->talks as $talk)
        <div class="my-3">
            <a href="{{ route('talks.show', $talk) }}" class="flex justify-between items-center">
                <span class="text-indigo-500">{{ $_post->user->name }}</span>
                <small>{{ $talk->created_at->diffForHumans() }}</small>
            </a>
        </div>
        @empty
        <span class="text-gray-400">Você não possui conversas, parece que ta tudo tranquilo né...</span>
        @endforelse
    </div>
    @endforeach
</div>