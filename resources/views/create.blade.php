@extends('layouts.master')

@section('content')

	<div class="holly-dollies">
		
		<div class="form-group" data-clone-into="funny-farm">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-3">
				<input type="text" name="address[{n}][city]" class="form-control" placeholder="ქალაქი">
			</div>
			<div class="col-sm-4">
				<input type="text" name="address[{n}][street]" class="form-control" placeholder="ქუჩა">
			</div>
			<div class="col-sm-2">
				<input type="text" name="address[{n}][number]" class="form-control" placeholder="ნომერი">
			</div>
			<div class="col-sm-1">
				<button type="button" class="dolly-clone-killer-trigger btn btn-default btn-block"><i class="fa fa-times"></i></button>
			</div>
		</div>

		<div data-clone-into="sad-farm">
			<label class="col-sm-2 control-label"></label>
			<div class="col-sm-10">
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="course[{n}][title]" class="form-control" placeholder="დასახელება">
					</div>
					<div class="col-sm-2">
						<button type="button" class="dolly-clone-killer-trigger btn btn-default btn-block"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
						<input type="text" name="course[{n}][start]" class="form-control" placeholder="დაწყება (YYYY-MM-DD)">
					</div>
					<div class="col-sm-4">
						<input type="text" name="course[{n}][end]" class="form-control" placeholder="დამთავრება (YYYY-MM-DD)">
					</div>
					<div class="col-sm-4">
						<input type="text" name="course[{n}][comment]" class="form-control" placeholder="კომენტარი">
					</div>
				</div>
			</div>
		</div>

	</div>

	<form class="form-horizontal" method="post">

		@include('partials.errors')
		
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">სახელი, გვარი</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
			</div>
		</div>

		<div class="form-group">
			<label for="sex" class="col-sm-2 control-label">სქესი</label>
			<div class="col-sm-10">
				<select name="sex" id="sex" class="form-control">
					<option value="female" {{ old('sex') == 'female' ? 'selected' : null }}>მდედრობითი</option>
					<option value="male"   {{ old('sex') == 'male'   ? 'selected' : null }}>მამრობითი</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="position" class="col-sm-2 control-label">თანამდებობა</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">
			</div>
		</div>

		<div class="form-group">
			<label for="salary" class="col-sm-2 control-label">ხელფასი</label>
			<div class="col-sm-10">
				<input type="number" min="100" max="100000" step="50" class="form-control" id="salary" name="salary" value="{{ old('salary') }}">
			</div>
		</div>

		<hr>

		<div class="dolly-container" data-farm="funny-farm">
			<?php $j = 1; ?>
			@foreach (array_get($form, 'address', [0]) as $i => $data)
				<div class="form-group">
					<label class="col-sm-2 control-label">
						@if ($j == 1)
							მისამართ(ებ)ი
						@endif
					</label>
					<div class="col-sm-3">
						<input type="text" name="address[{{ $j }}][city]" value="{{ old('address.' . $i . '.city') }}" class="form-control" placeholder="ქალაქი">
					</div>
					<div class="col-sm-4">
						<input type="text" name="address[{{ $j }}][street]" value="{{ old('address.' . $i . '.street') }}" class="form-control" placeholder="ქუჩა">
					</div>
					<div class="col-sm-2">
						<input type="text" name="address[{{ $j++ }}][number]" value="{{ old('address.' . $i . '.number') }}" class="form-control" placeholder="ნომერი">
					</div>
					<div class="col-sm-1">
						<button type="button" class="dolly-clone-killer-trigger btn btn-default btn-block"><i class="fa fa-times"></i></button>
					</div>
				</div>
			@endforeach
		</div>

		<div class="form-group">
			<div class="col-sm-offset-10 col-sm-2">
				<button type="button" class="dolly-clone-trigger btn btn-default btn-block" data-trigger-cloning-in="funny-farm"><i class="fa fa-fw fa-plus"></i></button>
			</div>
		</div>

		<hr>

		<div class="form-group dolly-container" data-farm="sad-farm">
			<?php $j = 1; ?>
			@foreach (array_get($form, 'course', [0]) as $i => $data)
				<div>
					<label class="col-sm-2 control-label">
						@if ($j == 1)
							კურსები
						@endif
					</label>
					<div class="col-sm-10">
						<div class="form-group">
							<div class="col-sm-10">
								<input type="text" name="course[{{ $j }}][title]" value="{{ old('course.' . $i . '.title') }}" class="form-control" placeholder="დასახელება">
							</div>
							<div class="col-sm-2">
								<button type="button" class="dolly-clone-killer-trigger btn btn-default btn-block"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<input type="text" name="course[{{ $j }}][start]" value="{{ old('course.' . $i . '.start') }}" class="form-control" placeholder="დაწყება (YYYY-MM-DD)">
							</div>
							<div class="col-sm-4">
								<input type="text" name="course[{{ $j }}][end]" value="{{ old('course.' . $i . '.end') }}" class="form-control" placeholder="დამთავრება (YYYY-MM-DD)">
							</div>
							<div class="col-sm-4">
								<input type="text" name="course[{{ $j++ }}][comment]" value="{{ old('course.' . $i . '.comment') }}" class="form-control" placeholder="კომენტარი">
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>

		<div class="form-group">
			<div class="col-sm-offset-10 col-sm-2">
				<button type="button" class="dolly-clone-trigger btn btn-default btn-block" data-trigger-cloning-in="sad-farm"><i class="fa fa-fw fa-plus"></i></button>
			</div>
		</div>

		<hr>

		<div class="form-group">
			@if (isset($form['id']))
				<div class="col-sm-3 pull-right">
					<a href="{{ route('employee.destroy', ['id' => $form['id']]) }}" class="btn btn-block btn-danger">წაშლა</a>
				</div>
			@else
				<div class="col-sm-3 pull-right">
					<a href="{{ route('employee.index') }}" class="btn btn-block btn-default">გაუქმება</a>
				</div>
			@endif
			<div class="col-sm-3 pull-right">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-block btn-success">შენახვა</button>
			</div>
		</div>

	</form>
@stop

@section('postscripts')
	<script src="{{ url('js/dist/index.min.js') }}"></script>
	<script src="{{ url('js/dist/holly-dolly.min.js') }}"></script>
@stop
