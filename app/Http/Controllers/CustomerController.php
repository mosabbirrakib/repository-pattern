<?php

namespace App\Http\Controllers;

use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        try {
            return $this->customerRepository->getCustomers();
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
