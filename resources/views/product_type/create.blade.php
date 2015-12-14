@extends('layout')
@section('js')
<?php $nav = "dashboard"?>
@endsection
@section('content')
  <h1>Create a new product type</h1>
  <form method="post" action="/product_type/store">
    <input type="hidden" name="_token" value="{!!csrf_token()!!}">
    <table class="form" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><span class="man">*</span>Name:</td>
        <td><input name="name" placeholder="Product type name" type="text" id="name"
           maxlength="200" class="round default-width-input"> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
          <input class="button round blue text-upper" type="submit"
            name="Submit" value="Add">
      </tr>
    </table>
  </form>
@endsection
