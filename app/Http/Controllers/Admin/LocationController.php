<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LocationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationStoreRequest;
use App\Http\Requests\Admin\LocationUpdateRequest;
use App\Interfaces\AdminLocationRepositoryInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public $location;

    public function __construct(AdminLocationRepositoryInterface $location)
    {
        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(LocationDataTable $dataTable)
    {
        return $this->location->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->location->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request)
    {
        return $this->location->store($request);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return $this->location->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationUpdateRequest $request, string $id)
    {
        return $this->location->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->location->destroy($id);
    }
}
