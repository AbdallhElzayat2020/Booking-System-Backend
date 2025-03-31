<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Interfaces\frontendRepositoryInterface;

class FrontendController extends Controller
{
    public $frontend;

    public function __construct(frontendRepositoryInterface $frontend)
    {
        $this->frontend = $frontend;
    }

    public function index()
    {
        return $this->frontend->index();
    }
}
