@extends('layout')
@section('content')
<p>Select the type of report you would like to generate:</p>
<div class="panel">
	<form method="GET" action="/reports">
		<select name="type">
			<option value="selling">Sells</option>
			<option value="product">Product</option>
			<option value="buying">Buying</option>
		</select>
		<input type="text" id="datepicker1" name="start_date">
		<input type="text" id="datepicker2" name="end_date">
		<br><br>
		<button type="button" style="margin-left:10%;">Generate Report</button>
	</form>
</div>
@endsection