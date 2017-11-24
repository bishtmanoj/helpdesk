@extends('layouts.base')
@section('pageTitle',trans('form.login'))
@section('content')
<div class="row">

    <div class="col-md-6 col-md-offset-3">
        @include('errors.flash')
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('form.request_password') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                        <label for="email">{{ trans('form.field.email') }}</label>
                        <input type="email" name="email" class="form-control" id="username" placeholder="{{ trans('form.field.email') }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <div class="text text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">{{ trans('form.request_password') }}</button> 

                </div>
            </form>
        </div>
        <div class="help-block text-center">
            {{ trans('form.account_exists') }} <a href="{{ route('sessions.login') }}">{{ trans('form.login') }}</a>
        </div>
    </div>
</div>
@endsection