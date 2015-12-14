@extends('layout')
@section('js')
<?php $nav = "dashboard"?>
@endsection
@section('js')
  <script LANGUAGE="JavaScript">
      <!--
      // Nannette Thacker http://www.shiningstar.net
      function confirmSubmit() {
          var agree = confirm("Are you sure you wish to Delete this Entry?");
          if (agree)
              return true;
          else
              return false;
      }

      function confirmDeleteSubmit() {
          var flag = 0;
          var field = document.forms.deletefiles;
          for (i = 0; i < field.length; i++) {
              if (field[i].checked == true) {
                  flag = flag + 1;

              }

          }
          if (flag < 1) {
              alert("You must check one and only one checkbox!");
              return false;
          } else {
              var agree = confirm("Are you sure you wish to Delete Selected Record?");
              if (agree)

                  document.deletefiles.submit();
              else
                  return false;

          }
      }
      function confirmLimitSubmit() {
          if (document.getElementById('search_limit').value != "") {

              document.limit_go.submit();

          } else {
              return false;
          }
      }


      function checkAll() {

          var field = document.forms.deletefiles;
          for (i = 0; i < field.length; i++)
              field[i].checked = true;
      }

      function uncheckAll() {
          var field = document.forms.deletefiles;
          for (i = 0; i < field.length; i++)
              field[i].checked = false;
      }
      // -->
  </script>
  <script>


      /*$.validator.setDefaults({
       submitHandler: function() { alert("submitted!"); }
       });*/
      $(document).ready(function () {

          // validate signup form on keyup and submit
          $("#form1").validate({
              rules: {
                  name: {
                      required: true,
                      minlength: 3,
                      maxlength: 200
                  },
                  address: {
                      minlength: 3,
                      maxlength: 500
                  },
                  contact1: {
                      minlength: 3,
                      maxlength: 20
                  },
                  contact2: {
                      minlength: 3,
                      maxlength: 20
                  }
              },
              messages: {
                  name: {
                      required: "Please enter a supplier Name",
                      minlength: "supplier must consist of at least 3 characters"
                  },
                  address: {
                      minlength: "supplier Address must be at least 3 characters long",
                      maxlength: "supplier Address must be at least 3 characters long"
                  }
              }
          });
      });
  </script>
@endsection


@section('content')
<!-- MAIN CONTENT -->

  <div class="side-menu fl">

      <h3>Supplier Management</h3>
      <ul>
          <li><a href="/producer/create">Add Producer</a></li>
          <li><a href="/producer/manage">Manage Producers</a></li>
      </ul>

  </div>
  <!-- end side-menu -->

  <div class="side-content fr">

      <div class="content-module">

          <div class="content-module-heading cf">

              <h3 class="fl">PRODUCERS</h3>
              <span class="fr expand-collapse-text">Click to collapse</span>
              <span class="fr expand-collapse-text initial-expand">Click to expand</span>

          </div>
          <!-- end content-module-heading -->

          <div class="content-module-main cf">


                      <table>
                              <th>No</th>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Location</th>
                              <th>Edit</th>
                              <th>Delete</th>
                          </tr>

                        <?php $i=1;?>
                        @foreach($producers as $producer)
                              <tr>
                                  <td>{!!$i!!}</td>
                                  <td>{!!$producer->name!!}</td>
                                  <td>{!!$producer->phone_number!!}</td>
                                  <td>{!!$producer->email!!}</td>
                                  <td>{!!$producer->city!!}, {!!$producer->state!!}</td>
                                  <td>
                                      <a href="/producer/edit/{!!$producer->member_id!!}"
                                         class="table-actions-button ic-table-edit">
                                      </a>
                                </td>
                                <td>
                                      <a onclick="return confirmSubmit()"
                                         href="/producer/delete/{!!$producer->member_id!!}"
                                         class="table-actions-button ic-table-delete"></a>
                                  </td>
                              </tr>
                            <?php $i++; ?>
                        @endforeach
                  </form>
          </div>
      </div>
@endsection
