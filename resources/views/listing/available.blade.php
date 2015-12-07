@extends('layout')
@section('content')
<ul style="list-style: none;">
@foreach($listings as $listing)
  <li>
    <h1>{!!$listing->quantity!!} Gallons of {!!$listing->product_type!!}</h2>
    @if(!empty($listing->reservations))
      <ul style="list-style: none;">
      @foreach ($listing->reservations as $reservation)
        <li><h2>{!!$reservation->quantity!!} Gallons reserved by 
          {!!$reservation->name!!}</h2></li>
      @endforeach
      </ul>
    @else
      <button type="submit" class="btn btn-danger" name="delete">Delete</button>
      <button type="submit" class="btn btn-primary" name="edit">Edit</button>
    @endif
  </li>
@endforeach
</ul>
@endsection
