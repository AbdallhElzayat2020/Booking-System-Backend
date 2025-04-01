<?php

namespace App\Interfaces;

interface AdminProfileRepositoryInterface
{
    public function index();

    public function update($request);

    public function passwordUpdate($request);
}
