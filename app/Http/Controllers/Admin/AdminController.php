<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', 2)->where('permission', '0')->get();
        return view('admin.home', get_defined_vars());
    }

    public function accept($id)
    {
        User::findOrFail($id)->update([
            'permission' => 1
        ]);
        return redirect()->back();
    }
    public function decline($id)
    {
        User::findOrFail($id)->update([
            'permission' => 2
        ]);
        return redirect()->back();
    }
}