@foreach($tasks as $task)
    <tr>      
        <td>{{ $task->id }}</td>
        <td>{{ $task->taskdate->format('d-m-Y') }}</td>
        <td>{{ $task->products->product }}</td>
        <td>{{ $task->projects->project }}</td>        
        <td>{{ $task->task }}</td>
        <td>
          @if($task->priority_id == '1')
                High
            @elseif($task->priority_id == '2')
                Normal
            @else
                Low
            @endif
        </td>
        
        <td>{{ $task->status->status }}</td>
     
                
        <td>{{ ($task->employees)?$task->employees->empname:'' }}</td>
        <td>{{ $task->comments }}</td>

        <td><a class="btn btn-warning btn-xs btn-block" href="{{ route('task.edit', [$task->id]) }}" role="button" title="@lang('Edit')"><span class="fa fa-edit"></span></a></td>

        <td><a class="btn btn-danger btn-xs btn-block" href="{{ route('task.destroy', [$task->id]) }}" role="button" title="@lang('Destroy')"><span class="fa fa-remove"></span></a></td>
        
    </tr>
@endforeach


