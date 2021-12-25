@extends('errors::minimal')

@section('title', __('Not Found'))
@section('message')
<body>
	<style>
		body {
		  background-image: url('{{asset("assets/errors/404.svg")}}');
		  background-size: 100%;
		  text-align: center;
		  background-repeat: no-repeat;
		}
	</style>
</body>
@endsection
