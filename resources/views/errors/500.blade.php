@extends('errors::minimal')

@section('title', __('Server Error'))
@section('message')
<body>
	<style>
		body {
		  background-image: url('{{asset("assets/errors/500.svg")}}');
		  background-size: 100%;
		  text-align: center;
		  background-repeat: no-repeat;
		}
	</style>
</body>
@endsection