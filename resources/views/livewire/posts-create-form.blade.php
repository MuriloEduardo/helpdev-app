<form wire:submit.prevent="submit" method="POST">
    <div class="mb-6">
        <x-label for="title" value="Título" />
        <x-input type="text" wire:model.lazy="title" id="title" :value="old('title')" size="75" class="block" required autofocus />
        @error('title') <span class="text-red-600" ...>{{ $message }}</span> @enderror
    </div>

    <div class="mb-6">
        <x-label for="content" value="Conteúdo" />
        <x-textarea wire:model.lazy="content" id="content" :value="old('content')" class="block w-full" required />
        @error('content') <span class="text-red-600" ...>{{ $message }}</span> @enderror
    </div>

    <div class="columns-3 mb-6">
        <div>
            <x-label for="tags" value="Tecnologias" />
            <x-multiple-select wire:model="tags" id="tags" class="block w-full" required>
                @foreach ($allTags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </x-multiple-select>
            @error('tags') <span class="text-red-600" ...>{{ $message }}</span> @enderror
        </div>

        <div>
            <x-label value="Quanto deseja oferecer de recompensa?" />

            <div class="flex flex-wrap justify-between">
                <div class="p-3">
                    <input type="radio" wire:model="amount" id="5" value="5" required>
                    <label for="5">R$ 5,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="10" value="10" required>
                    <label for="10">R$ 10,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="15" value="15" required>
                    <label for="15">R$ 15,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="20" value="20" required>
                    <label for="20">R$ 20,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="25" value="25" required>
                    <label for="25">R$ 25,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="30" value="30" required>
                    <label for="30">R$ 30,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="35" value="35" required>
                    <label for="35">R$ 35,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="40" value="40" required>
                    <label for="40">R$ 40,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="45" value="45" required>
                    <label for="45">R$ 45,00</label>
                </div>

                <div class="p-3">
                    <input type="radio" wire:model="amount" id="50" value="50" required>
                    <label for="50">R$ 50,00</label>
                </div>
            </div>

            @error('amount') <span class="text-red-600" ...>{{ $message }}</span> @enderror
        </div>
    </div>

    <x-button>Salvar</x-button>
</form>