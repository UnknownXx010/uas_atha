<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../koneksi.php";

$id = $_GET['id'];

// Ambil data kendaraan
$data = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT * FROM kendaraan WHERE id_kendaraan='$id'
"));

// Ambil data merk & tipe untuk dropdown
$merk = mysqli_query($conn,"SELECT * FROM merk");
$tipe = mysqli_query($conn,"SELECT * FROM tipe_kendaraan");
?>

<h2>Edit Data Kendaraan</h2>

<form method="POST" action="proses_edit.php" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $data['id_kendaraan']; ?>">
<input type="hidden" name="foto_lama" value="<?= $data['foto_unit']; ?>">

Nama Unit <br>
<input type="text" name="nama_unit" value="<?= $data['nama_unit']; ?>" required><br><br>

No Rangka <br>
<input type="text" name="no_rangka" value="<?= $data['no_rangka']; ?>" required><br><br>

Tahun <br>
<input type="number" name="tahun" value="<?= $data['tahun_produksi']; ?>"><br><br>

Harga <br>
<input type="number" name="harga" value="<?= $data['harga_jual']; ?>" required><br><br>

Merk <br>
<select name="id_merk">
<?php while($m=mysqli_fetch_assoc($merk)){ ?>
<option value="<?= $m['id_merk']; ?>"
<?php if($m['id_merk']==$data['id_merk']) echo "selected"; ?>>
<?= $m['nama_merk']; ?>
</option>
<?php } ?>
</select><br><br>

Tipe <br>
<select name="id_tipe">
<?php while($t=mysqli_fetch_assoc($tipe)){ ?>
<option value="<?= $t['id_tipe']; ?>"
<?php if($t['id_tipe']==$data['id_tipe']) echo "selected"; ?>>
<?= $t['nama_tipe']; ?>
</option>
<?php } ?>
</select><br><br>

Status <br>
<select name="status">
<option value="Tersedia"
<?= ($data['status_stok']=='Tersedia') ? 'selected' : ''; ?>>
Tersedia</option>

<option value="Terjual"
<?= ($data['status_stok']=='Terjual') ? 'selected' : ''; ?>>
Terjual</option>
</select><br><br>

Foto Lama <br>
<img src="../img/<?= $data['foto_unit']; ?>" width="100"><br><br>

Ganti Foto (Opsional) <br>
<input type="file" name="foto"><br><br>

<button type="submit">Update</button>

</form>