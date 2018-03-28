<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,    
    Models\Task,
    Models\Employees,
    Models\EmployeeTask,
    Models\Status
};

class ReportController extends Controller
{
    /**
     * Display a listing of the employees.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $report = Task::oldest('id')->get();             
       
        return view('back.report.index', compact('report'));
    }

}
