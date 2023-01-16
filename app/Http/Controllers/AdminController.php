<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display the Admin dashboard index view.
     * @return \Illuminate\View\View
     */
    public function index()
    {  
        return view('admin.index');
    }
}
