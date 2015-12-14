@extends('layout')
@section('js')
<?php $nav = "dashboard"?>
@endsection
@section('content')
    <form action="/producer/store" method="POST" class="cmxform" autocomplete="off">
        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
        <table>
            <tr>
                <td>

                    <p>
                        <label>Name</label>
                        <input type="text" name="name" class="round full-width-input" autofocus/>
                    </p></td>
                <td>
                    <p>
                        <label>Email</label>
                        <input type="text" name="email" class="round full-width-input" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Phone</label>
                        <input type="text" name="phone_number" class="round full-width-input" autofocus/>
                    </p>
                </td>
                <td>
                    <p>
                        <label>Member ID</label>
                        <input type="text" name="member_id" class="round full-width-input" autofocus/>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Street Address</label>
                        <input type="text" name="street" class="round full-width-input" autofocus/>
                    </p>

                </td>
                <td>
                    <p>
                        <label>City</label>
                        <input type="text" name="city" class="round full-width-input" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>State</label>
                        <input type="text" name="state" class="round full-width-input" autofocus/>
                    </p></td>
                <td>
                    <input type="checkbox" name="admin" value="true">Admin 
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td>
                    <input type="submit" class="button round blue image-right ic-right-arrow" name="submit"
                           value="Save"/>
                </td>
                <td><a href="/" class="button blue round side-content">Home</a></td>
            </tr>
        </table>

    </form>
</div>
@endsection
