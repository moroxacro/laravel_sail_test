<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService; // 忘れずにuse
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCustomers(CustomerService $customerService): \Illuminate\Http\JsonResponse
    {
        return response()->json(Customer::query()->select(['id', 'name'])->get());
    }

    public function postCustomers(Request $request, CustomerService $customerService)
    {
        $this->validate($request,['name' => 'required']);
        $customerService->addCustomer($request->json('name'));
    }
}
