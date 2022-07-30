<div>
    <div class="shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <div class="flex justify-between items-center">
            
            <!-- PostCreated -->
            @if ($notification->type === 'App\Notifications\PostCreated')
            <div>
                <a href="{{ route('posts.show', $post) }}" class="text-indigo-500">Ei Dev! {{ $post->user->name }} está precisando de uma ajudinha com suas skill's.</a>
                <br>
                <small class="text-gray-400">{{ $notification->created_at->diffForHumans() }}</small>
            </div>

            <!-- TransactionCreated -->
            @elseif ($notification->type === 'App\Notifications\TransactionCreated')

            <div>
                @if ($notification->data['amount'] < 0)
                <span>Quantia descontada como garantia em </span>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
                <span> para </span>
                <a href="{{ route('users.show', $post->user) }}">
                    {{ $post->user->name }}
                </a>

                @elseif (!$user && !$post)
                <span>Saldo adicionado</span>
                
                @else
                <span>Recebimento de recompensa em </span>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
                <span> por </span>
                <a href="{{ route('users.show', $post->user) }}">
                    {{ $post->user->name }}
                </a>

                @endif

                <span>R${{ number_format($notification->data['amount'], 2, ',', '.') }}</span>
            </div>

            <!-- TalkCreated -->
            @elseif ($notification->type === 'App\Notifications\TalkCreated')
            <a href="{{ route('talks.show', $talk) }}">
                {{ $talk->user->name }} disse que saberia te ajudar a resolver!
            </a>

            <!-- TalkAccepted -->
            @elseif ($notification->type === 'App\Notifications\TalkAccepted')
            <a href="{{ route('talks.show', $talk) }}">
                {{ $talk->post->user->name }} aceitou sua ajuda e já fez a garantia de recompensa!
            </a>

            <!-- TalkCompleted -->
            @elseif ($notification->type === 'App\Notifications\TalkCompleted')
            <a href="{{ route('talks.show', $talk) }}">
                Ajuda concluida, mandaram bem!
            </a>

            @endif

            <button wire:click="markAsRead" class="p-3 hover:bg-gray-200 rounded" title="Marcar como lida">
                <span class="svg-icon svg-icon-primary svg-icon-2x">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero" />
                            <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>
            </button>
        </div>
    </div>
</div>