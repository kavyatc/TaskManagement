
<?php $slnumber = 1; ?>

@foreach($report as $report)
    <tr>    
	   <td>{{ $slnumber++ }}</td>
       <td>{{ $report->taskdate->format('d-m-Y')  }}</td>
       <td>{{ $report->products->product }}</td>
       <td>{{ $report->projects->project }}</td>
   	   <td>{{ $report->task }}</td>
   	   <td>
          @if($report->priority_id == '1')
                High
            @elseif($report->priority_id == '2')
                Normal
            @else
                Low
            @endif
      </td>

      <td>{{ ($report->employees)?$report->employees->empname:'' }}</td>     

      <td>{{ (@$report->employee_tasks->startdatetime)?$report->employee_tasks->startdatetime->format('d-m-Y'):'' }}</td> 

       <td>{{ (@$report->employee_tasks->enddatetime)?$report->employee_tasks->enddatetime->format('d-m-Y'):'' }}</td> 
     

	    <td>{{ @$report->employee_tasks->status->status }}</td> 
      <td>{{ @$report->employee_tasks->transfEmployees->empname }}</td> 
       <td>{{ @$report->employee_tasks->comments }}</td> 
  	  
    
    </tr>
@endforeach
