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
                    <table id="employee_task" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>                          
                            <th>@lang('Product Of')</th>
                            <th>@lang('Project')</th>
                            <th>@lang('Task')</th>
                            <th>@lang('Employee')</th>
                            <th>@lang('Start Time')</th>
                            <th>@lang('End Time')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Transferred To')</th>
                            <th>@lang('Comments')</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Product Of')</th>
                            <th>@lang('Project')</th>
                            <th>@lang('Task')</th>
                            <th>@lang('Employee')</th>
                            <th>@lang('Start Time')</th>
                            <th>@lang('End Time')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Transferred To')</th>
                            <th>@lang('Comments')</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                            @include('back.employee_task.table', compact('employee_task'))
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

        var employee_task = (function () {

            var onReady = function () {
                $('#pannel').on('click', 'td a.btn-danger', function (event) {
                    var that = $(this)
                    event.preventDefault()
                    swal({
                        title: '@lang('Really destroy employee task ?')',
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: '@lang('Yes')',
                        cancelButtonText: '@lang('No')'
                    }).then(function () {
                        back.spin()
                        $.ajax({
                            url: that.attr('href'),
                            type: 'DELETE'
                        })
                            .done(function () {
                                that.parents('tr').remove()
                                back.unSpin()
                            })
                            .fail(function () {
                                back.fail('@lang('Looks like there is a server issue...')')
                            }
                        )
                    })
                })
            }

            return {
                onReady: onReady
            }

        })()

        $(document).ready(employee_task.onReady)

        $(document).ready( function () {
        $('#employee_task').DataTable();
        } );

    </script>
@endsection