@extends('back.layout')

@section('main')

          <!-- employee task form -->
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             
           @yield('form-open')
           
            {{ csrf_field() }}

               <div class="box-body">               
                 
                 {!!Form::hidden('employee_task_id', 'secret', array('id' => 'employee_task_id')) !!}    

                <div class="col-md-12"> 
                 {!! Form::label('employee', 'Employee' ) !!}
                 {!! Form::text('employee', $employee_task->employees->empname, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'readonly'                     => 'true'
                 ]) !!}                 
                </div>

                <div class="col-md-12">
                 {!! Form::label('product', 'Product' ) !!}
                 {!! Form::text('product', $employee_task->tasks->products->product, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'readonly'                     => 'true'
                 ]) !!}                
                </div>

                <div class="col-md-12">
                 {!! Form::label('project', 'Project') !!}
                 {!! Form::text('project', $employee_task->tasks->projects->project, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'readonly'                     => 'true'
                 ]) !!}    
                </div>

                <div class="col-md-12">
                 {!! Form::label('task', 'Task') !!}
                 {!! Form::textarea('task', $employee_task->tasks->task, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'readonly'                     => 'true',
                 'size'                         => '30x5'
                 ]) !!}                    
                </div>

                <div class="col-md-6">
                 {!! Form::label('starttime', 'Start time') !!}   
                 {!! Form::date('starttime', isset($employee_task)?$employee_task->startdatetime:today(), [
                 'class'                        => 'form-control date-picker',
                 'required'                     => 'required'  
                 ]) !!} 
                </div>

                <div class="col-md-6">
                 {!! Form::label('endtime', 'End time') !!}   
                 {!! Form::date('endtime', (isset($employee_task) && $employee_task->enddatetime)?$employee_task->enddatetime:today(), [
                 'class'                        => 'form-control date-picker',
                 'required'                     => 'required'
                 ]) !!} 
                </div>

                <div class="col-md-12">
                 {!! Form::label('status', 'Status') !!}                
                </div>

                 <div class="col-md-6">                
                 {!! Form::select('status_id', $status_lists,isset($employee_task)?$employee_task->status_id:null, [
                 'class'                        => 'form-control status',
                 'required'                     => 'required'
                 ]) !!}    
                </div>

                <div class="col-md-6">
                <div class="TransEmployee_data">
                 {!! Form::select('emp_id', $trasEmployee_lists ,isset($employee_task)?$employee_task->trasnferred_id:null, [
                 'class'                       => 'form-control',
                 'id'                           => 'emp_id'
                 ]) !!}  
                </div>         
                </div>

                <div class="col-md-12">
                 {!! Form::label('comments', 'Comments') !!}
                 {!! Form::textarea('comments', isset($employee_task)?$employee_task->comments:null, [ 
                 'class'                        => 'form-control'
                 ]) !!}   
                </div>             
                 
               </div>

               <div class="box-footer">
                {!! Form::submit('Submit', [ 
                'class'=> 'btn btn-primary'
                 ]) !!}                  
               </div>          

            {!! Form::close() !!}


          </div>
        </div>
        </div>



@endsection

@section('js')

    <!-- Ajax  -->
    <script type="text/javascript" src="/js/employee_task.js"></script>   
    <!-- Ajax  -->

    <script src="{{ asset('adminlte/plugins/voca/voca.min.js') }}"></script>
    <script>

        $('#slug').keyup(function () {
            $(this).val(v.slugify($(this).val()))
        })

        $('#title').keyup(function () {
            $('#slug').val(v.slugify($(this).val()))
        })

    </script>


@endsection