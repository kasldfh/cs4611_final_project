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
        <form class="form" action="/listing/edit/{!!$listing->product_id!!}" 
            method="get">
          <input type="hidden" name="_token" value="{!!csrf_token()!!}">
          <button type="submit" class="btn btn-primary" name="edit">Edit</button>
        </form>

        <form class="form" action="/listing/delete/{!!$listing->product_id!!}" 
            method="post">
          <input type="hidden" name="_token" value="{!!csrf_token()!!}">
          <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </form>
    @endif
  </li>
@endforeach
</ul>
@endsection
