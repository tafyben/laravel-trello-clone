    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid lg:grid-cols-3 gap-6">
           @foreach($boards as $board)
                <a href="{{route('boards.show', $board)}}" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg
                h-40 flex lg:items-end p-6 text-gray-900 text-lg"
                >
                    {{$board->title}}
                </a>
           @endforeach

            <button class="bg-gray-200 dark:bg-gray-800 overflow-hidden shadow-sm
            sm:rounded-lg h-40 flex items-center justify-center p-6 text-gray-900 text-lg space-x-1"
                    wire:click="$dispatch('openModal', { component: 'modals.create-board'})"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>
                    New Board
                </span>
            </button>
        </div>
    </div>
