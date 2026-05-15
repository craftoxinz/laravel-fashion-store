<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('home', ['name' => 'Randie']);
    }

    public function shop()
    {
        //fetching products dari database
        $products = Product::all();

        return Inertia::render('shop', ['products' => $products]); 
    }
}

