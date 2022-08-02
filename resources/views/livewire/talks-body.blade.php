<div>
    @if ($talk->completed_at && $talk->post->completed_at)
    <div class="text-center text-gray-400">Essa conversa foi finalizada!</div>

    @else

    @if ($talk->post->user_id === auth()->id())
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-b border-gray-200">
        <h4 class="text-xl text-green-600"><strong>Opa!</strong> {{ $talk->user->name }} <strong>disse que sabe te ajudar!</strong></h4>
        <p>Bora trocar uma ideia?</p>
        <small>Sejam objetivos nas conversas e saibem que qualquer coisa tudo estará seguro e transparente para ambos.</small>
    </div>

    <div class="my-4 flex items-center">
        @can ('accept-talk', $talk)
        <livewire:talks-accept :talk="$talk" />
        @endcan

        @if ($talk->post->user->balance < $talk->post->amount)
            <div class="px-3">
                <span>Seu saldo é insuficiente, você precisa </span>
                <a href="{{ route('transactions.create') }}" class="text-indigo-500">adicionar saldo</a>
                <div>
                    <a href="#" class="text-sm text-gray-400">Saiba porque</a>
                </div>
            </div>
            @endif
    </div>
    @endif

    @can ('conclude-talk', $talk)
    <div>
        @if ($talk->user_id === auth()->id())
        <div class="mb-4 bg-white shadow-sm sm:rounded-lg p-4 border-b border-gray-200">
            <div class="text-lg">Legal! sua recompensa esta garantida 😎</div>
            <small>Agora você já pode ajudar a resolver com segurança.</small>
        </div>
        @endif

        @if ($talk->completed_at || $talk->post->completed_at)
        <div>
            @if ($talk->post->user_id === auth()->id())
            @isset ($talk->completed_at)
            <span>{{ $talk->user->name }}</span>
            <span>disse que vocês terminaram...</span>
            @endisset
            @endif

            @if ($talk->user_id === auth()->id())
            @isset ($talk->post->completed_at)
            <span>{{ $talk->post->user->name }}</span>
            <span>disse que vocês terminaram...</span>
            @endisset
            @endif

        </div>
        @endif

        <livewire:talks-concludes :talk="$talk" />
    </div>
    @endcan

    <livewire:messages-list :talk="$talk" />

    <livewire:messages-create-form :talk="$talk" />
    @endif
</div>