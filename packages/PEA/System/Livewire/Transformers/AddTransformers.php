<?php

namespace PEA\System\Livewire\Transformers;

use Livewire\Attributes\Validate;
use PEA\App\Models\Microgrid;
use PEA\App\Models\Transformer;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class AddTransformers extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }

    use WithFileUploads;
    
    public Transformer $transformer;

    #[Validate('required' , message: 'Please select microgrid')]
    public $microgrid_id;

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
        
        Transformer::create([
            'microgrid_id' => $this->microgrid_id,
            'name' => $this->name,
            'description' => $this->description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'state' => $this->state,
        ]);

        $this->closeModal();

        $this->dispatch('transformer-submited');

    }

    public function close()
    {
        $this->closeModal();
    }
    

    public function render()
    {
        $microgrids = Microgrid::orderBy('name', 'asc')->get();

        return view('system::livewire.transformers.add-transformer', compact('microgrids'));
    }
}