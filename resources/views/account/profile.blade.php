@extends('layouts.admin')

@section('content')
<div class="row"> 
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                @foreach(config('navigation.account') as $tabKey => $ptab)
                <li class="{{ request()->get('tab') == $ptab['id']?'active':'' }} {{ (!request()->get('tab') && $tabKey == 0)?'active':'' }}"><a href="#{{$ptab['id']}}" data-toggle="tab" aria-expanded="false">{{$ptab['title']}}</a></li>
                @endforeach
            </ul>
            <div class="tab-content">
                @foreach(config('navigation.account') as $tabKey => $ptab)
                <div class="tab-pane {{ request()->get('tab') == $ptab['id']?'active':'' }} {{ (!request()->get('tab') && $tabKey == 0)?'active':'' }}" id="{{$ptab['id']}}">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 information-row">
                            
                            <form method="POST" action="{{ route('user.profile') }}?tab={{$ptab['id']}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_mode" value="{{ $ptab['id'] }}" autocomplete="off" />
                                @include('account.'.$ptab['id'])
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
</div>
@endsection
@section('stylesheet')
<style type="text/css">
    .information-row span:empty:before{content:'--'}
    .information-row span{width:50%;}
</style>
@endsection