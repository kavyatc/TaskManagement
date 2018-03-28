<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\ {
    Http\Controllers\Controller,
    Http\Requests\TaskRequest,
    Models\Task,
    Models\EmployeeTask,
    Models\Product,
    Models\Project,
    Models\Status,
    Models\Employee
};

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
       
        $tasks = Task::oldest('task')->get();          
        return view('back.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                
        $product_lists = Product::pluck('product','id');
        $project_lists = Project::pluck('project','id');


        $status_lists = Status::where('statusfor','TASKS')->pluck('status','id');
        $employee_lists = Employee::pluck('empname','id');

        return view('back.task.create',compact('product_lists','project_lists','status_lists','employee_lists'));
    }

    /**
     * Store a newly created tasks in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {        
        
        /*Tasks*/
        if (is_null($request['assigned'])) 
        $request['assigned'] = 'N';         
        else
        $request['assigned'] = 'Y';    
        if ($request->assigned=='N'){$request['emp_id'] = null;}  
        $tasks = Task::create($request->all());
        /* Tasks*/

        /*Employee Task*/
        if ($tasks->assigned=='Y'){
           EmployeeTask::create(['task_id'=>$tasks->id,'emp_id'=>$tasks->emp_id,
                            'startdatetime'=>$tasks->taskdate,'status'=>$tasks->status_id]);        
        }
        /*Employee Task*/

        return redirect(route('task.index'))->with('tasks-ok', __('The task has been successfully created'));
    }

    /**
     * Show the form for editing the specified tasks.
     *
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {          
        $tasks = $task;
        $product_lists = Product::pluck('product','id');
        $project_lists = Project::pluck('project','id');
        $status_lists = Status::where('statusfor','TASKS')->pluck('status','id');
        $employee_lists = Employee::pluck('empname','id');
      
        return view('back.task.edit', compact('tasks','product_lists','project_lists','status_lists','employee_lists'));
    }

    /**
     * Update the specified tasks in storage.
     *
     * @param  \App\Http\Requests\TaskRequest  $request
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, Task $task)
    {   
        $tasks = $task;
        /*Project Task*/
        if (is_null($request['assigned'])) 
        {$request['assigned'] = 'N';} 
        else
        {$request['assigned'] = 'Y';}  

        if ($request->assigned=='N'){$request['emp_id'] = null;}     

      /*  dd($tasks);*/

        $tasks->update($request->all());   
        /*Project Task*/

        /*Employee Task*/
        $employeeTask = new EmployeeTask();      
        $employeeTask = EmployeeTask::where('task_id', $tasks->id)->first();  

       

        if (is_null($employeeTask)) 
        {
           if ($tasks->assigned=='Y'){
           EmployeeTask::create(['task_id'=>$tasks->id,'emp_id'=>$tasks->emp_id,
                            'startdatetime'=>$tasks->taskdate,'status_id'=>$tasks->status_id]);}   
        }
        else
        {
          if ($tasks->assigned=='Y')
                { 
                $employeeTask->task_id = $tasks->id;
                $employeeTask->emp_id = $tasks->emp_id;
                $employeeTask->startdatetime = $tasks->taskdate;
                $employeeTask->status_id = $tasks->status_id;

              
                
                $employeeTask->update(); 
                }        
                   
        }
             
         /*Employee Task*/


        return redirect(route('task.index'))->with('tasks-ok', __('The task has been successfully updated'));
    }


    /**
     * Remove the specified tasks from storage.
     *
     * @param  \App\Models\Task  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {   
        $tasks = $task;

        $employeeTask =EmployeeTask::where('task_id', $tasks->id)->first();            
            
       

        $tasks->delete();

        
        if (!is_null($employeeTask)) 
        {
            $employeeTask_id = $employeeTask->id;
            $employeeTask->where('id',$employeeTask_id)->delete();
        }
                 
        return response ()->json ();
    }

   
}

