<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.profile.index');
    }

    public function update(UserProfileUpdateRequest $request)
    {

        dd($request->all());
        return redirect()->back();
    }
}
