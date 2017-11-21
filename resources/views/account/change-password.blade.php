
<div class="form-group {{ $errors->has('current_password')?'has-error':'' }}">
    <label for="current_password">{{ trans('form.field.password_current') }}</label>
    <input type="password" name="current_password" class="form-control" id="current_password" placeholder="{{ trans('form.field.password_current') }}" value="{{ old('current_password') }}">
    @if ($errors->has('current_password'))
    <div class="text text-danger">{{ $errors->first('current_password') }}</div>
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
<button class="btn btn-primary">{{ trans('form.chnage_password') }}</button>
