@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('user.navbar.main') }}</h3>
                <a class="btn btn-primary pull-right" href="{{ route('users.add') }}"><i class="fa fa-plus"></i> {{ trans('user.navbar.add') }}</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if($users->count())
                <table class="table table-bordered table-hovered">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('form.field.name') }}</th>
                            <th>{{ trans('form.field.username') }}</th>
                            <th>{{ trans('form.field.email') }}</th>
                            <th width="120px">{{ trans('ticketform.action_title') }}</th>
                        </tr>
                        @foreach($users as $row)
                        <tr>
                            <td class="text-center">
                                <a href="javascript:;" onclick="toggleDetail({{$row->user_id}}, 'open')" id="open-{{$row->user_id}}" ><i class="fa fa-plus"></i></a>
                                <a href="javascript:;" onclick="toggleDetail({{$row->user_id}}, 'open')" id="close-{{$row->user_id}}" class="hide"><i class="fa fa-minus"></i></a>
                            </td>
                            <td>{{ $row->user_name }}</td>
                            <td>{{ $row->user_login }}</td>
                            <td>{{ $row->user_email }}</td>
                            <td>
                                <form id="form-{{ $row->user_id}}" method="POST" action="{{ route('users.delete',[$row->user_id]) }}">
                                    {{ csrf_field() }}
                                </form>
                                <a title="{{ trans('form.action.edit') }}" href="{{ route('users.edit',[$row->user_id]) }}" class="btn btn-sm btn-default">
                                    <i class="fa fa-pencil"></i>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a title="{{ trans('form.action.delete') }}" onclick="$('#form-{{ $row->user_id }}').submit();" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr id="expand-{{$row->user_id}}" class="hide">
                            <td colspan="5">
                                <table class="table table-hovered sub-table">
                                    <tr>
                                        <th>{{ trans('form.field.address') }} : </th>
                                        <td>{{ $row->user_address }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('form.field.zip') }} : </th>
                                        <td>{{ $row->user_zip }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('form.field.city') }} : </th>
                                        <td>{{ $row->user_city }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('form.field.state') }} : </th>
                                        <td>{{ $row->user_state }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ trans('form.field.country') }} : </th>
                                        <td>{{ $row->user_country }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else 
                <div class="alert alert-danger">{{ trans('user.no_result') }}</div>
                @endif
            </div>
            <!-- /.box-body -->
            @if($users->count())
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    {{ $users->render() }}
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
