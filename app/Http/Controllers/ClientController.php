<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\CustomerProfile;
use App\Services\Client\ClientService;
use App\Services\Client\CompanyProfileService;
use App\Services\Client\CustomerProfileService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(
        protected ClientService $clientService,
        protected CustomerProfileService $customerProfileService,
        protected CompanyProfileService $companyProfileService
    ){
    }

    public function storeIndividual(Request $request)
    {
        $customerProfile = $this->customerProfileService->createCustomerProfile($request->all());
        $client = $this->clientService->createClient($customerProfile, $request->email, $request->phone_number, CustomerProfile::class);
        return response()->json($client, 201);
    }

    public function storeCompany(Request $request)
    {
        $companyProfile = $this->companyProfileService->createCompanyProfile($request->all());
        $client = $this->clientService->createClient($companyProfile, $request->email, $request->phone_number, CompanyProfile::class);
        return response()->json($client, 201);
    }
}