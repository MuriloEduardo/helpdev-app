@if ($post->accepted && (isset($post->completed_at) && isset($talk->completed_at)))
Conversa Finalizada
@elseif ($post->accepted)
Conversa Aceita
@else
Aberta
@endif