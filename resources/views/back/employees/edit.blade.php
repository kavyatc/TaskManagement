@extends('back.employees.template')

@section('form-open')  
        {!!Form::open(['method' => 'POST','route' => ['employees.update',$employee->id], 'class' => 'form-update' ]) !!} 
        {{ method_field('PUT') }}
@endsection
