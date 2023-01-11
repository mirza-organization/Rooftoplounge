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
        return view('employee.index');
    }
}
