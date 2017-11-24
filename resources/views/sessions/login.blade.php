@extends('layouts.base')
@section('pageTitle',trans('form.login'))
@section('content')
<div class="row">
    <div class="col-md-12">
        @include('errors.flash')
    </div>
    <div class="col-md-6">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title text-uppercase">{{ trans('user.existing_user.title') }}</h3>
                <p>{{ trans('user.existing_user.text') }}</p>
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
                        <a class="btn btn-infow" href="{{ route('password.request') }}">{{ trans('form.forgot_password') }}</a>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('form.login') }}</button>

                </div>
            </form>
        </div>
        <?php /*
        <div class="help-block text-center">
            {{ trans('form.account_not_exists') }} <a href="{{ route('sessions.signup') }}">{{ trans('form.signup') }}</a>
        </div>
         * 
         */ ?>
    </div>
    <div class="col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title text-uppercase">{{ trans('user.not_existing_user.title') }}</h3>
                <p>{{ trans('user.not_existing_user.text') }}</p>
            </div>
            <div class="box-body">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('form.signup') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection