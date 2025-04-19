<?php

namespace App\Repositories;

use App\Interfaces\AdminLocationRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class AdminLocationRepository implements AdminLocationRepositoryInterface
{
    public function index($dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.location.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($request)
    {
        // TODO: Implement store() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}
