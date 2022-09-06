<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getCustomers()
    {
        return Customer::with('user')
            ->orderBy('name', 'asc')
            ->where('active', 1)
            ->get()
            ->map
            ->format();
    }
}
