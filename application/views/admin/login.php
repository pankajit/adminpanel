<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin Panel</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo HTTP_PATH_ADMIN;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo HTTP_PATH_ADMIN;?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo HTTP_PATH_ADMIN;?>css/sb-admin.css" rel="stylesheet">
  
   <script>
            $(function() {

                if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember_me').attr('checked', 'checked');
                    $('#username').val(localStorage.usrname);
                    $('#pass').val(localStorage.pass);
                } else {
                    $('#remember_me').removeAttr('checked');
                    $('#username').val('');
                    $('#pass').val('');
                }

                $('#remember_me').click(function() {

                    if ($('#remember_me').is(':checked')) {
                        // save username and password
                        localStorage.usrname = $('#username').val();
                        localStorage.pass = $('#pass').val();
                        localStorage.chkbx = $('#remember_me').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });
    </script>
</head>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
       <form  name="login" method="post" action="<?php echo base_url(); ?>admin/home/do_login">
          <div class="form-group">
            <label for="username">User Name</label>
            <input class="form-control" id="username" name="username" type="text" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" id="password" type="password" name="password" placeholder="Password" />
          </div>
          <!--
		  <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div> -->
          
		  <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
        </form>
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>-->
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo HTTP_PATH_ADMIN;?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo HTTP_PATH_ADMIN;?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo HTTP_PATH_ADMIN;?>vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
