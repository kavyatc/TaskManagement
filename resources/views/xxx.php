
       <td>{{ ($report->employee_tasks->startdatetime)?$report->employee_tasks->startdatetime->format('d-m-Y'):'' }}</td> 
      <td>{{ ($report->employee_tasks->enddatetime)?$report->employee_tasks->enddatetime->format('d-m-Y'):'' }}</td> 
      
           
     <td>{{ ($report->employee_tasks->transfEmployees)?$report->employee_tasks->transfEmployees->empname:'' }}</td>
       <td>{{ $report->comments }}</td>



 <!--    <td>{{ ($report->employee_tasks->startdatetime)?$report->employee_tasks->startdatetime->format('d-m-Y'):'' }}</td>  
       <td>{{ ($report->employee_tasks->enddatetime)?$report->employee_tasks->enddatetime->format('d-m-Y'):'' }}</td>
 -->
      <!--  <td>{{ $report->employee_tasks->status->status }}</td>    
 -->
         
       <!-- <th>@lang('Date')</th>
                            <th>@lang('Product Of')</th>
                            <th>@lang('Project')</th>
                            <th>@lang('Task')</th>
                            <th>@lang('Priority')</th>
                            <th>@lang('Assigned To')</th>
                            <th>@lang('Start Time')</th>
                            <th>@lang('End Time')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Transferred To')</th>
                            <th>@lang('Comments')</th>           -->



<!--    <div class="col-md-4">   
                    {!!Form::open(['method' => 'POST','route' => ['employees.index'], 'class' => 'form-create' ]) !!} 
                    {!! Form::label('emp_code', 'Code') !!}     
                    {!! Form::text('emp_code', null, [
                     'class'                        => 'form-control'
                     ]) !!} 
                    </div>   
                     <div class="col-md-4">   
                     {!! Form::label('position', 'Position') !!}
                     {!! Form::select('position_id', $position_lists,null, [
                     'class'                        => 'form-control'
                     ]) !!}                 
                    </div>  -->
 if($request->has('titlesearch')){
    $items = Item::search($request->titlesearch)
    ->paginate(6);
    }else{
    $items = Item::paginate(6);
    }
    return view('item-search',compact('items'));
    }
if($request->has('emp_codeSearch')){

         $employees = Employee::search($request->emp_codeSearch)->oldest('empname')->get();

        }else{

       
        }
 
User::where('name', 'LIKE', '%'.$search.'%')->get();
  public function index(Request $request)
    {
        $input = $request->all();
        if($request->get('search')){
            $items = Item::where("title", "LIKE", "%{$request->get('search')}%")
                ->paginate(5);      
        }else{
  $items = Item::paginate(5);
        }
        return response($items);
    }


