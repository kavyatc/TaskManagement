@extends('back.layout')

@section('main')

          <!-- employee form -->
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
             
           @yield('form-open')
           
            {{ csrf_field() }}

               <div class="box-body">                
                
                {!!Form::hidden('emp_id', 'secret', array('id' => 'emp_id')) !!}




                <div class="col-md-12">      
                 {!! Form::label('emp_code', 'Code') !!}        
                 {!! Form::text('emp_code', isset($employee)?$employee->emp_code:$employee_code, [
                 'class'                        => 'form-control',
                 'required'                     => 'required',
                 'readonly'                     => 'true'
                 ]) !!} 
                </div>


                <div class="col-md-10">      
                 {!! Form::label('empname', 'Name') !!}
                 {!! Form::text('empname', isset($employee)?$employee->empname:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' ,
                 'autofocus'                    => 'autofocus'
                 ]) !!}  
                </div>

                <div class="col-md-2">   
                 {!! Form::label('birthdate', 'DOB') !!}
                 {!! Form::date('birthdate', isset($employee)?$employee->birthdate:today(), [
                 'class'                        => 'form-control date-picker',
                 'required'                     => 'required' 
                 ]) !!} 
                </div>
                <div class="clearfix"></div>   
                                  
                <div class="col-md-6"> 
                 {!! Form::label('city', 'City') !!}
                 {!! Form::select('city_id', $city_lists,isset($employee)?$employee->city_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}    
                 </div> 
                 <div class="col-md-6">   
                 {!! Form::label('position', 'Position') !!}
                 {!! Form::select('position_id', $position_lists,isset($employee)?$employee->position_id:null, [
                 'class'                        => 'form-control',
                 'required'                     => 'required' 
                 ]) !!}                 
                </div>   
               
                

                <div class="col-md-12"> 
                 {!! Form::label('address', 'Address') !!}
                 {!! Form::textarea('address', isset($employee)?$employee->address:null, [
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