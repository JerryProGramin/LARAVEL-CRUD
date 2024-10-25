<?php

namespace App\Services\Client;

use App\Models\Client;

class ClientService
{
    public function createClient($profile, $email, $phone_number, $profileType)
    {
        return Client::create([
            'email' => $email,
            'phone_number' => $phone_number,
            'clientable_id' => $profile->id,
            'clientable_type' => $profileType,
        ]);
    }
}
