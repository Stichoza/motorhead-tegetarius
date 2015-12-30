@extends('layouts.master')

@section('content')
	<form action="{{ route('employee.store') }}" method="post">
		
		<input type="text" name="name" value="{{ old('name') }}">
		
		<select name="sex">
			<option value="female" {{ old('sex') == 'female' ? 'selected' : null }}>მდედრობითი</option>
			<option value="male"   {{ old('sex') == 'male'   ? 'selected' : null }}>მამრობითი</option>
		</select>

		<input type="text" name="position" value="{{ old('position') }}">

	</form>
@stop

@section('postscripts')
	<script src="{{ url('js/dist/index.min.js') }}"></script>
@stop
