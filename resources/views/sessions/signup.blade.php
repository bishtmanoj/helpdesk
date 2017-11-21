@extends('layouts.base')

@section('content')
<div class="row">
       
        <div class="col-md-6 col-md-offset-3">
          @include('errors.flash')
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ trans('form.signup') }}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                  <label for="name">{{ trans('form.field.name') }}</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="{{ trans('form.field.name') }}" value="{{ old('name') }}">
                   @if ($errors->has('name'))
            <div class="text text-danger">{{ $errors->first('name') }}</div>
            @endif
                </div>
                <div class="form-group {{ $errors->has('username')?'has-error':'' }}">
                  <label for="username">{{ trans('form.field.username') }}</label>
                  <input type="text" name="username" class="form-control" id="username" placeholder="{{ trans('form.field.username') }}" value="{{ old('username') }}">
                   @if ($errors->has('username'))
            <div class="text text-danger">{{ $errors->first('username') }}</div>
            @endif
                </div>
                 <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                  <label for="email">{{ trans('form.field.email') }}</label>
                  <input type="email" name="email" class="form-control" id="email" placeholder="{{ trans('form.field.email') }}" value="{{ old('email') }}">
                   @if ($errors->has('email'))
            <div class="text text-danger">{{ $errors->first('email') }}</div>
            @endif
                </div>
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
                <button type="submit" class="btn btn-primary">{{ trans('form.signup') }}</button>
                
              </div>
            </form>
          </div>
          <div class="help-block text-center">
			   {{ trans('form.account_exists') }} <a href="{{ route('sessions.login') }}">{{ trans('form.login') }}</a>
			</div>
         </div>
      </div>
@endsection