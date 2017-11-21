@extends('layouts.admin')

@section('content')
<div class="row">
    <form method="POST" action="">
        {{ csrf_field() }}
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ trans($content?'settings.device.edit':'settings.device.add') }}</h3>
                </div>

                <div class="box-body">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                            <label for="title">{{ trans('settings.device.name') }}</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="" value="{{ $content?$content->type_name:old('title') }}">
                            @if ($errors->has('title'))
                            <div class="text text-danger">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="col-md-6 col-md-offset-3">
                        <button class="btn btn-primary" type="submit">{{ trans($content?'settings.device.update':'settings.device.add') }}</button>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </form>
    <!-- /.box -->
</div>
@endsection

