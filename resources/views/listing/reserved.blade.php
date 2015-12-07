@extends('layout')
@section('content')
<ul style="list-style: none;">
@foreach($reservations as $reservation)
  <li>
    <h1>{!!$reservation->quantity!!} Gallons of {!!$reservation->product_type!!} 
      from {!!$reservation->name!!}</h1>
      <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
  </li>
@endforeach
</ul>
@endsection
