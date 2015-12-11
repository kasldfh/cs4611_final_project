@extends('layout')
@section('js')
  <script>
      $(document).ready(function () {

          // validate signup form on keyup and submit
          $("#login-form").validate({
              rules: {
                  sname: {
                      required: true,
                      minlength: 3
                  },
                  address: {
                      required: true,
                      minlength: 3
                  },
                  place: {
                      required: true,
                      minlength: 3
                  },
                  website: {
                      required: true,
                      minlength: 3
                  },
                  email: {
                      required: true,
                      minlength: 3
                  },
                  phone: {
                      required: true,
                      minlength: 10,
                      maxlength: 12
                  },
                  city: {
                      required: true,
                      minlength: 3
                  }
              },
              messages: {
                  sname: {
                      required: "Please Enter The Store Name",
                      minlength: "Your Store Name must consist of at least 3 characters"
                  },
                  address: {
                      required: "Please Enter The Address",
                      minlength: "Your Address must be at least 3 characters long"
                  },
                  place: {
                      required: "Please Enter The Place",
                      minlength: "Your place must be at least 3 characters long"
                  },
                  website: {
                      required: "Please Enter The Website",
                      minlength: "Your Website must be at least 3 characters long"
                  },
                  email: {
                      required: "Please Enter The email",
                      minlength: "Your Email must be at least 3 characters long"
                  },
                  phone: {
                      required: "Please Enter The Phone",
                      minlength: "Your Phone must be at least 10 characters long",
                      maxlength: "Your Phone must be at Less than 13 characters long"
                  },
                  city: {
                      required: "Please Enter The city",
                      minlength: "Your city must be at least 3 characters long"
                  }
              }
          });

      });

  </script>
@endsection
@section('content')

        <div id="login-intro" class="fl">

            <h1>Store Setting </h1>


        </div>
        <!-- login-intro -->

        <!-- Change this image to your own company's logo -->
        <!-- The logo will automatically be resized to 39px height. -->
        <a href="#" id="company-branding" class="fr"><img src="/upload/posnic.png"
            alt="Point of Sale"/></a>





<!-- MAIN CONTENT -->
<div id="content">


    <form action="" method="POST" id="login-form" class="cmxform" autocomplete="off">
        <?php
        $line = $db->queryUniqueObject("SELECT * FROM store_details ");
        ?>
        <table>
            <tr>
                <td>

                    <p>
                        <label>Store Name</label>
                        <input type="text" name="sname" id="name" class="round full-width-input"
                               value="<?php echo $line->name ?>" autofocus/>
                    </p></td>
                <td>
                    <p>
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="round full-width-input"
                               value="<?php echo $line->address ?>" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Place</label>
                        <input type="text" name="place" id="place" class="round full-width-input"
                               value="<?php echo $line->place ?>" autofocus/>
                    </p>
                </td>
                <td>
                    <p>
                        <label>City</label>
                        <input type="text" name="city" id="city" class="round full-width-input"
                               value="<?php echo $line->city ?>" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Pin</label>
                        <input type="text" name="pin" id="pin" class="round full-width-input"
                               value="<?php echo $line->pin ?>" autofocus/>
                    </p>

                </td>
                <td>
                    <p>
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="round full-width-input"
                               value="<?php echo $line->phone ?>" autofocus/>
                    </p></td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label>Website</label>
                        <input type="text" name="website" id="website" class="round full-width-input"
                               value="<?php echo $line->web ?>" autofocus/>
                    </p></td>
                <td>
                    <p>
                        <label>Email</label>
                        <input type="text" name="email" id="email" class="round full-width-input"
                               value="<?php echo $line->email ?>" autofocus/>
                    </p>

                </td>
            </tr>
            <tr></tr>
            <tr>
                <td>


                    <!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
                    <input type="submit" class="button round blue image-right ic-right-arrow" name="submit"
                           value="Update"/>
                </td>
                <td><a href="index.php" class="button blue round side-content">Dashboard</a></td>
            </tr>
        </table>

    </form>
    <div style="float: right;margin-top: -350px">
        <form action="" method="POST" id="login-form" class="cmxform" enctype="multipart/form-data">
            <p>Upload Logo</p>
            <input type="file" name="file" id="file" class="round full-width-input"><br><br><br>
            <input type="submit" name="submit" value="Submit" class="button round blue image-right ic-right-arrow">
        </form>
    </div>
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
    <div class="fb-like" data-href="https://www.facebook.com/posnic.point.of.sale" data-width="450"
         data-show-faces="true" data-send="true"></div>
    <div class="g-plusone" data-href="https://plus.google.com/u/0/107268519615804538483"></div>
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


</div>
<!-- end footer -->

</body>
</html>

