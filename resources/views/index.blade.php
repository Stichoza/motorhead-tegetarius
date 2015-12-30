@extends('layouts.master')

@section('content')
	<table class="list" data-toggle="table" data-url="{{ route('employee.index') }}" data-method="get" data-page-list="[5, 10, 50, 100, 500]" data-pagination="true" data-search="true" data-sort-name="name" data-select-item-name="selectListItem" data-id-field="id" data-buttons-align="right" data-toolbar-align="left" data-show-refresh="true" data-search-time-out="100" data-striped="true" data-show-columns="true" data-sort-order="asc" data-toolbar=".listToolbar">
		<thead>
			<tr>
				<th data-click-to-select="true" data-sortable="true" data-field="name">სახელი, გვარი</th>
				<th data-click-to-select="true" data-sortable="true" data-field="sex">სქესი</th>
				<th data-click-to-select="true" data-sortable="true" data-field="position">თანამდებობა</th>
				<th data-click-to-select="true" data-sortable="true" data-field="salary">ხელფასი</th>
			</tr>
		</thead>
	</table>
@stop

@section('postscripts')
	<script src="{{ url('js/dist/index.min.js') }}"></script>
@stop