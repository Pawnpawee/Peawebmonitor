<?php

namespace PEA\System\Livewire\Transformers;

use Livewire\Attributes\Validate;
use PEA\App\Models\Microgrid;
use PEA\App\Models\Transformer;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class EditTransformers extends ModalComponent
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
    public function save()
    {

        $this->validate();

        $transformer = $this->transformer;
        $transformer->microgrid_id = $this->microgrid_id;
        $transformer->name = $this->name;
        $transformer->description = $this->description;
        $transformer->latitude = $this->latitude;
        $transformer->longitude = $this->longitude;
        $transformer->state = $this->state;

        $transformer->save();
    
        $this->closeModal();

        $this->dispatch('transformer-saved');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $microgrids = Microgrid::all();

        $transformer = $this->transformer;
        $this->microgrid_id = $transformer->microgrid_id;
        $this->name = $transformer->name;
        $this->description = $transformer->description;
        $this->latitude = $transformer->latitude;
        $this->longitude = $transformer->longitude;
        $this->state = $transformer->state;

        return view('system::livewire.transformers.edit-transformer', compact('microgrids'));
    }
}