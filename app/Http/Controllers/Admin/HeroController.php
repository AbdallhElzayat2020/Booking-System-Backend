<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HeroController extends Controller
{
    public function index()
    {
        return view('admin.Hero.index');
    }
}
