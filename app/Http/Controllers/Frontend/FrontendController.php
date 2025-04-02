<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\FrontendRepositoryInterface;

class FrontendController extends Controller
{
    public $frontend;

    public function __construct(FrontendRepositoryInterface $frontend)
    {
        $this->frontend = $frontend;
    }

    public function index()
    {
        return $this->frontend->index();
    }
}
