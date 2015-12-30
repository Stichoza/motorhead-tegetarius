@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-xs-6 text-center">
			<canvas id="gender-chart" width="300" height="300"></canvas>
			<h4>გენდერული სტატისტიკა</h4>
		</div>
		<div class="col-xs-6 text-center">
			<canvas id="salary-chart" width="300" height="300"></canvas>
			<h4>ხელფასების სტატისტიკა</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 text-center">
			<hr>
			<canvas id="dates-chart" width="600" height="300"></canvas>
			<h4>თანამშრომელთა აყვანის სტატისტიკა</h4>
		</div>
	</div>
@stop

@section('prescripts')
	<script>var statsDataUrl = "{{ route('statistics.json') }}";</script>
@stop

@section('postscripts')
	<script src="{{ url('lib/Chart.js/Chart.min.js') }}"></script>
	<script src="{{ url('js/dist/stats.min.js') }}"></script>
@stop
