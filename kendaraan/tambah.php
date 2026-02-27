<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../koneksi.php";

$merk = mysqli_query($conn,"SELECT * FROM merk");
$tipe = mysqli_query($conn,"SELECT * FROM tipe_kendaraan");
?>

<form method="POST" action="proses_tambah.php" enctype="multipart/form-data">

Nama Unit <input type="text" name="nama_unit" required><br>
No Rangka <input type="text" name="no_rangka" required><br>
Tahun <input type="number" name="tahun"><br>
Harga <input type="number" name="harga" required><br>

Merk
<select name="id_merk">
<?php while($m=mysqli_fetch_assoc($merk)){ ?>
<option value="<?= $m['id_merk']; ?>">
<?= $m['nama_merk']; ?>
</option>
<?php } ?>
</select><br>

Tipe
<select name="id_tipe">
<?php while($t=mysqli_fetch_assoc($tipe)){ ?>
<option value="<?= $t['id_tipe']; ?>">
<?= $t['nama_tipe']; ?>
</option>
<?php } ?>
</select><br>

Status
<select name="status">
<option value="Tersedia">Tersedia</option>
<option value="Terjual">Terjual</option>
</select><br>

Foto <input type="file" name="foto" required><br>

<button type="submit">Simpan</button>
</form>