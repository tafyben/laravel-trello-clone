<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateCard;
use App\Livewire\Forms\EditColumn;
use Livewire\Component;

class Column extends Component
{
    public \App\Models\Column $column;

    public EditColumn $editColumnForm;

    public CreateCard $createCardForm;

    public function mount(){
        $this->editColumnForm->title = $this->column->title;
    }

    public function updateColumn(){
        $this->editColumnForm->validate();

        $this->column->update($this->editColumnForm->only('title'));

        $this->dispatch('column-updated');
    }

    public function createCard(){
        $this->createCardForm->validate();

        $card = $this->column->cards()->make($this->createCardForm->only('title'));
        $card->user()->associate(auth()->user());
        $card->save();
        $this->createCardForm->reset();

        // reset the state of alpine components
        $this->dispatch('card-created');
    }
    public function render()
    {
        return view('livewire.column',[
            'cards' => $this->column->cards()->ordered()->get(),
        ]);
    }
}
