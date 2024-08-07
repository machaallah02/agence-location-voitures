<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return inertia('frontend/Home');
    }

    public function reservations()
    {
        return inertia('frontend/Reservations');
    }

    public function contact()
    {
        return inertia('frontend/Contact');
    }

    public function register()
    {
        return inertia('frontend/Register');
    }
}
