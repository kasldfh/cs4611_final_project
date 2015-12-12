@extends('layout')
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
       <th>View Orders</th>
       <th>Remove</th>
       <th>Edit</th>
   </tr>
<?php $i = 1;?>
  @foreach($listings as $listing)
    <tr>
      <td>{!!$i!!}</td> 
      <td>{!!$listing->product_type!!}</td>
      <td>{!!$listing->price!!}</td> 
      <td>{!!$listing->batch_id!!}</td> 
      <td>{!!$listing->quantity!!}</td> 
      <td>{!!$listing->day_produced!!}</td> 
      <td>{!!$listing->use_by!!}</td> 
      <td>
        @if($listing->reservations) 
        <form class="form" action="/orders/{!!$listing->product_id!!}" 
            method="get">
          <input type="hidden" name="_token" value="{!!csrf_token()!!}">
          <button type="submit" class="btn btn-primary" name="orders">Orders</button>
        </form>
        @else
        No Orders
        @endif
      </td> 
      @if($listing->reservations)
      <td></td>
      <td></td>
      @else
      <td>
        <form class="form" action="/listing/edit/{!!$listing->product_id!!}" 
            method="get">
          <input type="hidden" name="_token" value="{!!csrf_token()!!}">
          <button type="submit" class="btn btn-primary" name="edit">Edit</button>
        </form>
      </td>
      <td>
        <form class="form" action="/listing/delete/{!!$listing->product_id!!}" 
            method="post">
          <input type="hidden" name="_token" value="{!!csrf_token()!!}">
          <button type="submit" class="btn btn-danger" name="delete">Delete</button>
        </form>
      </td>
      @endif
    </tr>
    <?php $i++;?>

      
  @endforeach
</table>
@endsection
