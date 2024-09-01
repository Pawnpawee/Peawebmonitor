<?php

namespace PEA\System\Livewire\Notification;

use Livewire\Attributes\Validate;
use PEA\App\Models\Notification;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;

class EditNoti extends ModalComponent
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
    public $newbody;
    public $sms;

    #[Validate('required', message: 'Please select type')] 
    public $type;

    public $state = 'draft';

    #[Validate('required', message: 'Please enter code')]
    public $code;

    public function mount()
    {
        $noti = $this->noti;
        $this->type = $noti->type;
    }
    public function save()
    {

        $this->validate();

        $noti = $this->noti;
        $noti->name = $this->name;
        $noti->subject = $this->subject;
        $noti->body = $this->newbody;
        $noti->sms = $this->sms;
        $noti->type = $this->type;
        $noti->state = $this->state;
        $noti->code = $this->code;
        
        $noti->save();
    
        $this->closeModal();

        $this->dispatch('noti-saved');

    }

    public function close()
    {
        $this->closeModal();
    }

    public function render()
    {
        $noti = $this->noti;
        $this->name = $noti->name;
        $this->subject = $noti->subject;
        $this->body = $noti->body;
        $this->sms = $noti->sms;
        $this->state = $noti->state;
        $this->code = $noti->code;

        return view('system::livewire.notification.edit-noti');
    }
}