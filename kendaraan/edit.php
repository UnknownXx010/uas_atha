<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../login.php");
    exit;
}

include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn,"
    SELECT * FROM kendaraan WHERE id_kendaraan='$id'
"));

$merk = mysqli_query($conn,"SELECT * FROM merk");
$tipe = mysqli_query($conn,"SELECT * FROM tipe_kendaraan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Kendaraan</title>
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
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0f2027,#1c2b36,#2c3e50);
    color:white;
}

.container{
    width:520px;
    background:rgba(255,255,255,0.07);
    backdrop-filter:blur(20px);
    padding:35px;
    border-radius:20px;
    box-shadow:0 0 40px rgba(0,0,0,0.5);
}

h2{
    text-align:center;
    margin-bottom:25px;
    font-weight:600;
    letter-spacing:1px;
}

.input-group{
    margin-bottom:15px;
}

label{
    font-size:14px;
    margin-bottom:6px;
    display:block;
    color:#ddd;
}

input, select{
    width:100%;
    padding:10px 12px;
    border:none;
    border-radius:10px;
    background:rgba(255,255,255,0.12);
    color:white;
    outline:none;
    transition:0.3s;
}

input:focus, select:focus{
    background:rgba(0,123,255,0.2);
    box-shadow:0 0 12px #007BFF;
}

.preview{
    margin-top:10px;
}

.preview img{
    width:120px;
    border-radius:12px;
    box-shadow:0 0 10px rgba(0,0,0,0.6);
}

button{
    width:100%;
    margin-top:20px;
    padding:12px;
    border:none;
    border-radius:12px;
    background:linear-gradient(45deg,#007BFF,#00C6FF);
    color:white;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-3px);
    box-shadow:0 0 20px rgba(0,123,255,0.7);
}

.back{
    display:block;
    text-align:center;
    margin-top:18px;
    color:#bbb;
    text-decoration:none;
    font-size:14px;
}

.back:hover{
    color:white;
}
</style>
</head>

<body>

<div class="container">
    <h2>✏️ Edit Data Kendaraan</h2>

    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $data['id_kendaraan']; ?>">
        <input type="hidden" name="foto_lama" value="<?= $data['foto_unit']; ?>">

        <div class="input-group">
            <label>Nama Unit</label>
            <input type="text" name="nama_unit" value="<?= $data['nama_unit']; ?>" required>
        </div>

        <div class="input-group">
            <label>No Rangka</label>
            <input type="text" name="no_rangka" value="<?= $data['no_rangka']; ?>" required>
        </div>

        <div class="input-group">
            <label>Tahun Produksi</label>
            <input type="number" name="tahun" value="<?= $data['tahun_produksi']; ?>" min="1980" max="<?= date('Y'); ?>" required>
        </div>

        <div class="input-group">
            <label>Harga (Rp)</label>
            <input type="number" name="harga" value="<?= $data['harga_jual']; ?>" required>
        </div>

        <div class="input-group">
            <label>Merk</label>
            <select name="id_merk" required>
                <?php while($m=mysqli_fetch_assoc($merk)){ ?>
                    <option value="<?= $m['id_merk']; ?>" <?= ($m['id_merk']==$data['id_merk'])?'selected':''; ?>>
                        <?= $m['nama_merk']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="input-group">
            <label>Tipe</label>
            <select name="id_tipe" required>
                <?php while($t=mysqli_fetch_assoc($tipe)){ ?>
                    <option value="<?= $t['id_tipe']; ?>" <?= ($t['id_tipe']==$data['id_tipe'])?'selected':''; ?>>
                        <?= $t['nama_tipe']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="input-group">
            <label>Status</label>
            <select name="status" required>
                <option value="Tersedia" <?= ($data['status_stok']=='Tersedia')?'selected':''; ?>>Tersedia</option>
                <option value="Terjual" <?= ($data['status_stok']=='Terjual')?'selected':''; ?>>Terjual</option>
            </select>
        </div>

        <div class="input-group">
            <label>Foto Saat Ini</label>
            <div class="preview">
                <img src="../img/<?= $data['foto_unit']; ?>">
            </div>
        </div>

        <div class="input-group">
            <label>Ganti Foto (Opsional)</label>
            <input type="file" name="foto" accept="image/*">
        </div>

        <button type="submit">💾 Update Data</button>
    </form>

    <a href="index.php" class="back">← Kembali ke Data Kendaraan</a>
</div>

</body>
</html>