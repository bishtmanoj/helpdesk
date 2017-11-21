@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('settings.department.title') }}</h3>
                <a class="btn btn-primary pull-right" href="{{ route('department.add') }}"><i class="fa fa-plus"></i> {{ trans('settings.department.add') }}</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($departments->count())
                <table class="table table-bordered table-hovered">
                    <tbody>
                        <tr>
                            <th>{{ trans('settings.department.name') }}</th>
                            <th>{{ trans('form.action.calls') }}</th>
                            <th width="120px">Action</th>
                        </tr>
                        @foreach($departments as $row)
                        <tr>
                            <td>{{ $row->type_name }}</td>
                            <td>{{ $row->calls('department')->count() }}</td>
                            <td>
                                <form id="form-{{ $row->type_id}}" method="POST" action="{{ route('department.delete',[$row->type_id]) }}">
                                    {{ csrf_field() }}
                                </form>
                                <a title="{{ trans('form.action.edit') }}" href="{{ route('department.edit',[$row->type_id]) }}" class="btn btn-sm btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a title="{{ trans('form.action.delete') }}" onclick="$('#form-{{ $row->type_id }}').submit();" class="btn btn-sm btn-danger">
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

