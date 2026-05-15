<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public function index(): View
    {
        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Need validation

        Supplier::create($request->all());

        return to_route('admin.suppliers.index');
    }

    public function update(Request $request, Supplier $supplier): RedirectResponse
    {
        $supplier->update($request->all());

        return to_route('admin.suppliers.index');
    }

    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();

        return to_route('admin.suppliers.index');
    }
}
