<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display the Employee dashboard index view.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $active = 'employees';
        return view('admin.employees', compact('active'));
    }
}
