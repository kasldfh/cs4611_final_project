@extends('layout')
@section('header')
<!-- HEADER -->
<div id="header">

    <div class="page-full-width cf">

        <div id="login-intro" class="fl">

            <h1>Login to Inter-Tribal Maple Syrup Producers Cooperative</h1>
            <h5>Enter your credentials below</h5>

        </div>
        <!-- login-intro -->

        <!-- Change this image to your own company's logo -->
        <!-- The logo will automatically be resized to 39px height. -->
        <a href="#" id="company-branding" class="fr"><img src="<?php 
                echo "/upload/posnic.png";
             ?>" alt="Point of Sale"/></a>

    </div>
    <!-- end full-width -->

</div>
<!-- end header -->
@endsection

@section('content')
<!-- MAIN CONTENT -->
<div id="content">
    <form action="/auth/login" method="POST" id="login-form" class="cmxform" autocomplete="off">
        <fieldset>
            {!! csrf_field() !!}
            <p> <?php

                if (isset($_REQUEST['msg']) && isset($_REQUEST['type'])) {

                    if ($_REQUEST['type'] == "error")
                        $msg = "<div class='error-box round'>" . $_REQUEST['msg'] . "</div>";
                    else if ($_REQUEST['type'] == "warning")
                        $msg = "<div class='warning-box round'>" . $_REQUEST['msg'] . "</div>";
                    else if ($_REQUEST['type'] == "confirmation")
                        $msg = "<div class='confirmation-box round'>" . $_REQUEST['msg'] . "</div>";
                    else if ($_REQUEST['type'] == "information")
                        $msg = "<div class='information-box round'>" . $_REQUEST['msg'] . "</div>";

                    echo $msg;
                }
                ?>

            </p>

            <p>
                <label for="login-username">email</label>
                <input type="text" id="login-username" class="round full-width-input" placeholder=""
                       name="email" autofocus/>
            </p>

            <p>
                <label for="login-password">password</label>
                <input type="password" id="login-password" name="password" placeholder=""
                       class="round full-width-input"/>
            </p>

            <a href="forget_pass.php" class="button ">Forgot your password?</a>

            <!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
            <input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="LOG IN"/>
        </fieldset>

        <br/>

        <div class="information-box round">Just click on the "LOG IN" button to continue, no login information
            required.
        </div>

    </form>

</div>
<!-- end content -->


<!-- FOOTER -->
<div id="footer">
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=286371564842269";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <div id="fb-root"></div>
    <div class="fb-like" data-href="https://www.facebook.com/tribalsyrup/" data-width="450"
         data-show-faces="true" data-send="true"></div>
    <script type="text/javascript">
        (function () {
            var po = document.createElement('script');
            po.type = 'text/javascript';
            po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
        })();
    </script>
    <p>Any Queries email to <a href="mailto:hafee004@d.umn.edu?subject=Stock%20Management%20System">hafee004@d.umn.edu</a>.
    </p>
@endsection
