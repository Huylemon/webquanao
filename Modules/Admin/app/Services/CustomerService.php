<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\CustomerRepository;

class CustomerService extends BaseService
{
    public function __construct(
        protected CustomerRepository $customerRepository
    ) {
    }

    /**
     * Get all customers
     */
    public function getAllCustomers()
    {
        return $this->customerRepository->all();
    }
}

