<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        /** @var \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products */
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Need validation

        Product::create($request->all());

        return to_route('admin.products.index');
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->update($request->all());

        return to_route('admin.products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return to_route('admin.products.index');
    }
}
