@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
                <div class="col-md-6 col-md-offset-3">
                    <form method="POST" action="">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                            <label for="name">{{ trans('form.field.name') }}</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="{{ trans('form.field.name') }}" value="{{ $user?$user->user_name:old('name') }}">
                            @if ($errors->has('name'))
                            <div class="text text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('username')?'has-error':'' }}">
                            <label for="username">{{ trans('form.field.username') }}</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="{{ trans('form.field.username') }}" value="{{ $user?$user->user_login:old('username') }}">
                            @if ($errors->has('username'))
                            <div class="text text-danger">{{ $errors->first('username') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
                            <label for="username">{{ trans('form.field.phone') }}</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="{{ trans('form.field.phone') }}" value="{{ $user?$user->user_phone:old('phone') }}">
                            @if ($errors->has('phone'))
                            <div class="text text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                            <label for="email">{{ trans('form.field.email') }}</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="{{ trans('form.field.email') }}" value="{{ $user?$user->user_email:old('email') }}">
                            @if ($errors->has('email'))
                            <div class="text text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('address')?'has-error':'' }}">
                            <label for="address">{{ trans('form.field.address') }}</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="{{ trans('form.field.address') }}" value="{{ $user?$user->user_address:old('address') }}">
                            @if ($errors->has('address'))
                            <div class="text text-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('postal_code')?'has-error':'' }}">
                            <label for="zip">{{ trans('form.field.zip') }}</label>
                            <input type="text" name="postal_code" class="form-control" id="zip" placeholder="{{ trans('form.field.zip') }}" value="{{ $user?$user->user_zip:old('zip') }}">
                            @if ($errors->has('postal_code'))
                            <div class="text text-danger">{{ $errors->first('postal_code') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('city')?'has-error':'' }}">
                            <label for="city">{{ trans('form.field.city') }}</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="{{ trans('form.field.city') }}" value="{{ $user?$user->user_city:old('city') }}">
                            @if ($errors->has('city'))
                            <div class="text text-danger">{{ $errors->first('city') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('state')?'has-error':'' }}">
                            <label for="state">{{ trans('form.field.state') }}</label>
                            <input type="text" name="state" class="form-control" id="state" placeholder="{{ trans('form.field.state') }}" value="{{ $user?$user->user_state:old('state') }}">
                            @if ($errors->has('state'))
                            <div class="text text-danger">{{ $errors->first('state') }}</div>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('country')?'has-error':'' }}">
                            <label for="country">{{ trans('form.field.country') }}</label>
                            <input type="text" name="country" class="form-control" id="country" placeholder="{{ trans('form.field.country') }}" value="{{ $user?$user->user_country:old('country') }}">
                            @if ($errors->has('country'))
                            <div class="text text-danger">{{ $errors->first('country') }}</div>
                            @endif
                        </div>
                        @if($user)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="change_password" value="1"> {{ trans('form.field.password_change_checkbox') }}
                            </label>
                        </div>
                        @endif
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
                        <button type="submit" class="btn btn-primary">{{ trans('form.submit') }}</button>
                        <a class="btn btn-default pull-right" href="{{ route('users.list') }}">{{ trans('form.field.cancel_button') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection