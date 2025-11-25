<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Admin\Services\CustomerService;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerService $customerService
    ) {
    }

    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('admin::admin.customer.index', compact('customers'));
    }
}

