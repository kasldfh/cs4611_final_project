@extends('layout')
@section('js')
<?php $nav = "dashboard"?>
@endsection
@section('content')
    <form action="/producer/update/{!!$producer->member_id!!}" method="POST" class="cmxform" autocomplete="off">
    <input type="hidden" name="_token" value="{!!csrf_token()!!}">
    <input type="hidden" name="member_id" value="{!!$producer->member_id!!}">
        <table>
            <tr>
                <td>

                    <p>
                        <label>Name</label>
                        <input type="text" name="name" class="round full-width-input"
                               value="{!!$producer->name!!}" autofocus/>
                    </p></td>
                <td>
                    <p>
                        <label>Email</label>
                        <input type="text" name="email" class="round full-width-input"
                               value="{!!$producer->email!!}" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Phone</label>
                        <input type="text" name="phone_number" class="round full-width-input"
                               value="{!!$producer->phone_number!!}" autofocus/>
                    </p>
                </td>
                <td>&nbsp; </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Street Address</label>
                        <input type="text" name="street" class="round full-width-input"
                               value="{!!$producer->street!!}" autofocus/>
                    </p>

                </td>
                <td>
                    <p>
                        <label>City</label>
                        <input type="text" name="city" class="round full-width-input"
                               value="{!!$producer->city!!}" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>State</label>
                        <input type="text" name="website" class="round full-width-input"
                               value="{!!$producer->state!!}" autofocus/>
                    </p></td>
                <td>
                    &nbsp;
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td>
                    <input type="submit" class="button round blue image-right ic-right-arrow" name="submit"
                           value="Update"/>
                </td>
                <td><a href="/" class="button blue round side-content">Home</a></td>
            </tr>
        </table>

    </form>
</div>
@endsection
