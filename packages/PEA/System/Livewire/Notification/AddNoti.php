<?php

namespace PEA\System\Livewire\Notification;

use Livewire\Attributes\Validate;
use PEA\App\Models\Notification;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class AddNoti extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    use WithFileUploads;
    
    public Notification $noti;

    #[Validate('max:255' , message: 'Please fill not more than 255 characters')]
    #[Validate('required' , message: 'Please fill enter name')]
    public $name;
    public $subject;
    public $body;
    public $sms;

    #[Validate('required', message: 'Please select type')] 
    public $type;

    public $state = 'draft';

    #[Validate('required', message: 'Please enter code')]
    public $code;
    
    public function submit()
    {

        $this->validate();
        
        Notification::create([
            'name' => $this->name,
            'subject' => $this->subject,
            'body' => $this->body,
            'sms' => $this->sms,
            'type' => $this->type,
            'state' => $this->state,
            'code' => $this->code
        ]);

        $this->closeModal();

        $this->dispatch('noti-submited');

    }

    public function close()
    {
        $this->closeModal();
    }
    

    public function render()
    {
        return view('system::livewire.notification.add-noti');
    }
    
}