<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        /** @var Collection<int, Payment> $payments */
        $payments = Payment::latest()->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Need validation

        Payment::create($request->all());

        return to_route('admin.payments.index');
    }

    public function update(Request $request, Payment $payment): RedirectResponse
    {
        $payment->update($request->all());

        return to_route('admin.payments.index');
    }

    public function destroy(Payment $payment): RedirectResponse
    {
        $payment->delete();

        return to_route('admin.payments.index');
    }
}
