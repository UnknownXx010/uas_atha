<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../koneksi.php";

$query = mysqli_query($conn,"
SELECT kendaraan.*, merk.nama_merk, tipe_kendaraan.nama_tipe
FROM kendaraan
JOIN merk ON kendaraan.id_merk = merk.id_merk
JOIN tipe_kendaraan ON kendaraan.id_tipe = tipe_kendaraan.id_tipe
");
?>

<h2>Data Kendaraan</h2>
<a href="tambah.php">Tambah Data</a>
<a href="../logout.php">Logout</a>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Merk</th>
    <th>Tipe</th>
    <th>Nama Unit</th>
    <th>No Rangka</th>
    <th>Tahun</th>
    <th>Harga</th>
    <th>Status</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>

<?php $no=1; while($row=mysqli_fetch_assoc($query)){ ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_merk']; ?></td>
    <td><?= $row['nama_tipe']; ?></td>
    <td><?= $row['nama_unit']; ?></td>
    <td><?= $row['no_rangka']; ?></td>
    <td><?= $row['tahun_produksi']; ?></td>
    <td><?= number_format($row['harga_jual']); ?></td>
    <td><?= $row['status_stok']; ?></td>
    <td>
        <img src="../img/<?= $row['foto_unit']; ?>" width="80">
    </td>
    <td>
        <a href="edit.php?id=<?= $row['id_kendaraan']; ?>">Edit</a>
        <a href="hapus.php?id=<?= $row['id_kendaraan']; ?>">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}
include "../koneksi.php";
?>