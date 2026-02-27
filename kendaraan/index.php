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

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Data Kendaraan</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:linear-gradient(135deg,#0f2027,#1c2b36,#2c3e50);
    color:#fff;
    min-height:100vh;
    padding:40px;
}

/* Card Container */
.container{
    background:rgba(255,255,255,0.05);
    backdrop-filter:blur(20px);
    border-radius:20px;
    padding:30px;
    box-shadow:0 0 30px rgba(0,0,0,0.4);
}

/* Header */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.header h2{
    font-weight:600;
    letter-spacing:1px;
}

.button-group a{
    text-decoration:none;
    padding:10px 18px;
    border-radius:10px;
    font-size:14px;
    font-weight:500;
    transition:0.3s;
}

.btn-add{
    background:linear-gradient(45deg,#007BFF,#00C6FF);
    color:white;
}

.btn-logout{
    background:#444;
    color:#fff;
    margin-left:10px;
}

.button-group a:hover{
    transform:translateY(-3px);
    box-shadow:0 0 15px rgba(0,123,255,0.6);
}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
    overflow:hidden;
    border-radius:15px;
}

thead{
    background:rgba(0,123,255,0.3);
}

thead th{
    padding:15px;
    font-weight:500;
    text-align:left;
}

tbody tr{
    background:rgba(255,255,255,0.05);
    transition:0.3s;
}

tbody tr:hover{
    background:rgba(0,123,255,0.15);
}

td{
    padding:12px 15px;
    border-bottom:1px solid rgba(255,255,255,0.05);
}

img{
    border-radius:8px;
}

/* Action links */
.action a{
    text-decoration:none;
    padding:6px 12px;
    border-radius:8px;
    font-size:13px;
    margin-right:5px;
    transition:0.3s;
}

.edit{
    background:#3498db;
    color:white;
}

.hapus{
    background:#e74c3c;
    color:white;
}

.action a:hover{
    opacity:0.8;
}
</style>
</head>

<body>

<div class="container">

    <div class="header">
        <h2>🚘 Data Kendaraan</h2>
        <div class="button-group">
            <a href="tambah.php" class="btn-add">+ Tambah Data</a>
            <a href="../logout.php" class="btn-logout">Logout</a>
        </div>
    </div>

    <table>
        <thead>
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
        </thead>
        <tbody>

        <?php $no=1; while($row=mysqli_fetch_assoc($query)){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama_merk']; ?></td>
                <td><?= $row['nama_tipe']; ?></td>
                <td><?= $row['nama_unit']; ?></td>
                <td><?= $row['no_rangka']; ?></td>
                <td><?= $row['tahun_produksi']; ?></td>
                <td>Rp <?= number_format($row['harga_jual'],0,',','.'); ?></td>
                <td><?= $row['status_stok']; ?></td>
                <td>
                    <img src="../img/<?= $row['foto_unit']; ?>" width="70">
                </td>
                <td class="action">
                    <a href="edit.php?id=<?= $row['id_kendaraan']; ?>" class="edit">Edit</a>
                    <a href="hapus.php?id=<?= $row['id_kendaraan']; ?>" class="hapus" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>

</div>

</body>
</html>