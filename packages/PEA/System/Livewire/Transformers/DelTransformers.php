<?php

namespace PEA\System\Livewire\Transformers;

use PEA\App\Models\Transformer;
use LivewireUI\Modal\ModalComponent;

class DelTransformers extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
    public $transformer;
    public function delete()
    {
    
        Transformer::find($this->transformer)->delete();
          
        $this->closeModal();
        
        $this->dispatch('transformer-deleted');
        
    }
    public function close()
    {
        $this->closeModal();
    }


    public function render()
    {
        return view('system::livewire.transformers.del-transformer');
    }
}