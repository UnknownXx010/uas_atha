<?php
session_start();
include "koneksi.php";

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$data = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM users WHERE username='$username'")
);
var_dump($data);
echo "<br>";
var_dump(password_verify($password, $data['password']));
exit;

if($data && password_verify($password,$data['password'])){
    $_SESSION['login'] = true;
    header("Location: kendaraan/index.php");
    exit;
}else{
    echo "Login gagal";
}
?>