<?php
include "koneksi.php";

$username = "admin";
$password = password_hash("123456", PASSWORD_DEFAULT);

mysqli_query($conn,"DELETE FROM users");
mysqli_query($conn,"INSERT INTO users(username,password) VALUES('$username','$password')");

echo "User admin berhasil dibuat";
?>