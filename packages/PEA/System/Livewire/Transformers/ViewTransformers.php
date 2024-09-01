<?php

namespace PEA\System\Livewire\Transformers;

use PEA\App\Models\Transformer;
use LivewireUI\Modal\ModalComponent;

class ViewTransformers extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public Transformer $transformer;
    public $name;
    public $description;
    public $latitude;
    public $longitude;
    public $state;


    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $transformer = $this->transformer;
        $this->name = $transformer->name;
        $this->description = $transformer->description;
        $this->latitude = $transformer->latitude;
        $this->longitude = $transformer->longitude;
        $this->state = $transformer->state;

        return view('system::livewire.transformers.view-transformer');
    }
}