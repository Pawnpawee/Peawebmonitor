<?php

namespace PEA\Event\Controllers;


use PEA\Event\Models\Event\Event;
use PEA\Event\Services\SignedURLService;

class DisplayController extends
    BaseController
{
    public function index()
    {
        return view('event::display.index');
    }

    public function edit($event)
    {
        $event = Event::findOrFail($event);
        // Verify that the signed URL is valid and not expired
//        if (! request()->hasValidSignature()) {
//            abort(403);
//        }

        // Perform your edit logic here
        // For example, return a view to edit the user
        return view('event::display.edit', compact('event'));
    }

    public function testSigned(){
        $service = new SignedURLService();
        return $service->generateSignedUrl(146);
    }
}
