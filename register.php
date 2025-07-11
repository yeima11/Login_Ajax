<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Register Account</title>
</head>
<body>
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-5 offset-md-3">
        <div class="card">
          <div class="card-body">
            <label>REGISTER</label>
            <hr>
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form-control" id="full_name" placeholder="Enter full name">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <button class="btn btn-register btn-block btn-success">REGISTER</button>
          </div>
        </div>
        <div class="text-center" style="margin-top: 15px">
          Already have an account? <a href="login.php">Please Login</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".btn-register").click(function () {
        var full_name = $("#full_name").val().trim();
        var username = $("#username").val().trim();
        var password = $("#password").val().trim();

        if (full_name === "") {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Full Name is required!'
          });
        } else if (username === "") {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Username is required!'
          });
        } else if (password === "") {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Password is required!'
          });
        } else {
          $.ajax({
            url: "save-register.php",
            type: "POST",
            data: {
              full_name: full_name,
              username: username,
              password: password
            },
            success: function (response) {
              if (response === "success") {
                Swal.fire({
                  icon: 'success',
                  title: 'Register Successful!',
                  text: 'Please login!'
                });
                $("#full_name").val('');
                $("#username").val('');
                $("#password").val('');
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Register Failed!',
                  text: 'Please try again!'
                });
              }
              console.log(response);
            },
            error: function (response) {
              Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Server error!'
              });
              console.log(response);
            }
          });
        }
      });
    });
  </script>
</body>
</html>
