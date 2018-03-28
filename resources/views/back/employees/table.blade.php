@foreach($employees as $employee)
    <tr>      
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->emp_code }}</td>
        <td>{{ $employee->empname }}</td>
        <td>{{ $employee->birthdate->format('d-m-Y') }}</td>
        <td>{{ $employee->address }}</td>
        <td>{{ $employee->cities->city }}</td>
        <td>{{ $employee->positions->position }}</td>
        <td><a class="btn btn-warning btn-xs btn-block" href="{{ route('employees.edit', [$employee->id]) }}" role="button" title="@lang('Edit')"><span class="fa fa-edit"></span></a></td>
        <td><a class="btn btn-danger btn-xs btn-block" href="{{ route('employees.destroy', [$employee->id]) }}" role="button" title="@lang('Destroy')"><span class="fa fa-remove"></span></a></td>
    </tr>
@endforeach


