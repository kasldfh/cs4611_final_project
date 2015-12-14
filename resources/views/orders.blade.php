@extends('layout')
@section('js')
<?php $nav = "orders"?>
@endsection
@section('content')
<h1>Orders {!!$header!!}</h1>
<table>
   <tr>
       <th>No</th>
       <th>Product Type</th>
       <th>Price</th>
       <th>Batch ID</th>
       <th>Quantity</th>
       <th>Order Date</th>
       <th>Customer Phone</th>
       <th>Customer Address</th>
       <th>Customer Email</th>
       <th></th>
   </tr>
<?php $i = 1;?>
  @foreach($orders as $order)
    <tr>
      <td>{!!$i!!}</td> 
      <td>{!!$order->product_type!!}</td>
      <td>{!!$order->price!!}</td> 
      <td>{!!$order->batch_id!!}</td> 
      <td>{!!$order->quantity!!}</td> 
      <td>{!!$order->order_date!!}</td> 
      <td>{!!$order->phone_number!!}</td> 
      <td>{!!$order->email!!}</td> 
      <td>{!!$order->street!!} {!!$order->city!!}, {!!$order->state!!}</td> 
    </tr>
    
    <?php $i++;?>
      
  @endforeach
</table>
@endsection
