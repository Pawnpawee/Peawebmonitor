<?php

namespace PEA\Event\Jobs;

use Jobs\AdminEditUserLink;
use Jobs\Mail;
use Jobs\Request;

class SendAlertEmail
{
    public function sendEditLink(Request $request, $userId)
    {
        $url = $this->generateSignedUrl($userId);
        $adminEmail = 'admin@example.com'; // The admin's email

        // Send the URL to the admin via email, notification, etc.
        Mail::to($adminEmail)->send(new AdminEditUserLink($url));

        return response()->json(['message' => 'Edit link sent to admin.']);
    }

}
