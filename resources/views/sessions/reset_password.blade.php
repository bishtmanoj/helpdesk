@extends('layouts.base')
@section('pageTitle',trans('form.reset_password'))
@section('content')
<div class="row">

    <div class="col-md-6 col-md-offset-3">
        @include('errors.flash')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('form.reset_password') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group {{ $errors->has('password')?'has-error':'' }}">
                        <label for="password">{{ trans('form.field.password') }}</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="{{ trans('form.field.password') }}" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                        <div class="text text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation')?'has-error':'' }}">
                        <label for="password_confirmation">{{ trans('form.field.password_confirmation') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="{{ trans('form.field.password_confirmation') }}" value="{{ old('password_confirmation') }}">
                        @if ($errors->has('password_confirmation'))
                        <div class="text text-danger">{{ $errors->first('password_confirmation') }}</div>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('form.reset_password') }}</button> 
                    <div class="pull-right">
                        <a class="btn btn-default" href="{{ route('sessions.login') }}">{{ trans('form.login') }}</a>
                    </div>
                </div>
            </form>
        </div>
       
    </div>
</div>
@endsection