@if(Session::has('response'))
<p class="alert alert-{{ Session::get('response')['alert'] }} flash-errors">
	@if($ico = Session::get('response')['icon'])
	<i class="fa fa-{{$ico}}"></i>
	@endif
	{{ Session::get('response')['flash'] }}
</p>
@endif