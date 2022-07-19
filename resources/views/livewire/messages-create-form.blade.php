<form wire:submit.prevent="submit" method="POST">
    <div class="flex">
        <div class="grow">
            <x-textarea wire:model.lazy="content" id="content" :value="old('content')" class="block w-full" required />
            @error('content') <span ...>{{ $message }}</span> @enderror
        </div>

        <x-button>Enviar</x-button>
    </div>
</form>