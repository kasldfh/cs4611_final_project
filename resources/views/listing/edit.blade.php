@extends('layout')
@section('js')
<?php $nav = "create"?>
@endsection
@section('content')
<form class="form" action="/listing/update/{!!$listing->product_id!!}" method="post">
<input type="hidden" name="_token" value="{!!csrf_token()!!}">
<label for="quantity">Quantity</label>
<input name="quantity" value="{!!$listing->quantity!!}"></input>
<br>

<label for="useby">Use By date</label>
<input name="useby" type="date" value="{!!$listing->use_by!!}"></input>
<br>

<label for="product_type">Type</label>
<select name="product_type">
<option {!!$listing->product_type == "sap" ? "selected" : "" !!}>Sap</option>
<option {!!$listing->product_type == "syrup" ? "selected" : ""!!} >Syrup</option>
</select>

<br>
<input type="submit" class="btn btn-primary"></input>

</form>
@endsection
