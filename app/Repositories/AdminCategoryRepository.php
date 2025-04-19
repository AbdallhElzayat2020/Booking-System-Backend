<?php

namespace App\Repositories;

use App\DataTables\CategoryDataTable;
use App\Interfaces\AdminCategoryRepositoryInterface;
use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminCategoryRepository implements AdminCategoryRepositoryInterface
{
    use FileUploadTrait;

    public function index($dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    public function create(): View
    {
        return view('admin.categories.create');
    }

    public function store($request): \Illuminate\Http\RedirectResponse
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

    public function edit($id): View
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update($request, $id)
    {
        $iconPath = $this->handleFileUpload($request, 'icon_image', $request->old_icon);
        $backgroundPath = $this->handleFileUpload($request, 'background_image', $request->old_background);

        $category = Category::findOrFail($id);
        $category->icon_image = !empty($iconPath) ? $iconPath : $request->old_icon;
        $category->background_image = !empty($backgroundPath) ? $backgroundPath : $request->old_background;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->show_at_home = $request->show_at_home;
        $category->status = $request->status;
        $category->save();

        toastr()->success('Category Updated successfully.');
        return to_route('admin.categories.index');
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);

            $this->deleteFile($category->icon_image);
            $this->deleteFile($category->background_image);

            $category->delete();

            return response()->json(['status' => 'success', 'message' => 'Category deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Category not found.']);
        }

    }
}
