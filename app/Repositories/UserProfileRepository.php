<?php

namespace App\Repositories;

use App\Interfaces\AdminProfileRepositoryInterface;
use App\Interfaces\UserProfileRepositoryInterface;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;

class UserProfileRepository implements UserProfileRepositoryInterface
{
    use FileUploadTrait;

    public function index()
    {
        $user = Auth::user();
        return view('frontend.dashboard.profile.index', compact('user'));
    }

    public function update($request)
    {
        $avatarPath = $this->handleFileUpload($request, 'avatar', $request->old_avatar);
        $bannerPath = $this->handleFileUpload($request, 'banner', $request->old_banner);

        $user = Auth::user();
        $user->avatar = !empty($avatarPath) ? $avatarPath : $request->old_avatar;
        $user->banner = !empty($bannerPath) ? $bannerPath : $request->old_banner;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about = $request->about;
        $user->website = $request->website;
        $user->fb_link = $request->fb_link;
        $user->x_link = $request->x_link;
        $user->in_link = $request->in_link;
        $user->wa_link = $request->wa_link;
        $user->instra_link = $request->instra_link;
        $user->save();
        toastr()->success('updated successfully');
        return redirect()->back();
    }

    public function passwordUpdate($request)
    {
        $request->validate([
            'password' => ['required', 'same:password_confirmation', 'min:8'],
            'password_confirmation' => ['required', 'min:8', 'confirmed:password'],
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Password updated successfully');
        return redirect()->back();
    }
}
