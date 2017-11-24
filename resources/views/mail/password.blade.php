<p>{{ $user->user_name }}</p>
<p>You requested to password reset. </p>
<p>Click reset button below to reset your account password.</p>
<p><a href="{{ route('reset_password',[$user->remember_token]) }}">Reset password</a></p>