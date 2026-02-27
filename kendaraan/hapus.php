<?php
include "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT foto_unit FROM kendaraan WHERE id_kendaraan='$id'"));

unlink("../img/".$data['foto_unit']);

mysqli_query($conn,"DELETE FROM kendaraan WHERE id_kendaraan='$id'");

header("Location: index.php");
?>