      
<div class="form-group {{ $errors->has('name')?'has-error':'' }}">
    <label for="name">{{ trans('form.field.name') }}</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="{{ trans('form.field.name') }}" value="{{ old('name')?:$user->user_name }}">
    @if ($errors->has('name'))
    <div class="text text-danger">{{ $errors->first('name') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('username')?'has-error':'' }}">
    <label for="username">{{ trans('form.field.username') }}</label>
    <input type="text" name="username" class="form-control" id="username" placeholder="{{ trans('form.field.username') }}" value="{{ old('username')?:$user->user_login }}">
    @if ($errors->has('username'))
    <div class="text text-danger">{{ $errors->first('username') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
    <label for="username">{{ trans('form.field.phone') }}</label>
    <input type="text" name="phone" class="form-control" id="phone" placeholder="{{ trans('form.field.phone') }}" value="{{ old('phone')?:$user->user_phone }}">
    @if ($errors->has('phone'))
    <div class="text text-danger">{{ $errors->first('phone') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('email')?'has-error':'' }}">
    <label for="email">{{ trans('form.field.email') }}</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="{{ trans('form.field.email') }}" value="{{ old('email')?:$user->user_email }}">
    @if ($errors->has('email'))
    <div class="text text-danger">{{ $errors->first('email') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('address')?'has-error':'' }}">
    <label for="address">{{ trans('form.field.address') }}</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="{{ trans('form.field.address') }}" value="{{ old('address')?:$user->user_address }}">
    @if ($errors->has('address'))
    <div class="text text-danger">{{ $errors->first('address') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('postal_code')?'has-error':'' }}">
    <label for="zip">{{ trans('form.field.zip') }}</label>
    <input type="text" name="postal_code" class="form-control" id="zip" placeholder="{{ trans('form.field.zip') }}" value="{{ old('zip')?:$user->user_zip }}">
    @if ($errors->has('postal_code'))
    <div class="text text-danger">{{ $errors->first('postal_code') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('city')?'has-error':'' }}">
    <label for="city">{{ trans('form.field.city') }}</label>
    <input type="text" name="city" class="form-control" id="city" placeholder="{{ trans('form.field.city') }}" value="{{ old('city')?:$user->user_city }}">
    @if ($errors->has('city'))
    <div class="text text-danger">{{ $errors->first('city') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('state')?'has-error':'' }}">
    <label for="state">{{ trans('form.field.state') }}</label>
    <input type="text" name="state" class="form-control" id="state" placeholder="{{ trans('form.field.state') }}" value="{{ old('state')?:$user->user_state }}">
    @if ($errors->has('state'))
    <div class="text text-danger">{{ $errors->first('state') }}</div>
    @endif
</div>
<div class="form-group {{ $errors->has('country')?'has-error':'' }}">
    <label for="country">{{ trans('form.field.country') }}</label>
    <input type="text" name="country" class="form-control" id="country" placeholder="{{ trans('form.field.country') }}" value="{{ old('country')?:$user->user_country }}">
    @if ($errors->has('country'))
    <div class="text text-danger">{{ $errors->first('country') }}</div>
    @endif
</div>
<button type="submit" class="btn btn-primary">{{ trans('form.update') }}</button>
