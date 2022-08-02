<div class="bg-white rounded py-3 overflow-hidden shadow-sm sm:rounded-lg border-b border-gray-200">
    @forelse($posts as $post)
    <div>
        <h3 @class([ 'p-3 truncate' , 'text-gray-400'=> $post->id === $talk->post->id,
            ])>{{ $post->title }}</h3>

        @foreach($post->talks as $_talk)
        <div>
            <a @class([ 'flex justify-between items-center hover:bg-gray-100 p-3' , 'bg-gray-100 cursor-default'=> $talk->id === $_talk->id,
                ])
                href="{{ route('talks.show', $_talk) }}"
                >

                <span @class(['text-indigo-500'=> $talk->id !== $_talk->id])>
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