@extends('layout')
@section('js')
<?php $nav = "store"?>
@endsection
@section('content')
  <?php if(!$listing->quantity_available) {
      $listing->quantity_available = $listing->quantity;
    }
  ?>
    <h2>{!!$listing->quantity_available!!} Liters of {!!$listing->product_type!!}<h2>
    <h3>Produced by {!!$listing->name!!}</h3>
    <h3>Ships from {!!$listing->city!!}, {!!$listing->state!!}</h3>
    <h3>Processed on {!!$listing->day_produced!!}. Expires on {!!$listing->use_by!!}</h3>
    
    {{--Allow users to reserve some syrup--}}
    <br>
    <form class="form-inline" action="/reserve" method="POST">
      <input type="hidden" name="product_id" value="{!!$listing->product_id!!}">
      <input type="hidden" name="_token" value="{!!csrf_token()!!}">

      <div class="form-group">
        <label class="sr-only" for="exampleInputAmount">Quantity</label>
        <div class="input-group">
          <input type="text" class="form-control" id="quantity" 
            placeholder="Amount" name="quantity">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Reserve</button>
    </form>
@endsection
