<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserProfileUpdateRequest;
use App\Interfaces\UserProfileRepositoryInterface;
use App\Traits\FileUploadTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public $profile;

    public function __construct(UserProfileRepositoryInterface $profile)
    {
        $this->profile = $profile;
    }

    public function index()
    {
        return $this->profile->index();
    }

    public function update(UserProfileUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        return $this->profile->update($request);
    }

    public function updatePassword(Request $request)
    {
        return $this->profile->passwordUpdate($request);
    }
}
