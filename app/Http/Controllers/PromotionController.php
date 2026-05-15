<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PromotionController extends Controller
{
    public function index(): View
    {
        /** @var Collection<int, Promotion> $promotions */
        $promotions = Promotion::latest()->get();

        return view('admin.promotions.index', compact('promotions'));
    }

    public function store(Request $request): RedirectResponse
    {
        // TODO: Need validation

        Promotion::create($request->all());

        return to_route('admin.promotions.index');
    }

    public function update(Request $request, Promotion $promotion): RedirectResponse
    {
        $promotion->update($request->all());

        return to_route('admin.promotions.index');
    }

    public function destroy(Promotion $promotion): RedirectResponse
    {
        $promotion->delete();

        return to_route('admin.promotions.index');
    }
}
