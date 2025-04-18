<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Interfaces\AdminCategoryRepositoryInterface;
use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public $category;

    public function __construct(AdminCategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }



    /**
     * Display a listing of the resource.
     */
//    public function index(CategoryDataTable $dataTable)
//    {
//        return $dataTable->render('admin.categories.index');
//    }

    public function index(CategoryDataTable $dataTable)
    {
        return $this->category->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        return $this->category->store($request);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('slug', $id)->firstOrFail();
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
