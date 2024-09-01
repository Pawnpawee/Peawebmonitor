<?php

namespace PEA\System\Livewire\Microgrid;

use Livewire\Attributes\Validate;
use PEA\App\Models\Microgrid;
use LivewireUI\Modal\ModalComponent;

class AddGrid extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public Microgrid $microgrid;

    #[Validate('max:255' , message: 'Please fill not more than 255 characters')]
    #[Validate('required' , message: 'Please fill enter name')]
    public $name;
    public $description;

    #[Validate('required', message: 'Please fill enter latitude')] 
    #[Validate('numeric', message: 'Please fill number latitude')]
    #[Validate('regex:/^(\+|-)?([1-8]?\d(\.\d+)?|90(\.0+)?)$/', message: 'Please fill correct format latitude')]
    public $latitude;

    #[Validate('required', message: 'Please fill enter longitude')]
    #[Validate('numeric', message: 'Please fill number longitude')]
    #[Validate('regex:/^(\+|-)?(180(\.0+)?|((1[0-7]\d)|([1-9]?\d))(\.\d+)?)$/', message: 'Please fill correct format longitude')]
    public $longitude;
    public $state = 'draft';
    
    public function submit()
    {

        $this->validate();


        Microgrid::create([
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'state' => $this->state
        ]);


        $this->closeModal();

        $this->dispatch('microgrid-submited');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $microgrid = Microgrid::all();

        return view('system::livewire.microgrid.add-grid', compact('microgrid'));
    }
}