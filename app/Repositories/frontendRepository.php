<?php

namespace App\Repositories;

use App\Interfaces\frontendRepositoryInterface;

class frontendRepository implements frontendRepositoryInterface
{
    public function index()
    {
        return view('frontend.home.index');
    }
}
