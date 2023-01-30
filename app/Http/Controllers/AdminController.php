<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display the Admin dashboard index view.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $active = 'dashboard';
        return view('admin.index',compact('active'));
    }
    public function employees()
    {
        $active = 'employees';
        return view('admin.employees',compact('active'));
    }
    public function menu_items()
    {
        $active = 'menu';
        return view('admin.menu-items',compact('active'));
    }
    public function profile()
    {
        $active = '';
        $user = User::where('id', '=', Auth::user()->id)->first();
        return view('admin.profile', compact('user', 'active'));
    }
    public function update_admin(Request $req)
    {
        $req->validate([
            'name' => 'required',
        ]);
        $update = User::where('id', '=', $req->id)->update([
            'first_name' => $req->name,
        ]);
        if ($update) {
            return redirect(route('logout'))->with('success', 'Profile Updated.');
        } else {
            return redirect()->back()->with('error', 'Try Again');
        }
    }

    public function update_admin_password(Request $req)
    {
        $req->validate([
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ]);
        $update = User::where('id', '=', $req->id)->update([
            'password' => Hash::make($req->password)
        ]);
        if ($update) {
            return redirect(route('logout'))->with('success', 'Password Changed.');
        } else {
            return redirect()->back()->with('error', 'Try Again');
        }
    }
}
