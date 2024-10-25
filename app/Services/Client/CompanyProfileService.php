<?php

namespace App\Services\Client;

use App\Models\CompanyProfile;

class CompanyProfileService
{
    public function createCompanyProfile($data)
    {
        return CompanyProfile::create($data);
    }
}
