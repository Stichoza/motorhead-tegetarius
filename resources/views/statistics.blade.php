@extends('layouts.master')

@section('content')
	
<canvas id="myChart" width="400" height="400"></canvas>

@stop

@section('postscripts')
	<script src="{{ url('lib/Chart.js/Chart.min.js') }}"></script>
	<script src="{{ url('js/dist/index.min.js') }}"></script>
	<script>

		var ctx = document.getElementById("myChart").getContext("2d");

		var myPieChart = new Chart(ctx[0], {
		    type: 'pie',
		    data: {
		    	'fem': 20,
		    	'mal': 3
		    },
		    options: {}
		});

	</script>
@stop
