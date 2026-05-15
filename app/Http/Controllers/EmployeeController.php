<?php

namespace App\Http\Controllers;
use App\Models\Employee;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::all();

        return view('admin.employees.index', compact('employees'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Need validation

        Employee::create($request->all());

        return to_route('admin.employees.index');
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->all());

        return to_route('admin.employees.index');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();

        return to_route('admin.employees.index');
    }
}
