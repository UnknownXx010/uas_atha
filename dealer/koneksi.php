<?php
$conn = mysqli_connect("localhost","root","","db_dealer_atha");

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>