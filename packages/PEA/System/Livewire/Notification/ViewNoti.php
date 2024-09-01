<?php

namespace PEA\System\Livewire\Notification;

use PEA\App\Models\Notification;
use LivewireUI\Modal\ModalComponent;

class ViewNoti extends ModalComponent
{
    public static function modalMaxWidth(): string
    {
        return '4xl';
    }
    public Notification $noti;
    public $name;
    public $subject;
    public $body;
    public $sms;
    public $type;
    public $state = 'draft';
    public $code;


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
        $this->type = $noti->type;
        $this->state = $noti->state;
        $this->code = $noti->code;

        return view('system::livewire.notification.view-noti');
    }
}