<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('home', ['name' => 'Randie']);
    }

    public function shop()
    {
        return Inertia::render('shop'); 
    }
}

