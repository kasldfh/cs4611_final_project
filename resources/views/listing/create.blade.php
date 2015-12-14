@extends('layout')
@section('js')
<?php $nav = "create"?>
@endsection
@section('content')
<form class="form" action="/list" method="post">
<input type="hidden" name="_token" value="{!!csrf_token()!!}">
<label for="quantity">Quantity</label>
<input name="quantity"></input>
<br>
<br>

<label for="price">Price</label>
<input name="price"></input>
<br>
<br>

<label for="batch_id">Batch ID</label>
<input name="batch_id"></input>
<br>
<br>

<label for="useby">Use By date</label>
<input name="useby" type="date"></input>
<br>
<br>

<label for="date_produced">Date Produced</label>
<input name="date_produced" type="date"></input>
<br>

<label for="type">Type</label>
<select name="type">
@foreach ($types as $type)
  <option value="{!!$type->type_id!!}">{!!$type->type_name!!}</option>
@endforeach
</select>

<br>
<br>
<input type="submit" class="btn btn-primary"></input>

</form>
@endsection