<form class="form-inline" action="/action_page.php">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>



 <div class="form-group">
            {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
            </div>
        </div>
 

<div style="margin:0px auto;width:600px">
    <div class="row">
        {!! Form::open(['url' => route('order-post-2'), 'data-parsley-validate', 'id' => 'payment-form']) !!}
        <div class="col-md-6">
            <div class="form-group" id="first-name-group">
                {!! Form::label('firstName', 'First Name:') !!}
          {!! Form::text('first_name', null, [
              'class'                         => 'form-control',
              'required'                      => 'required',
              'placeholder'                   => 'First Name',
              'data-parsley-required-message' => 'First name is required',
              'data-parsley-trigger'          => 'change focusout',
              'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
              'data-parsley-minlength'        => '2',
              'data-parsley-maxlength'        => '32',
              'data-parsley-class-handler'    => '#first-name-group'
              ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="last-name-group">
                {!! Form::label('lastName', 'Last Name:') !!}
          {!! Form::text('last_name', null, [
              'class'                         => 'form-control',
              'required'                      => 'required',
              'placeholder'                   => 'Last Name',
              'data-parsley-required-message' => 'Last name is required',
              'data-parsley-trigger'          => 'change focusout',
              'data-parsley-pattern'          => '/^[a-zA-Z]*$/',
              'data-parsley-minlength'        => '2',
              'data-parsley-maxlength'        => '32',
              'data-parsley-class-handler'    => '#last-name-group'
              ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="email-group">
                {!! Form::label('email', 'Email address:') !!}
          {!! Form::email('email', null, [
              'class' => 'form-control',
              'placeholder'                   => 'email@example.com',
              'required'                      => 'required',
              'data-parsley-required-message' => 'Email name is required',
              'data-parsley-trigger'          => 'change focusout',
              'data-parsley-class-handler'    => '#email-group'
              ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" id="pan-group">
                {!! Form::label('pan', 'Pan Number:') !!}
          {!! Form::text('pan', null, [
              'class' => 'form-control',
              'placeholder'                   => '123',
              'required'                      => 'required',
              'data-parsley-required-message' => 'Number name is required',
              'data-parsley-trigger'          => 'change focusout',
              'data-parsley-class-handler'    => '#email-group',
              'data-parsley-minlength'        => '2',
              'data-parsley-maxlength'        => '32'
              ]) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!! Form::submit('Add New User', ['class' => 'btn btn-primary btn-order', 'id' => 'submitBtn', 'style' => 'margin-bottom: 10px;']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>


<div class="well form-group  ">
                                <div class="col-sm-2 col-md-2">{!! Form::label('vent2', 'Ventilation:') !!}</div>
                                <div class="col-sm-4 col-md-4">{!! Form::select('product_id[7]',$ventilation, null, ['class'=>'form-control product_id','placeholder'=>'None']) !!}</div>
                                <div class="col-sm-1  col-md-1">{!! Form::label('vent_req2', 'Quantity:') !!}</div>
                                <div class="col-sm-2 col-md-2">{!! Form::text('quantity[7]',null,['class'=>'form-control  quantity']) !!}</div>
                                <div class="col-sm-1  col-md-1">{!! Form::label('cost', 'Cost:') !!}</div>
                                <div class="col-sm-2 col-md-2">{!! Form::text('cost[]',null ,['class'=>'form-control cost', 'readonly'=>'readonly' ]) !!}</div>
                            </div>



$(document).on('change','.status',function(){          
        showHide();       
 });


$(function(){
    showHide();
})


function showHide(){
    if($('.status').attr("value") == '5'){
          alert("")
            $(".TransEmployee_data").show();
        } else {
            alert("hi")
            $(".TransEmployee_data").hide();
        }
}



 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("products")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Project task deleted successfully."]);
    }


 // dd($employee_task[0]->projectTasks->products->product);   


 /**
     * Show the form for creating a new employee_task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {                
        $product_lists = Product::pluck('product','id');
        $project_lists = Project::pluck('project','id');
        $projectTask_lists = ProjectTask::pluck('task','id');
        $status_lists = Status::where('statusfor','TASKS')->pluck('status','id');
        $employee_lists = Employee::pluck('empname','id');
        $trasEmployee_lists = Employee::pluck('empname','id');

        return view('back.project_task.create',compact('product_lists','project_lists','projectTask_lists','status_lists','employee_lists','trasEmployee_lists'));
    }





Code::where('to_be_used_by_user_id', '!=' , 2)->orWhereNull('to_be_used_by_user_id')->get()

Code::where('to_be_used_by_user_id', '<>' , 2)->get()
Code::whereNotIn('to_be_used_by_user_id', [2])->get()
Code::where('to_be_used_by_user_id', 'NOT IN', 2)->get()

 public function destroyClient($id) 
{
    $cliente = Client::find($id); 
    $cliente->delete(); //delete the client

    // get list of all projects of client
    $projects = DB::table('client_project')->where('client_id',$id)->get();

    DB::table('client_project')->where('client_id',$id)->delete(); 

    // delete all projects of client
    foreach($projects as $project)
    {
        DB::table('projects')->where('id',$project->id)->delete();

        DB::table('project_translations')->where('project_id',$project->id)->delete(); 
    }    

    return redirect()->route('admin.clients');
} 



   ArticleComment::where('article_id',$id)->delete();


$project_task->delete();
        return response ()->json ();

          

/*
        $project_task->update($request->all());  

        $project_taskid = $request->id;*/
        /*
        EmployeeTask::find($request->id);*/

       /* dd($request->all());*/

      /*  
*/



 $employeeTask = new EmployeeTask();
        $employeeTask->task_id = $projectTask->id;
        $employeeTask->emp_id = $projectTask->emp_id;   
        $employeeTask->startdatetime = $projectTask->projectdate;
        $employeeTask->status = $projectTask->status_id;  
        $employeeTask->save();      

        
           
     /*   $employeeTask->task_id = $projectTask->id;
        $employeeTask->emp_id = $projectTask->emp_id;   
        $employeeTask->startdatetime = $projectTask->projectdate;
        $employeeTask->status = $projectTask->status_id;  
        $employeeTask->save();  */ 

        // $employeeTask = new EmployeeTask();
        // $employeeTask = array('task_id'=> $projectTask('id'),'emp_id => $projectTask('emp_id'));



 @if (in_array($item->id, $selected_type)) checked="checked" @endif



  {!! Form::text('emp_code', isset($employees)?$employees->emp_code:$employee_code, [
                 'class'                        => 'form-control right',
                 'required'                     => 'required',
                 'readonly'                     => 'true'
                 ]) !!}  

 {!! Form::label('city', 'City') !!}
                 {!! Form::select('city_id', $city_lists,null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}        


    {!! Form::select('categories[]', 
    $categories, 
    null, 
    ['class' => 'form-control', 
    'multiple' => 'multiple']) !!}


    {!! Form::select('categories[]', $cost_centers, 
        $post->categories->lists('id')->toArray(), 
        ['class' => 'form-control', 
        'multiple' => 'multiple']) !!}


        {{ Form::select('locID', array('default' => 'Please Select') + $locations->lists('locNameEN', 'locID'), 'default', array('class' => 'form-control', 'id' => 'locID', Input::old('locID'))) }}


         <option {{$employee->city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>


         {!!Form::open(['method' => 'POST','route' => ['employees.store'], 'class' => 'form-create' ]) !!} 


 <!--   <form method="post" action="{{ route('employees.store') }}"> -->


     <form method="post" action="{{ route('employees.update', [$employee->id]) }}">
        {{ method_field('PUT') }}


          public function destroy(Request $request)
    {
        // return $request->all();
        Product::find($request->id)->delete();
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }


     $employee->delete ();

        return response ()->json ();




                 {!! Form::select('priority_id', $priority_lists ,isset($project_task)?$project_task->priority_id:1, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}   



                 <div class="well form-group  ">
                                <div class="col-sm-2 col-md-2">{!! Form::label('vent2', 'Ventilation:') !!}</div>
                                <div class="col-sm-4 col-md-4">{!! Form::select('product_id[7]',$ventilation, null, ['class'=>'form-control product_id','placeholder'=>'None']) !!}</div>
                                <div class="col-sm-1  col-md-1">{!! Form::label('vent_req2', 'Quantity:') !!}</div>
                                <div class="col-sm-2 col-md-2">{!! Form::text('quantity[7]',null,['class'=>'form-control  quantity']) !!}</div>
                                <div class="col-sm-1  col-md-1">{!! Form::label('cost', 'Cost:') !!}</div>
                                <div class="col-sm-2 col-md-2">{!! Form::text('cost[]',null ,['class'=>'form-control cost', 'readonly'=>'readonly' ]) !!}</div>
                            </div>



                             {!! Form::checkbox('assigned_to', isset($project_task)?$project_task->assigned:Null, [
                 'class'                        => 'form-control',
                 'checked'                      => 'false'
                 ]) !!}   
                 {!! Form::label('assigned', 'Assigned to') !!}



                    If (isset($request['assigned']) == '1' ? 'Y' : 'N');


        $request = (isset($_POST['assigned']) == '1' ? 'Y' : 'N');
        dd($$request->all());



         if(isset($request->all()->['assigned']) { 
            $request->all()->('assigned) = 'Y' 
        };
        
         If (isset($request->all()->[])){
         };


public function store(ProjectTaskRequest $request)
    { 
         
       

        if(!$request->has('assigned')){$request->merge(['assigned' => 'Y']);}



        dd($request->all());  


        ProjectTask::create($request->all());      

                
        return redirect(route('project_task.index'))->with('project_task-ok', __('The project task has been successfully created'));
    }

     If ($request['assigned']) == null {$request['assigned'] = 'N';}


     $(document).on('click','.ShowHideEmp',function(){
if ($('#assigned').is(':checked')) {
    $("#emp_id").hide();
} else {
    $("#emp_id").show();
}         
 });


$(function () {
        $("#assigned").click(function () {
            if ($(this).is(":checked")) {
                $("#employee_data").show();
            } else {
                $("#employee_data").hide();
            }
        });
});

if (is_null($request['assigned'])) {$request['emp_id'] = '';} 


    {
                 {!! Form::checkbox('assigned', 'N', False,[
                     'class'                        => 'field assigned',
                     ]) !!}                 
                     {!! Form::label('assigned', 'Assigned to') !!}
    




    @extends('back.layout')

@section('main')

          <!-- project task form -->
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             
           @yield('form-open')
           
            {{ csrf_field() }}

               <div class="box-body">               
                 
                 {!!Form::hidden('project_task_id', 'secret', array('id' => 'project_task_id')) !!}
                
                
                 {!! Form::label('projectdate', 'Date') !!}
                

                
                 {!! Form::date('projectdate', isset($project_task)?$project_task->projectdate:today(), [
                 'class'                        => 'form-control date-picker',
                 'required'                     => 'required'  
                 ]) !!} 
                

                
               
                 {!! Form::label('product', 'Product') !!}
                 {!! Form::select('product_id', $product_lists,isset($project_task)?$project_task->product_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' ,
                 'autofocus'                    => 'autofocus'
                 ]) !!}       
               

                 
                 {!! Form::label('project', 'Project') !!}
                 {!! Form::select('project_id', $project_lists,isset($project_task)?$project_task->project_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}                   
                 

                 {!! Form::label('task', 'Task') !!}
                 {!! Form::textarea('task', isset($project_task)?$project_task->task:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'size'                         => '30x5'
                 ]) !!}  
                 
                
                 {!! Form::label('priority', 'Priority') !!}                
                 {!! Form::select('priority_id',[
                 '1'                        => 'High',
                 '2'                        => 'Normal',
                 '3'                        => 'Low']
                 ,isset($project_task)?$project_task->priority_id:1, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}



                 {!! Form::label('status', 'Status') !!}
                 {!! Form::select('status_id', $status_lists,isset($project_task)?$project_task->status_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}      

                
                 isset($project_task)                

                 @if($project_task->assigned == 'Y')
                 {
                 {!! Form::checkbox('assigned', 'N', False,[
                     'class'                        => 'field assigned',
                     ]) !!}                 
                     {!! Form::label('assigned', 'Assigned to') !!}
                 }
                 @else{
                   
                 }
                 @endif

                 @endisset



                

                 <div class="employee_data">
                  {!! Form::select('emp_id', $employee_lists ,isset($project_task)?$project_task->emp_id:null, [
                 'class'                        => 'form-control',
                 'id'                           => 'emp_id'
                 ]) !!}  
                 </div>         

                


                 {!! Form::label('comments', 'Comments') !!}
                 {!! Form::textarea('comments', isset($project_task)?$project_task->comments:null, [ 
                 'class'                        => 'form-control'
                 ]) !!}   
                              
                 
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
    <script type="text/javascript" src="/js/project_task.js"></script>   
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


isset($project_task)                

                 @if($project_task->assigned == 'Y')
                 {
                 {!! Form::checkbox('assigned', 'N', False,[
                     'class'                        => 'field assigned',
                     ]) !!}                 
                     {!! Form::label('assigned', 'Assigned to') !!}
                 }
                 @else{
                   
                 }
                 @endif

                 @endisset

  {!! Form::checkbox('assigned', 'N', False,[
                     'class'                        => 'field assigned',
                     ]) !!}                 
                     {!! Form::label('assigned', 'Assigned to') !!}
                 }
                

$(document).on('click','.assigned',function(){
    
           if($(this).is(':checked')){
          
            $(".employee_data").show();
        } else {
            
            $(".employee_data").hide();
        }         
 });
