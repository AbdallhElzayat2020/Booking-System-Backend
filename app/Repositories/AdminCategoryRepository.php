<?php

namespace App\Repositories;

use App\DataTables\CategoryDataTable;
use App\Interfaces\AdminCategoryRepositoryInterface;
use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Str;

class AdminCategoryRepository implements AdminCategoryRepositoryInterface
{
    use FileUploadTrait;

    public function index($dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($request)
    {

        $iconPath = $this->handleFileUpload($request, 'icon_image');
        $backgroundPath = $this->handleFileUpload($request, 'background_image');

        $category = new Category();
        $category->icon_image = $iconPath;
        $category->background_image = $backgroundPath;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->show_at_home = $request->show_at_home;
        $category->status = $request->status;
        $category->save();

        toastr()->success('Category added successfully.');
        return to_route('admin.categories.index');
    }
}
