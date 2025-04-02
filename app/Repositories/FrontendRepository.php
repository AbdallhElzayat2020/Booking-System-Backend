<?php

namespace App\Repositories;

use App\Interfaces\FrontendRepositoryInterface;

class FrontendRepository implements FrontendRepositoryInterface
{
    public function index()
    {
        return view('frontend.home.index');
    }
}
