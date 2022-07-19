<div @class([ 'bg-white rounded py-3 overflow-hidden shadow-sm sm:rounded-lg border-b border-gray-200'=> isset($talk),
    ])>
    @forelse($posts as $post)
    <div>
        <h3 @class([ 'p-3' , 'truncate hover:text-clip hover:whitespace-normal'=> isset($talk),
            'text-gray-400' => isset($talk) && $post->id === $talk->post->id,
            'text-xl' => !isset($talk)
            ])>{{ $post->title }}</h3>

        @foreach($post->talks as $_talk)
        <div>
            <a @class([ 'flex justify-between items-center hover:bg-gray-100 p-3' , 'bg-gray-100'=> isset($talk) && $talk->id === $_talk->id,
                ])
                href="{{ route('talks.show', $_talk) }}"
                >

                <span class="text-indigo-500">
                    @if($_talk->user->id === auth()->user()->id)
                    {{ $post->user->name }}
                    @else
                    {{ $_talk->user->name }}
                    @endif
                </span>

                <small class="text-gray-400">{{ $_talk->created_at->diffForHumans() }}</small>
            </a>
        </div>
        @empty
        <span class="text-gray-400">Você não possui conversas, parece que ta tudo tranquilo né...</span>
        @endforelse
    </div>
    @endforeach
</div>