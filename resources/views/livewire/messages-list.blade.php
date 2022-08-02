<div>
    @foreach ($talk->messages as $message)
    <div @class([ 'text-right'=> $message->user_id === auth()->id(),
        ])>
        <div @class([ 'inline-block	bg-white rounded mx-6 p-3 overflow-hidden shadow-sm sm:rounded-lg border-b border-gray-200' , 'bg-gray-600 text-white'=> $message->user_id === auth()->id(),
            ])>
            <small class="text-gray-400">{{ $message->created_at->diffForHumans() }}</small>
            <p>{{ $message->content }}</p>
        </div>
    </div>
    @endforeach
</div>