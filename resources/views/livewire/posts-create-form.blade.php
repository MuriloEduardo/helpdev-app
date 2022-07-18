<div>
    <form wire:submit.prevent="submit" method="POST">
        <div class="mb-6">
            <x-label for="title" value="Título" />
            <x-input type="text" wire:model="title" id="title" :value="old('title')" class="block w-full" required autofocus />
            @error('title') <span ...>{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <x-label for="content" value="Conteúdo" />
            <x-textarea wire:model="content" id="content" :value="old('content')" class="block w-full" required />
            @error('content') <span ...>{{ $message }}</span> @enderror
        </div>

        <x-button>Salvar</x-button>
    </form>
</div>