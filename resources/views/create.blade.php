@extends('layouts.master')

@section('content')
	<form class="form-horizontal" action="{{ route('employee.store') }}" method="post">

		@include('partials.errors')
		
		<div class="form-group">
			<label for="name" class="col-sm-3 control-label">სახელი, გვარი</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
			</div>
		</div>

		<div class="form-group">
			<label for="sex" class="col-sm-3 control-label">სქესი</label>
			<div class="col-sm-9">
				<select name="sex" id="sex" class="form-control">
					<option value="female" {{ old('sex') == 'female' ? 'selected' : null }}>მდედრობითი</option>
					<option value="male"   {{ old('sex') == 'male'   ? 'selected' : null }}>მამრობითი</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="position" class="col-sm-3 control-label">თანამდებობა</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">
			</div>
		</div>

		<div class="form-group">
			<label for="salary" class="col-sm-3 control-label">ხელფასი</label>
			<div class="col-sm-9">
				<input type="number" min="100" max="100000" step="50" class="form-control" id="salary" name="salary" value="{{ old('salary') }}">
			</div>
		</div>

		<hr>

		<div class="form-group">
			<label class="col-sm-3 control-label">მისამართ(ებ)ი</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" placeholder="ქალაქი">
			</div>
			<div class="col-sm-4">
				<input type="text" class="form-control" placeholder="ქუჩა">
			</div>
			<div class="col-sm-2">
				<input type="text" class="form-control" placeholder="ნომერი">
			</div>
		</div>

		<hr>

		<div class="form-group">
			<label class="col-sm-3 control-label">კურსები</label>
			<div class="col-sm-9">
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" class="form-control" placeholder="დასახელება">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<input type="text" class="form-control" placeholder="დაწყება">
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" placeholder="დამთავრება">
					</div>
					<div class="col-sm-6">
						<input type="text" class="form-control" placeholder="კომენტარი">
					</div>
				</div>
			</div>
		</div>

		<hr>

		<div class="form-group">
			<div class="col-sm-offset-6 col-sm-3">
				<a href="{{ route('employee.index') }}" class="btn btn-block btn-default">გაუქმება</a>
			</div>
			<div class="col-sm-3">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-block btn-success">შენახვა</button>
			</div>
		</div>

	</form>
@stop

@section('postscripts')
	<script src="{{ url('js/dist/index.min.js') }}"></script>
@stop
