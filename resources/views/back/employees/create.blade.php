@extends('back.employees.template')

@section('form-open')
  {!!Form::open(['method' => 'POST','route' => ['employees.store'], 'class' => 'form-create' ]) !!} 
  
 
@endsection