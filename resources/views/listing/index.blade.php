@extends('layout')
@section('js')
<?php $nav = "store"?>
@endsection
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
<table>
   <tr>
       <th>No</th>
       <th>Product Type</th>
       <th>Price</th>
       <th>Batch ID</th>
       <th>Quantity</th>
       <th>Date Produced</th>
       <th>Expiration Date</th>
       <th>Vendor</th>
       <th>Ships From</th>
   </tr>
<?php $i = 1;?>
  @foreach($listings as $listing)
    <tr>
      <?php if(is_null($listing->quantity_available)) $listing->quantity_available = $listing->quantity;?>
      <td>{!!$i!!}</td> 
      <td><a href="/listing/{!!$listing->product_id!!}">{!!$listing->product_type!!}</a></td>
      <td>{!!$listing->price!!}</td> 
      <td>{!!$listing->batch_id!!}</td> 
      <td>{!!$listing->quantity_available!!}</td> 
      <td>{!!$listing->day_produced!!}</td> 
      <td>{!!$listing->use_by!!}</td> 
      <td>{!!$listing->producer_name!!}</td> 
      <td>{!!$listing->city!!}, {!!$listing->state!!}</td> 
    </tr>
    <?php $i++;?>

      
  @endforeach
</table>
@endsection
