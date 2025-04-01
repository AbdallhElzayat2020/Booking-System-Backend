<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProfileUpdateRequest;
use App\Interfaces\AdminProfileRepositoryInterface;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;


    public $profile;

    public function __construct(AdminProfileRepositoryInterface $profile)
    {
        $this->profile = $profile;
    }

    public function index()
    {
        return $this->profile->index();
    }

    public function update(AdminProfileUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        return $this->profile->update($request);
    }

    public function passwordUpdate(Request $request): \Illuminate\Http\RedirectResponse
    {
        return $this->profile->passwordUpdate($request);
    }
}
