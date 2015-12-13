@extends('layout')
@section('content')

  <form action="/auth/reset/{!!$user->id!!}" method="post">
      <input type="hidden" name="_token" value="{!!csrf_token()!!}">
      <table style="width:600px; margin-left:50px; float:left;" border="0" cellspacing="0"
             cellpadding="0">

          <tr>
              <td>Old Password</td>
              <td><input type="password" name="old"></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>New Password</td>
              <td><input type="password" name="new" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>Confirm Password</td>
              <td><input type="password" name="confirm" ></td>
          </tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
          <tr>
          <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
          <tr></tr>
          <tr>
              <td>
                  <input class="button round blue image-right text-upper" type="submit"
                         name="Submit" name="change_pass" value="Save">
              </td>
              <td>
                  <input class="button round red   text-upper" type="reset" name="Reset"
                         value="Reset"></td>
          </tr>

      </table>
  </form>
@endsection
