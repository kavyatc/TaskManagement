<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\EmployeeTaskRequest,  
    Models\EmployeeTask,
    Models\Status,
    Models\Task,      
    Models\Employee
};

class EmployeeTaskController extends Controller
{
    /**
     * Display a listing of the employee_task.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       
        $employee_task = EmployeeTask::oldest('task_id')->get(); 

             
       
        return view('back.employee_task.index', compact('employee_task'));
    }

   
     /**
     * Show the form for editing the specified employee_task.
     *
     * @param  \App\Models\EmployeeTask  $employee_task
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeTask $employee_task)
    {   
         
        $projectTask_lists = Task::pluck('task','id');    
        $status_lists = Status::where('statusfor','TASKS')->pluck('status','id');       
        $trasEmployee_lists = Employee::where('id','<>',$employee_task->emp_id)->pluck('empname','id');



        return view('back.employee_task.edit', compact('employee_task','projectTask_lists','status_lists','trasEmployee_lists'));
    }

    /**
     * Update the specified employee_task in storage.
     *
     * @param  \App\Http\Requests\EmployeeTaskRequest  $request
     * @param  \App\Models\ProjectTask  $employee_task
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeTaskRequest $request, EmployeeTask $employee_task)
    {   
        /*Employee Task*/       

        if ($request->status_id != '5'){$request['trasnferred_id'] = null;}    



        $employee_task->update($request->all());   
        /*Employee Task*/

        /*Task*/
        $task = new Task();      
        $task = Task::where('id', $employee_task->task_id)->first();  

       
        if (!is_null($task)) 
            {    
                                  
               $task->update(['status_id'=>$employee_task->status_id]); 
            }          
       
        return redirect(route('employee_task.index'))->with('employee_task-ok', __('The employee task has been successfully updated'));
    }


    /**
     * Remove the specified employee_task from storage.
     *
     * @param  \App\Models\EmployeeTask  $employee_task
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeTask $employee_task)
    {         
        $employee_task->delete();      
      
        return response ()->json ();
    }
   
}

