@extends('layouts.base')
@section('pageTitle',trans('form.login'))
@section('content')
<div class="row">

    <div class="col-md-6 col-md-offset-3">
        @include('errors.flash')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('form.login') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group {{ $errors->has('username')?'has-error':'' }}">
                        <label for="username">{{ trans('form.field.username_or_email') }}</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="{{ trans('form.field.username_or_email') }}" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                        <div class="text text-danger">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password')?'has-error':'' }}">
                        <label for="password">{{ trans('form.field.password') }}</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="{{ trans('form.field.password') }}" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                        <div class="text text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="checkbox pull-left">
                        <label>
                            <input type="checkbox" name="remember" value="1" {{ old('remember')?'checked':'' }}> {{ trans('form.field.remember') }}
                        </label>

                    </div>
                    <div class="pull-right">
                        <a class="btn btn-infow">{{ trans('form.forgot_password') }}</a>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('form.login') }}</button>

                </div>
            </form>
        </div>
        <div class="help-block text-center">
            {{ trans('form.account_not_exists') }} <a href="{{ route('sessions.signup') }}">{{ trans('form.signup') }}</a>
        </div>
    </div>
</div>
@endsection