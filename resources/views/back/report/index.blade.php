@extends('back.layout')

@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
@endsection

@section('button')
    <a class="btn btn-primary" href="javascript:window.print()">@lang('Export')</a>
@endsection

@section('main')

    <div class="row">
        <div class="col-md-12">
            @if (session('employee_task-ok'))
                @component('back.components.alert')
                    @slot('type')
                        success
                    @endslot
                    {!! session('employee_task-ok') !!}
                @endcomponent
            @endif
            <div class="box">
               
                <div class="box-body table-responsive">
                    <table id="report" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>                          
                            <th>@lang('Date')</th>
                            <th>@lang('Product Of')</th>
                            <th>@lang('Project')</th>
                            <th>@lang('Task')</th>
                            <th>@lang('Priority')</th>
                            <th>@lang('Assigned To')</th>
                            <th>@lang('Start Time')</th>
                            <th>@lang('End Time')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Transferred To')</th>
                            <th>@lang('Comments')</th>                            
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Date')</th>
                            <th>@lang('Product Of')</th>
                            <th>@lang('Project')</th>
                            <th>@lang('Task')</th>
                            <th>@lang('Priority')</th>
                            <th>@lang('Assigned To')</th>
                            <th>@lang('Start Time')</th>
                            <th>@lang('End Time')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Transferred To')</th>
                            <th>@lang('Comments')</th>                                 
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                            @include('back.report.table', compact('report'))
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('js')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

    <script src="{{ asset('adminlte/js/back.js') }}"></script>
    <script>       

        $(document).ready( function () {
        $('#report').DataTable();
        } );

    </script>

   
@endsection