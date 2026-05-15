<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SizeController extends Controller
{
    public function index(): View
    {
        /** @var Collection<int, Size> $sizes */
        $sizes = Size::latest()->get();

        return view('admin.sizes.index', compact('sizes'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Need validation

        Size::create($request->all());

        return to_route('admin.sizes.index');
    }

    public function update(Request $request, Size $size): RedirectResponse
    {
        $size->update($request->all());

        return to_route('admin.sizes.index');
    }

    public function destroy(Size $size): RedirectResponse
    {
        $size->delete();

        return to_route('admin.sizes.index');
    }
}
