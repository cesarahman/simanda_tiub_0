@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('message')
<body>
	<style>
		body {
		  background-image: url('{{asset("assets/errors/403.svg")}}');
		  background-size: 100%;
		  text-align: center;
		  background-repeat: no-repeat;
		}
	</style>
</body>
@endsection
