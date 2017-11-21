@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('settings.device.title') }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($departments->count())
                <table class="table table-bordered table-hovered">
                    <tbody>
                        <tr>
                            <th>{{ trans('settings.device.name') }}</th>
                            <th>{{ trans('form.action.calls') }}</th>
                            <th width="120px">Action</th>
                        </tr>
                        @foreach($departments as $row)
                        <tr>
                            <td>{{ $row->type_name }}</td>
                            <td>{{ $row->calls('department')->count() }}</td>
                            <td>
                                <a title="{{ trans('form.action.edit') }}" class="btn btn-sm btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a title="{{ trans('form.action.delete') }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
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
            @if($departments->count())
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $departments->render() }}
                </ul>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

