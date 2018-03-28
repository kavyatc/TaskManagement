@extends('back.task.template')

@section('form-open')
  {!!Form::open(['method' => 'POST','route' => ['task.store'], 'class' => 'form-create' ]) !!} 
   
@endsection