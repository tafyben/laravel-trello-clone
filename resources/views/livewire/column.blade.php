    <div class="bg-white self-start shrink-0 rounded-lg shadow-sm max-h-full w-[260px] flex flex-col">
        <div class="flex items-center justify-between">
            <div
                x-data="{editing:false}"
                x-on:click.outside="editing = false"
                class="h-8 w-full flex items-center px-4 pr-0 min-w-0"
            >
                <button
                    x-on:click="editing = true"
                    x-show="!editing"
                    x-on:column-updated.window="editing = false"
                    class="text-left w-full font-medium"
                >
                    {{$column->title}}
                </button>
                <template x-if="editing">
                    <form wire:submit="updateColumn" class="-ml-[calc(theme('margin[1.5]')+1px)] grow">
                        <x-text-input value="Column title" class="h-8 px-1.5 w-full" wire:model="editColumnForm.title"/>
                    </form>
                </template>
            </div>
            <div class="px-3.5 py-3">
                <x-dropdown>
                    <x-slot name="trigger">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>

                    </x-slot>
                    <x-slot name="content">
                        dropdown
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
        <div
            class="p-3 space-y-1.5 overflow-y-scroll"
            wire:sortable-group.item-group="{{$column->id}}"


        >
            @foreach($cards as $card)
                <div wire:key=""{{$card->id}} wire:sortable-group.item="{{$card->id}}">
                    {{-- the wire:key here was causing a hydration error --}}
                    <livewire:card :key="$card->id" :card="$card"/>
                </div>
            @endforeach
        </div>
        <div></div>

    </div>
