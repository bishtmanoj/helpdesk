@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('ticketform.list_title') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($tickets->count())
                <table class="table table-bordered table-hovered">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('ticketform.name') }}</th>
                            <th>{{ trans('ticketform.phone') }}</th>
                            <th>{{ trans('ticketform.email') }}</th>
                            <th>{{ trans('ticketform.date') }}</th>
                            <th>{{ trans('ticketform.status') }}</th>
                            @if(Auth::user()->user_role == 'admin')
                            <th>{{ trans('ticketform.action_title') }}</th>
                            @endif
                        </tr>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td class="text-center">
                                <a href="javascript:;" onclick="toggleDetail({{$ticket->call_id}}, 'open')" id="open-{{$ticket->call_id}}" ><i class="fa fa-plus"></i></a>
                                <a href="javascript:;" onclick="toggleDetail({{$ticket->call_id}}, 'open')" id="close-{{$ticket->call_id}}" class="hide"><i class="fa fa-minus"></i></a>
                            </td>
                            <td>{{ $ticket->call_first_name.' '.$ticket->call_last_name }}</td>
                            <td>{{ $ticket->call_phone }}</td>
                            <td>{{ $ticket->call_email }}</td>
                            <td>{{ date('d M, Y h:i A',strtotime($ticket->created_at)) }}</td>
                            <td>{{ $ticket->call_status?trans('ticketform.status_close'):trans('ticketform.status_open') }}</td>
                            @if(Auth::user()->user_role == 'admin')
                            <td>
                                <a class="btn btn-default" href="{{ route('ticket.edit',[$ticket->call_id]) }}"><i class="fa fa-pencil"></i></a>
                            </td>
                            @endif
                        </tr>
                        <tr id="expand-{{$ticket->call_id}}" class="hide">
                            <td colspan="6">
                                <table class="table table-hovered sub-table">
                                    <tr>
                                        <th>{{ trans('ticketform.department') }} : </th>
                                        <td>{{ $ticket->department->type_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('ticketform.request') }} :</th>
                                        <td>{{ $ticket->request->type_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('ticketform.device') }} :</th>
                                        <td>{{ $ticket->device->type_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('ticketform.description') }} :</th>
                                        <td>{{ $ticket->call_details }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('ticketform.solution') }} :</th>
                                        <td>{{ $ticket->call_solution }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('ticketform.user') }} :</th>
                                        <td>{{ $ticket->user->user_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('ticketform.staff') }} :</th>
                                        <td>{{ $ticket->staff->user_name }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else 
                <div class="alert alert-danger">{{ trans('ticketform.no_tickets') }}</div>
                @endif
            </div>
            <!-- /.box-body -->
            @if($tickets->count())
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $tickets->render() }}
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('stylesheet')
<style type="text/css">
    .sub-table th{width:120px;}
</style>
@endsection
@section('javascript')
<script type="text/javascript">
    function toggleDetail(id, action){
    $('#open-' + id).toggleClass('hide');
    $('#close-' + id).toggleClass('hide');
    $('#expand-' + id).toggleClass('hide');
    }
</script>
@endsection