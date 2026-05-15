<?php

namespace App\Http\Controllers;
use App\Models\Order;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Need validation

        Order::create($request->all());

        return to_route('admin.orders.index');
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $order->update($request->all());

        return to_route('admin.orders.index');
    }

    public function destroy(Order $order): RedirectResponse
    {
        $order->delete();

        return to_route('admin.orders.index');
    }
}
