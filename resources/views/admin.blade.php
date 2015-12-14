@extends('layout')
@section('js')
<?php $nav = "dashboard"?>
@endsection
@section('content')
  <div class="side-menu fl">

      <h3>Admin Actions</h3>
      <ul>
          <li><a href="/product_type/create">Add Product Type</a></li>
          <li><a href="/producer/create">Add Producer</a></li>
          <li><a href="/producer/manage">Manage Producers</a></li>
      </ul>
  </div>
@endsection
