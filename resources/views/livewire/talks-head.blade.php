<div class="flex items-center justify-between">
    <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $talk->post->title }}
        </h2>

        <div>{{ $talk->post->status->name }}</div>
    </div>

    <div>
        <small>Postado à {{ $talk->post->created_at->diffForHumans() }}</small>
        <small>por <a href="{{ route('users.show', $talk->post->user) }}" class="text-indigo-300">{{ $talk->post->user->name }}</a></small>
        <div class="font-bold text-green-700 text-right">R${{ number_format($talk->post->amount, 2, ',', '.') }}</div>
    </div>
</div>