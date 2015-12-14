@extends('layout')
@section('js')
<?php $nav = "buying"?>
@endsection
@section('content')
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
       <th>Order Date</th>
       <th>Cancel</th>
   </tr>
<?php $i = 1;?>
  @foreach($reservations as $reservation)
  <?php $address = $reservation->street . " " . $reservation->city . " " . $reservation->state?>
    <tr>
      <td>{!!$i!!}</td> 
      <td>{!!$reservation->product_type!!}</td>
      <td>{!!$reservation->price!!}</td> 
      <td>{!!$reservation->batch_id!!}</td> 
      <td>{!!$reservation->quantity!!}</td> 
      <td>{!!$reservation->day_produced!!}</td> 
      <td>{!!$reservation->use_by!!}</td> 
      <td>{!!$reservation->producer_name!!}</td> 
      <td><a href="/transport?from="{!!$address!!}">{!!$reservation->city!!}, {!!$reservation->state!!}</a></td> 
      <td>{!!$reservation->order_date!!}</td> 
      <td>
        <form class="form" action="/reserve/cancel/{!!$reservation->reserve_id!!}" method="post">
          <input type="hidden" name="_token" value="{!!csrf_token()!!}">
          <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
        </form>
      </td>
    </tr>
    <?php $i++;?>

      
  @endforeach
</table>
@endsection
