<?php
include('connection.php'); // pastikan file ini benar

$full_name = $_POST['full_name'];
$username = $_POST['username'];
$password = md5($_POST['password']); // Gunakan password_hash di real project

// Debug: cek koneksi
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Debug: cek input
if ($full_name == "" || $username == "" || $password == "") {
    echo "empty";
    exit;
}

// Cek username sudah dipakai belum
$check = mysqli_query($connection, "SELECT * FROM tbl_users WHERE username = '$username'");
if (mysqli_num_rows($check) > 0) {
    echo "duplicate";
    exit;
}

// Simpan ke database
$query = "INSERT INTO tbl_users (full_name, username, password) VALUES ('$full_name', '$username', '$password')";

if (mysqli_query($connection, $query)) {
    echo "success";
} else {
    echo "error";
}
?>
