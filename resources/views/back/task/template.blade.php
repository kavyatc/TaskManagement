@extends('back.layout')

@section('main')

          <!-- project task form -->
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             
           @yield('form-open')
           
            {{ csrf_field() }}

               <div class="box-body">               
                 
                 {!!Form::hidden('task', 'secret', array('id' => 'task')) !!}               
                
                <div class="col-md-3"> 
                 {!! Form::label('taskdate', 'Date') !!}               
               
                 {!! Form::date('taskdate', isset($tasks)?$tasks->taskdate:today(), [
                 'class'                        => 'form-control date-picker',
                 'required'                     => 'required'  
                 ]) !!} 
                </div>
                <div class="clearfix"></div>                
               
                <div class="col-md-12"> 
                 {!! Form::label('product', 'Product') !!}
                 {!! Form::select('product_id', $product_lists,isset($tasks)?$tasks->product_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' ,
                 'autofocus'                    => 'autofocus'
                 ]) !!}       
                </div>

                <div class="col-md-12">  
                 {!! Form::label('project', 'Project') !!}
                 {!! Form::select('project_id', $project_lists,isset($tasks)?$tasks->project_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}                   
                </div>

                <div class="col-md-12"> 
                 {!! Form::label('task', 'Task') !!}
                 {!! Form::textarea('task', isset($tasks)?$tasks->task:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'size'                         => '30x5'
                 ]) !!}  
                </div>

                <div class="col-md-6"> 
                 {!! Form::label('status', 'Status') !!}
                 {!! Form::select('status_id', $status_lists,isset($tasks)?$tasks->status_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}                      
                </div>

                <div class="col-md-6"> 
                 {!! Form::label('priority', 'Priority') !!}                
                 {!! Form::select('priority_id',[
                 '1'                        => 'High',
                 '2'                        => 'Normal',
                 '3'                        => 'Low']
                 ,isset($tasks)?$tasks->priority_id:1, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}
                </div>

                <div class="col-md-12"> 
                 {!! Form::checkbox('assigned', isset($tasks)?$tasks->assigned:'N', (isset($tasks) && $tasks->assigned == 'Y')?True:False,[
                     'class'                        => 'field assigned',
                 ]) !!}                 
                 {!! Form::label('assigned', 'Assigned to') !!}                 
                </div>
               

                <div class="col-md-12">                
                 <div class="employee_data">
                 {!! Form::select('emp_id', $employee_lists ,isset($tasks)?$tasks->emp_id:null, [
                 'class'                        => 'form-control',
                 'id'                           => 'emp_id'
                 ]) !!}  
                 </div>         
                </div>

                <div class="col-md-12">
                 {!! Form::label('comments', 'Comments') !!}
                 {!! Form::textarea('comments', isset($tasks)?$tasks->comments:null, [ 
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
    <script type="text/javascript" src="/js/task.js"></script>   
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