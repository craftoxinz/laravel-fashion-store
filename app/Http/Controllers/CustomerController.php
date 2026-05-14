<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        /** @var Collection<int, Customer> $customers */
        $customers = Customer::latest()->get();

        return view('admin.customers.index', compact('customers'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Need validation

        Customer::create($request->all());

        return to_route('admin.customers.index');
    }

    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->all());

        return to_route('admin.customers.index');
    }

     public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return to_route('admin.customers.index');
    }
}
