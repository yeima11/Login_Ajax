<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Account Login</title>
</head>
<body>
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-5 offset-md-3">
        <div class="card">
          <div class="card-body">
            <label>LOGIN</label>
            <hr>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" id="username" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <button class="btn btn-login btn-block btn-success">LOGIN</button>
          </div>
        </div>
        <div class="text-center" style="margin-top: 15px">
          Don't have an account yet? <a href="register.php">Please Register</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Script Section -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".btn-login").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();

        if (username.length == "") {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Username is required!'
          });
        } else if (password.length == "") {
          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Password is required!'
          });
        } else {
          $.ajax({
            url: "check-login.php",
            type: "POST",
            data: {
              "username": username,
              "password": password
            },
            success: function (response) {
              if (response == "success") {
                Swal.fire({
                  icon: 'success',
                  title: 'Login Successful!',
                  text: 'Redirecting in 3 seconds...',
                  timer: 3000,
                  showConfirmButton: false
                }).then(function () {
                  window.location.href = "dashboard.php";
                });
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Login Failed!',
                  text: "Please try again!"
                });
              }
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
