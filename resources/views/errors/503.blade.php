@extends('errors::minimal')

@if ($exception instanceof \Illuminate\Foundation\Http\Exceptions\MaintenanceModeException)
	@section('title', __('Website Under Maintenance'))
@else
	@section('title', __('Service Unavailable'))
@endif
@section('message')
<body>
	<style>
		body {
		@if ($exception instanceof \Illuminate\Foundation\Http\Exceptions\MaintenanceModeException)
		  background-image: url('{{asset("assets/errors/maintenance.svg")}}');
		  background-size: 100%;
		  text-align: center;
		  background-repeat: no-repeat;
		@else
		  background-image: url('{{asset("assets/errors/503.svg")}}');
		  background-size: 100%;
		  text-align: center;
		  background-repeat: no-repeat;
		@endif
		}
	</style>
</body>
@endsection