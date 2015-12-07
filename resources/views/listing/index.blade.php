@extends('layout')
@section('js')
  <script>
    function sortBy(key) {
      console.log("sortby called with key: " + key);
      window.location.replace("/listing" + (key === "all" ? "" : "?sort=" + key)); 
    }
  </script>
@endsection
@section('content')
  <button id="all" class="btn btn-default" onclick="sortBy('all')">All Listings</button>
  <button id="sap" class="btn btn-default" onclick="sortBy('sap')">Sap only</button>
  <button id="syrup" class="btn btn-default" onclick="sortBy('syrup')">Syrup only</button>
  @foreach($listings as $listing)
  <?php if(!$listing->quantity_available) {
      $listing->quantity_available = $listing->quantity;
    }
  ?>
    <a href="/listing/{!!$listing->product_id!!}"><h2>{!!$listing->quantity_available!!} Liters of {!!$listing->product_type!!}<h2></a>
    <h3>Produced by {!!$listing->name!!}</h3>
    <h3>Ships from {!!$listing->city!!}, {!!$listing->state!!}</h3>
    <h3>Processed on {!!$listing->day_produced!!}. Expires on {!!$listing->use_by!!}</h3>
    <hr>
  @endforeach
@endsection
