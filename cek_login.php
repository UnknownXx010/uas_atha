<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM users WHERE username='$username'")
);

if($data && password_verify($password,$data['password'])){
    $_SESSION['login'] = true;
    header("Location: /uas_atha/kendaraan/index.php");
    exit;
}else{
    echo "Login gagal";
}
?>