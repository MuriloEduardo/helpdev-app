<div>
    <form wire:submit.prevent="submit" method="POST">
        <div class="mb-6">
            <x-label for="title" value="Título" />
            <x-input type="text" wire:model.lazy="title" id="title" :value="old('title')" class="block w-full" required autofocus />
            @error('title') <span ...>{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <x-label for="content" value="Conteúdo" />
            <x-textarea wire:model.lazy="content" id="content" :value="old('content')" class="block w-full" required />
            @error('content') <span ...>{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <x-label for="tags" value="Tecnologias" />
            <select multiple wire:model="tags" id="tags" class="block w-full" required>
                @foreach ($allTags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
            @error('tags') <span ...>{{ $message }}</span> @enderror
        </div>

        <x-button>Salvar</x-button>
    </form>
</div>