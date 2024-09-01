<?php

namespace PEA\Event\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class SignedURLService
{
    public function generateSignedUrl($userId)
    {
        $route = 'event::display.edit';

        $url = URL::temporarySignedRoute(
            $route,
            Carbon::now()->addMinutes(15),
            ['event'=> '146']
        );
        return $url;
    }


}
