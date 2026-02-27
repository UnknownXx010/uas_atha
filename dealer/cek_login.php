<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
$data = mysqli_fetch_assoc($query);

if($data && password_verify($password,$data['password'])){
    $_SESSION['login'] = true;
    header("Location: kendaraan/index.php");
}else{
    echo "Login gagal";
}
?>