<?php

namespace App\Services;

use stdClass;
use Twilio\Rest\Client;

class NotifikasiService
{
    public function beranda()
    {
        $account_sid = getenv('TWILIO_ACCOUNT_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_NUMBER');

        $client = new Client($account_sid, $auth_token);

        $messages = $client->messages->create(
            'whatsapp:+6285331303015',
            [
                'from' => 'whatsapp:'.$twilio_number,
                'body' => 'Ini adalah percobaan pesan dari Twilio.'
            ]
        );

        return $messages;
    }
}
