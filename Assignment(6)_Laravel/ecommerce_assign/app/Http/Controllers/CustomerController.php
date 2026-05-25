<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function fromCairo()
    {
        $customers = Customer::where('customerCity', 'Cairo')->get();
        return view('customers.cairo', compact('customers'));
    }
}