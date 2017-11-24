@extends('layouts.admin')

@section('content')
<div class="row">
    <form method="POST" action="">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans($ticket?'ticketform.edit_title':'ticketform.add_title') }}</h3>
                </div>

                <div class="box-body">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group {{ $errors->has('status')?'has-error':'' }}">
                           
                            <label for="status">{{ trans('ticketform.status') }}</label>
                            <select class="form-control select2" data-placeholder="Select Status" name="status">
                                <option valu=''></option>
                                @foreach(['Active','Closed'] as $sKey => $status)
                                <option value="{{ $sKey }}" {{ ($sKey == ($ticket && $ticket->status))?'selected':'' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('status'))
                            <div class="text text-danger">{{ $errors->first('status') }}</div>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('date')?'has-error':'' }}">
                            <label for="date">{{ trans('ticketform.date') }}</label>
                            <input type="text" class="form-control datepicker" name="date" value="{{ $ticket?date('m/d/Y',strtotime($ticket->call_date)):'' }}" id="date" placeholder="">
                            @if ($errors->has('date'))
                            <div class="text text-danger">{{ $errors->first('date') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('firstname')?'has-error':'' }}">
                            <label for="name">{{ trans('ticketform.firstname') }}</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $ticket?$ticket->call_first_name:'' }}" placeholder="">
                            @if ($errors->has('firstname'))
                            <div class="text text-danger">{{ $errors->first('firstname') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('lastname')?'has-error':'' }}">
                            <label for="lastname">{{ trans('ticketform.lastname') }}</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $ticket?$ticket->call_last_name:'' }}" placeholder="">
                            @if ($errors->has('lastname'))
                            <div class="text text-danger">{{ $errors->first('lastname') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                            <label for="email">{{ trans('ticketform.email') }}</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $ticket?$ticket->call_email:'' }}" placeholder="">
                            @if ($errors->has('email'))
                            <div class="text text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
                            <label for="phone">{{ trans('ticketform.phone') }}</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $ticket?$ticket->call_phone:'' }}" placeholder="">
                            @if ($errors->has('phone'))
                            <div class="text text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('department')?'has-error':'' }}">
                            <label for="department">{{ trans('ticketform.department') }}</label>
                            <select class="form-control select2" data-placeholder="Select Department" name="department">
                                <option value=""></option>
                                @if($departments->count())
                                @foreach($departments as $department)
                                <option value="{{ $department->type_id }}" {{ ($department->type_id == ($ticket && $ticket->call_department))?'selected':'' }}>{{ $department->type_name }}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('department'))
                            <div class="text text-danger">{{ $errors->first('department') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('request')?'has-error':'' }}">
                            <label for="request">{{ trans('ticketform.request') }}</label>
                            <select class="form-control select2" data-placeholder="Select Request" name="request">
                                <option value=""></option>
                                @if($requests->count())
                                @foreach($requests as $request)
                                <option value="{{ $request->type_id }}" {{ ($request->type_id == ($ticket && $ticket->call_request))?'selected':'' }}>{{ $request->type_name }}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('request'))
                            <div class="text text-danger">{{ $errors->first('request') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('device')?'has-error':'' }}">
                            <label for="device">{{ trans('ticketform.device') }}</label>
                            <select class="form-control select2" data-placeholder="Select Device" name="device">
                                <option value=""></option>
                                @if($devices->count())
                                @foreach($devices as $device)
                                <option  value="{{ $device->type_id }}" {{ ($device->type_id == ($ticket && $ticket->call_device))?'selected':'' }}>{{ $device->type_name }}</option>
                                @endforeach
                                @endif
                            </select>
                            @if ($errors->has('device'))
                            <div class="text text-danger">{{ $errors->first('device') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                            <label for="description">{{ trans('ticketform.description') }}</label>
                            <textarea rows="3" class="form-control" id="description" name="description" placeholder="">{{ $ticket?$ticket->call_details:'' }}</textarea>
                            @if ($errors->has('description'))
                            <div class="text text-danger">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('solution')?'has-error':'' }}">
                            <label for="solution">{{ trans('ticketform.solution') }}</label>
                            <textarea rows="3" class="form-control" id="solution" name="solution" placeholder="">{{ $ticket?$ticket->call_solution:'' }}</textarea>
                            @if ($errors->has('solution'))
                            <div class="text text-danger">{{ $errors->first('solution') }}</div>
                            @endif
                        </div>
                        @if(Auth::user()->user_role == 'admin')
                        <div class="form-group {{ $errors->has('staff')?'has-error':'' }}">
                            <label for="staff">{{ trans('ticketform.staff') }}</label>
                            <select class="form-control select2" data-placeholder="Select Staff" name="staff">
                                <option value=""></option>
                                @foreach($users as $user)
                                <option value="{{$user->user_id}}" {{ ($user->user_id == ($ticket && $ticket->call_staff))?'selected':'' }}>{{ $user->user_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('staff'))
                            <div class="text text-danger">{{ $errors->first('staff') }}</div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-md-6 col-md-offset-3">
                        <button class="btn btn-primary" type="submit">{{ trans($ticket?'ticketform.update_button':'ticketform.add_button') }}</button>
                        <a class="btn btn-default pull-right" href="{{ route('ticket.list') }}">{{ trans('form.field.cancel_button') }}</a>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </form>
    <!-- /.box -->
</div>

@endsection

@section('stylesheet-top')
<link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">

<style type="text/css">
    span.select2.select2-container.select2-container--default {
        width: 100% !important;
    }
</style>
@endsection
@section('javascript')
<script src="{{ asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
$('select').select2();
$('.datepicker').datepicker({autoclose: true});
</script>
@endsection