<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroUpdateRequest;
use App\Interfaces\FrontendHeroRepositoryInterface;
use App\Models\Hero;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroController extends Controller
{
    use FileUploadTrait;

    public $hero;

    public function __construct(FrontendHeroRepositoryInterface $hero)
    {
        $this->hero = $hero;
    }

    public function index(): View
    {
        $hero = Hero::first();
        return view('admin.Hero.index', compact('hero'));
    }

    public function update(HeroUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $imgPath = $this->handleFileUpload($request, 'background', $request->old_background);

        $hero = Hero::first();
        Hero::updateOrCreate(
            ['id' => 1],
            [
                'background' => !empty($imgPath) ? $imgPath : $request->old_background,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]
        );

        toastr()->success('updated successfully');

        return redirect()->back();
    }
}
