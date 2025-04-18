<?php

namespace App\Interfaces;

use App\DataTables\CategoryDataTable;

interface AdminCategoryRepositoryInterface
{
    public function index($dataTable);

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}
