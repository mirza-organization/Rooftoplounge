<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\AuthenticatedSessionController as AuthAuthenticatedSessionController;

class EmployeeController extends Controller
{
    /**
     * Display the Employee dashboard index view.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $active = 'dashboard';
        return view('employee.index', compact('active'));
    }
    public function profile()
    {
        $active = '';
        $user = User::where('id', '=', Auth::user()->id)->first();
        return view('employee.profile', compact('user', 'active'));
    }
    public function update_emp(Request $req)
    {
        $req->validate([
            'name' => 'required',
        ]);
        $update = User::where('id', '=', $req->id)->update([
            'name' => $req->name,
        ]);
        if ($update) {
            $logout = new AuthAuthenticatedSessionController();
            return $logout->destroy($req);
        } else {
            return redirect()->back()->with('error', 'Try Again');
        }
    }

    public function update_emp_password(Request $req)
    {
        $req->validate([
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ]);
        $update = User::where('id', '=', $req->id)->update([
            'password' => Hash::make($req->password)
        ]);
        if ($update) {
            $logout = new AuthAuthenticatedSessionController();
            return $logout->destroy($req);
        } else {
            return redirect()->back()->with('error', 'Try Again');
        }
    }
}
