<?php

namespace App\Services\Client;

use App\Models\CustomerProfile;

class CustomerProfileService
{
    public function createCustomerProfile($data)
    {
        return CustomerProfile::create($data);
    }
}
