@extends('layout')
@section('js')
<?php $nav = "reports"?>
@endsection
@section('content')
<p>Select the type of report you would like to generate:</p>
<div class="panel">
	<form method="GET" action="/report">
		<select name="title">
			<option value="Selling">Order</option>
			<option value="Product">Product</option>
			<option value="Buying">Buying</option>
		</select>
		<input placeholder="Start Date (optional)" type="text" id="datepicker1" name="start_date">
		<input placeholder="End Date (optional)" type="text" id="datepicker2" name="end_date">
		<input placeholder="Batch Id (optional)" type="text" id="batchpicker" name="chosen_batch">
		<br><br>
		<button type="submit" style="margin-left:10%;">Generate Report</button>
	</form>
</div>
@endsection
