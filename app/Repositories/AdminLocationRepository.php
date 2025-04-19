<?php

namespace App\Repositories;

use App\Interfaces\AdminLocationRepositoryInterface;
use App\Models\Location;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminLocationRepository implements AdminLocationRepositoryInterface
{
    public function index($dataTable): View|JsonResponse
    {
        return $dataTable->render('admin.location.index');
    }

    public function create(): View
    {
        return view('admin.location.create');
    }

    public function store($request)
    {
        $location = new Location();
        $location->name = $request->name;
        $location->slug = Str::slug($request->name);
        $location->show_at_home = $request->show_at_home;
        $location->status = $request->status;
        $location->save();

        toastr()->success('added successfully.');

        return to_route('admin.location.index');
    }

    public function edit($id): View
    {
        $location = Location::findOrFail($id);
        return view('admin.location.edit', compact('location'));
    }

    public function update($request, $id): \Illuminate\Http\RedirectResponse
    {
        $location = Location::findOrFail($id);
        $location->name = $request->name;
        $location->slug = Str::slug($request->name);
        $location->show_at_home = $request->show_at_home;
        $location->status = $request->status;
        $location->save();

        toastr()->success('added successfully.');

        return to_route('admin.location.index');
    }

    public function destroy($id): JsonResponse
    {
        try {
            $category = Location::findOrFail($id);

            $category->delete();

            return response()->json(['status' => 'success', 'message' => 'deleted successfully.']);
        } catch (\Exception $e) {
            logger($e);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

    }
}
