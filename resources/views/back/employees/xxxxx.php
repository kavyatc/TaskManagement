
@extends('layouts.master')

@section('title', 'Product Management System')

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

    <div class="pull-left">
    <h2>Products</h2>
    </div>

    <div class="pull-right">            

    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg create" data-toggle="modal" data-target="#myModal">Create New Product</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">

            <div class="modal-dialog">
                        
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Product</h4>
                    </div>

                        <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{ route('products.store') }}">
                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            {!! Form::hidden('product_id', 'secret', array('id' => 'product_id')) !!}
                            {!! Form::label('name', 'Product Name', ['class' => 'col-lg-3 control-label']) !!}
                                <div class="col-lg-8">
                                    {!! Form::text('name', isset($product)?$product->product_name:null, ['class' => 'form-control','required' => 'required' ,'autofocus'=>'autofocus']) !!}  
                                    @if ($errors->has('name'))
                                       <span class="help-block">
                                       <strong>{{ $errors->first('name') }}</strong>
                                       </span>                     
                                    @endif       
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                {!! Form::label('details', 'Details', ['class' => 'col-lg-3 control-label']) !!}
                                   <div class="col-lg-8">
                                        {!! Form::textarea('details', $value = null, ['class' => 'form-control', 'rows' => 3]) !!}         
                                   </div>        
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                
                        </form>
                </div>            
            </div>
        </div>

    </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
@endif


<!-- For table design -->
<table class="table table-bordered" style="background-color: white;">
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Details</th>
        <th width="280px">Action</th>
    </tr>
  
   @foreach ($products as $key=>$product)
    <tr class="grid-alignment">
        <td class="product_id">{{ $product->id }}</td>
        <td class="prd_name">{{ $product->product_name}}</td>
        <td class="details">{{ $product->details}}</td>
        <td>            
            <a class="btn btn-primary edit"  data-toggle="modal" data-target="#myModal" >Edit</a> 

            {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $product->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger delete']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach

</table>
<!-- For table design -->

<!-- Ajax - assign product field values while create and edit -->
<script type="text/javascript" src="/js/products.js"></script>   
<!-- Ajax - assign product field values while create and edit -->

@endsection


    


   




