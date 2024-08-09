<?php

namespace App\Livewire;

use App\Models\Board;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardShow extends Component
{
    public Board $board;
    public function mount(){
        $this->authorize('show',$this->board);
    }

    public function sorted(array $items){
        $order = collect($items)->pluck('value')->toArray();
        \App\Models\Column::setNewOrder($order,1,'id', function (Builder $query){
            $query->where('user_id', auth()->id());
        });
    }

    public function moved(array $items){
        collect($items)->recursive()->each(function ($column){
            $columnId = $column->get('value');
            $order = $column->get('items')->pluck('value')->toArray();

            \App\Models\Card::where('user_id', auth()->id())->find($order)->where('column_id', '!=', $columnId)->each->update([
                    'column_id' => $columnId
                ]);

            \App\Models\Card::setNewOrder($order, 1, 'id', function (Builder $query){
                $query->where('user_id', auth()->id());
            });
        });
    }
    public function createColumn(){

    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.board-show', [
            'columns' => $this->board->columns()->ordered()->get(),
        ]);
    }
}
