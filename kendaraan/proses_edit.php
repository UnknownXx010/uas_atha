<?php
session_start();
include "../koneksi.php";

$id = $_POST['id'];
$nama_unit = $_POST['nama_unit'];
$no_rangka = $_POST['no_rangka'];
$tahun = $_POST['tahun'];
$harga = $_POST['harga'];
$id_merk = $_POST['id_merk'];
$id_tipe = $_POST['id_tipe'];
$status = $_POST['status'];
$foto_lama = $_POST['foto_lama'];


// =======================
// VALIDASI
// =======================
if(empty($nama_unit) || empty($no_rangka)){
    die("Nama Unit dan No Rangka tidak boleh kosong");
}

if($harga < 1000000){
    die("Harga minimal 1 juta");
}


// =======================
// CEK APAKAH GANTI FOTO
// =======================

if($_FILES['foto']['name'] != ""){

    $nama_file = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png'];

    if(!in_array($ext,$allowed)){
        die("Format gambar harus JPG atau PNG");
    }

    $nama_baru = time().".".$ext;

    // Hapus foto lama
    if(file_exists("../img/".$foto_lama)){
        unlink("../img/".$foto_lama);
    }

    move_uploaded_file($tmp,"../img/".$nama_baru);

}else{

   
    $nama_baru = $foto_lama;
}




mysqli_query($conn,"UPDATE kendaraan SET
    id_merk='$id_merk',
    id_tipe='$id_tipe',
    nama_unit='$nama_unit',
    no_rangka='$no_rangka',
    tahun_produksi='$tahun',
    harga_jual='$harga',
    status_stok='$status',
    foto_unit='$nama_baru'
WHERE id_kendaraan='$id'
");

header("Location: index.php");
exit;
?>

<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../koneksi.php";
?>