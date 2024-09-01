<?php

namespace PEA\System\Livewire\Area;

use Livewire\Attributes\Validate;
use PEA\App\Models\Area;
use LivewireUI\Modal\ModalComponent;

class AddArea extends ModalComponent
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
    #[Validate('min:0' , message: 'Please fill 0-9999')]
    #[Validate('max:9999' , message: 'Please fill 0-9999')]
    public $weight;
    
    public function submit()
    {

        $this->validate();


        Area::create([
            'name' => $this->name,
            'weight' => $this->weight,
            'state' => $this->state
        ]);


        $this->closeModal();

        $this->dispatch('area-submited');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $area = Area::all();

        return view('system::livewire.area.add-area', compact('area'));
    }
}