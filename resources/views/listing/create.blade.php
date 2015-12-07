@extends('layout')
@section('content')
<form class="form" action="/list" method="post">
<input type="hidden" name="_token" value="{!!csrf_token()!!}">
<label for="quantity">Quantity</label>
<input name="quantity"></input>
<br>

<label for="useby">Use By date</label>
<input name="useby" type="date"></input>
<br>

<label for="type">Type</label>
<select name="type">
  <option>Sap</option>
  <option>Syrup</option>
</select>

<br>
<input type="submit" class="btn btn-primary"></input>

</form>
@endsection
