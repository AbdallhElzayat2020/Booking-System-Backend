<?php

namespace App\Interfaces;

use App\DataTables\CategoryDataTable;

interface AdminCategoryRepositoryInterface
{
    public function index($dataTable);

    public function create();

    public function store($request);
}
