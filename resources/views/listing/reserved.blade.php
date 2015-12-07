@extends('layout')
@section('content')
<ul style="list-style: none;">
@foreach($reservations as $reservation)
  <li>
    <h1>{!!$reservation->quantity!!} Gallons of {!!$reservation->product_type!!} 
      from {!!$reservation->name!!}</h1>
        
    <form class="form" action="/reserve/cancel/{!!$reservation->reserve_id!!}" method="post">
      <input type="hidden" name="_token" value="{!!csrf_token()!!}">
      <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
    </form>
  </li>
@endforeach
</ul>
@endsection
