<?php
include "../koneksi.php";

$nama_unit = $_POST['nama_unit'];
$no_rangka = $_POST['no_rangka'];
$tahun = $_POST['tahun'];
$harga = $_POST['harga'];
$id_merk = $_POST['id_merk'];
$id_tipe = $_POST['id_tipe'];
$status = $_POST['status'];

if(empty($nama_unit) || empty($no_rangka)){
    die("Nama dan No Rangka tidak boleh kosong");
}

if($harga < 1000000){
    die("Harga minimal 1 juta");
}

$nama_file = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png'];

if(!in_array($ext,$allowed)){
    die("Format harus JPG/PNG");
}

$nama_baru = time().".".$ext;
move_uploaded_file($tmp,"../img/".$nama_baru);

mysqli_query($conn,"INSERT INTO kendaraan 
VALUES (NULL,'$id_merk','$id_tipe','$nama_unit','$no_rangka',
'$tahun','$harga','$status','$nama_baru')");

header("Location: index.php");
?>