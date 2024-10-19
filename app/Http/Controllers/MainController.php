<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{

    public function index(Request $request)
    {
        return Inertia::render('Main/Index', [
            'title' => __('Главная страница'),
        ]);
    }

    public function about()
    {
        return 'About';
    }
}
