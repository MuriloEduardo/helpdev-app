<form wire:submit.prevent="submit" method="POST">
    <div class="mb-6">
        <x-label for="name" value="Como devemos lhe chamar?" />
        <x-input type="text" wire:model.lazy="user.name" id="name" value="{{ $user->name }}" class="block" size="75" required autofocus />
        @error('user.name') <span class="text-red-600" ...>{{ $message }}</span> @enderror
    </div>

    <div class="mb-6">
        <x-label for="tags" value="Quais tecnologias do seu interesse?" />

        <x-multiple-select wire:model="tags" id="tags" class="block w-full">
            @foreach ($allTags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </x-multiple-select>
        @error('tags') <span class="text-red-600" ...>{{ $message }}</span> @enderror
    </div>

    <x-button>Salvar</x-button>
</form>