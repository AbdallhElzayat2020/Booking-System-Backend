<?php

namespace App\Interfaces;

interface UserProfileRepositoryInterface
{
    public function index();

    public function update($request);

    public function passwordUpdate($request);
}
