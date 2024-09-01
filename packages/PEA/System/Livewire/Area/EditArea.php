<?php

namespace PEA\System\Livewire\Area;

use Livewire\Attributes\Validate;
use PEA\App\Models\Area;
use LivewireUI\Modal\ModalComponent;

class EditArea extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public Area $area;

    #[Validate('max:255' , message: 'Please fill not more than 255 characters')]
    #[Validate('required' , message: 'Please fill enter name')]
    public $name;
    public $state = 'draft';

    #[Validate('required' , message: 'Please fill enter weight')]
    #[Validate('integer' , message: 'Please fill enter integer')]
    public $weight;


    public function save()
    {

        $this->validate();

        $area = $this->area;
        $area->name = $this->name;
        $area->weight = $this->weight;
        $area->state = $this->state;

        $area->save();

        $this->closeModal();

        $this->dispatch('area-saved');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $area = $this->area;
        $this->name = $area->name;
        $this->state = $area->state;
        $this->weight = $area->weight;

        return view('system::livewire.area.edit-area');
    }
}