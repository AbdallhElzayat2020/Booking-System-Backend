<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function update(AdminProfileUpdateRequest $request)
    {
        // update Data
        dd($request->all());
        
    }
}
