<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditCard extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.edit-card');
    }
}
