@foreach($employee_task as $employee_task)
    <tr>      
       <td>{{ $employee_task->id }}</td>
       <td>{{ $employee_task->tasks->products->product }}</td>
       <td>{{ $employee_task->tasks->projects->project }}</td>   
       <td>{{ $employee_task->tasks->task }}</td>     
       <td>{{ $employee_task->employees->empname }}</td>      
       <td>{{ $employee_task->startdatetime->format('d-m-Y') }}</td>
       <td>{{ ($employee_task->enddatetime)?$employee_task->enddatetime->format('d-m-Y'):'' }}</td>

       <td>{{ ($employee_task->status)?$employee_task->status->status:'' }}</td>  

         
       <td>{{ ($employee_task->transfEmployees)?$employee_task->transfEmployees->empname:'' }}</td>
       <td>{{ $employee_task->comments }}</td>

       <td><a class="btn btn-warning btn-xs btn-block" href="{{ route('employee_task.edit', [$employee_task->id]) }}" role="button" title="@lang('Edit')"><span class="fa fa-edit"></span></a></td>

       <td><a class="btn btn-danger btn-xs btn-block" href="{{ route('employee_task.destroy', [$employee_task->id]) }}" role="button" title="@lang('Destroy')"><span class="fa fa-remove"></span></a></td>
        
    </tr>
@endforeach
