
        <ul class="list-group">
            <li class="list-group-item">
                <strong>{{ trans('form.field.name') }} : </strong>
                <span class="pull-right">{{ $user->user_name }}</span>
            </li>
            <li class="list-group-item">
                <strong>{{ trans('form.field.username') }} : </strong>
                <span class="pull-right">{{ $user->user_login }}</span>
            </li>
            <li class="list-group-item">
                <strong>{{ trans('form.field.phone') }} : </strong>
                <span class="pull-right">{{ $user->user_phone }}</span>
            </li>
            <li class="list-group-item">
                <strong>{{ trans('form.field.address') }} : </strong>
                <span class="pull-right">{{ $user->user_address }}</span>
            </li>
            <li class="list-group-item">
                <strong>{{ trans('form.field.zip') }} : </strong>
                <span class="pull-right">{{ $user->user_zip }}</span>
            </li>
            <li class="list-group-item">
                <strong>{{ trans('form.field.city') }} : </strong>
                <span class="pull-right">{{ $user->user_city }}</span>
            </li>
            <li class="list-group-item">
                <strong>{{ trans('form.field.state') }} : </strong>
                <span class="pull-right">{{ $user->user_state }}</span>
            </li>
            <li class="list-group-item">
                <strong>{{ trans('form.field.country') }} : </strong>
                <span class="pull-right">{{ $user->user_country }}</span>
            </li>
        </ul>
   