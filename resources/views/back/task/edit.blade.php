


@extends('back.task.template')

@section('form-open')  
        {!!Form::open(['method' => 'POST','route' => ['task.update',$tasks->id], 'class' => 'form-update' ]) !!} 
        {{ method_field('PUT') }}
@endsection