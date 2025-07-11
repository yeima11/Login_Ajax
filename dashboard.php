<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit(); // penting untuk menghentikan eksekusi setelah redirect
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Dashboard</title>
</head>
<body>
  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-3">
        <ul class="list-group">
          <li class="list-group-item active">MAIN MENU</li>
          <a href="dashboard.php" class="list-group-item" style="color: #212529;">Dashboard</a>
          <li class="list-group-item">Profile</li>
          <a href="logout.php" class="list-group-item" style="color: #212529;">Logout</a>
        </ul>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <label>DASHBOARD</label>
            <hr>
            Welcome <?php echo $_SESSION['full_name']; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
