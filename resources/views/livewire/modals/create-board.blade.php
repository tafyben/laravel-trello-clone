<x-modal-wrapper title="Create Board">
    <form wire:submit="createBoard" class="space-y-3">
        <div>
            <x-input-label for="title" value="Title" class="sr-only"/>
            <x-text-input id="title" class="w-full" autofocus wire:model="createBoardForm.title" />
            <x-input-error :messages="$errors->get('createBoardForm.title')"/>
        </div>

        <div class="flex items-center justify-between">
            <x-primary-button>
                Create
            </x-primary-button>

        </div>
    </form>
</x-modal-wrapper>
