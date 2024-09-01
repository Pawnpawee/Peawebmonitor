<?php

namespace PEA\System\Livewire\Microgrid;

use Livewire\Attributes\Validate;
use PEA\App\Models\Microgrid;
use LivewireUI\Modal\ModalComponent;

class EditGrid extends ModalComponent
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


    public function save()
    {

        $this->validate();

        $microgrid = $this->microgrid;
        $microgrid->name = $this->name;
        $microgrid->description = $this->description;
        $microgrid->latitude = $this->latitude;
        $microgrid->longitude = $this->longitude;
        $microgrid->state = $this->state;

        $microgrid->save();

        $this->closeModal();

        $this->dispatch('microgrid-saved');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $microgrid = $this->microgrid;
        $this->name = $microgrid->name;
        $this->description = $microgrid->description;
        $this->latitude = $microgrid->latitude;
        $this->longitude = $microgrid->longitude;
        $this->state = $microgrid->state;

        return view('system::livewire.microgrid.edit-grid');
    }
}