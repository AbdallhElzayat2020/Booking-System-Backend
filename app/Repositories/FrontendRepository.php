<?php

namespace App\Repositories;

use App\Interfaces\FrontendRepositoryInterface;
use App\Models\Hero;

class FrontendRepository implements FrontendRepositoryInterface
{
    public function index()
    {
        $hero = Hero::first();
        return view('frontend.home.index', compact('hero'));
    }
}
