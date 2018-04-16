<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\EmployeeRequest,
    Models\Employee,
    Models\City,
    Models\Position
};

class EmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $employees = Employee::oldest('empname')->get();
        
                 
        
        return view('back.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $employee_code=1000;
        $employee_info = Employee::orderby('id','desc')->first();
        if (!$employee_info){
            $employee_code = $employee_code;
        }else{
            $employee_code = $employee_code+$employee_info->id;
        }
        $employee_code= 'EMP'.$employee_code;
        $city_lists = City::pluck('city','id');
        $position_lists = Position::pluck('position','id');
        
        return view('back.employees.create',compact('city_lists','position_lists','employee_code'));
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    { 

        Employee::create($request->all());      
        
        return redirect(route('employees.index'))->with('employee-ok', __('The employee has been successfully created'));
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {             
        $city_lists = City::pluck('city','id');
        $position_lists = Position::pluck('position','id');

      
        return view('back.employees.edit', compact('employee','city_lists','position_lists'));
    }

    /**
     * Update the specified employee in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());   

        return redirect(route('employees.index'))->with('employee-ok', __('The employee has been successfully updated'));
    }

    /**
     * Remove the specified employee from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response ()->json ();
    }
}
