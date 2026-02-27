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

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Kendaraan</title>
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
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    color:white;
}

.container{
    width:500px;
    background:rgba(255,255,255,0.05);
    backdrop-filter:blur(20px);
    padding:35px;
    border-radius:20px;
    box-shadow:0 0 30px rgba(0,0,0,0.4);
}

h2{
    text-align:center;
    margin-bottom:25px;
    font-weight:600;
}

.input-group{
    margin-bottom:15px;
}

label{
    font-size:14px;
    display:block;
    margin-bottom:5px;
}

input, select{
    width:100%;
    padding:10px;
    border:none;
    border-radius:10px;
    background:rgba(255,255,255,0.1);
    color:white;
    outline:none;
    transition:0.3s;
}

input:focus, select:focus{
    background:rgba(0,123,255,0.2);
    box-shadow:0 0 10px #007BFF;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:linear-gradient(45deg,#007BFF,#00C6FF);
    color:white;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
    margin-top:10px;
}

button:hover{
    transform:translateY(-3px);
    box-shadow:0 0 15px rgba(0,123,255,0.7);
}

.back{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#ccc;
    font-size:14px;
}

.back:hover{
    color:#fff;
}
</style>
</head>


<script>
const tahunView = document.getElementById('tahun_view');
const tahunHidden = document.getElementById('tahun');

tahunView.addEventListener('change', function () {
    if (this.value) {
        tahunHidden.value = new Date(this.value).getFullYear();
    }
});
</script>

<body>

<div class="container">
    <h2>🚘 Tambah Kendaraan</h2>

    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">

        <div class="input-group">
            <label>Nama Unit</label>
            <input type="text" name="nama_unit" required>
        </div>

        <div class="input-group">
            <label>No Rangka</label>
            <input type="text" name="no_rangka" required>
        </div>

        <div class="input-group">
    <label>Tahun</label>
    <input type="date" id="tahun_view" required>
    <input type="hidden" name="tahun" id="tahun">
</div>

        <div class="input-group">
            <label>Harga (Rp)</label>
            <input type="text" id="harga_view" placeholder="Rp 0" required>
            <input type="hidden" name="harga" id="harga">
        </div>

        <div class="input-group">
            <label>Merk</label>
            <select name="id_merk" required>
                <?php while($m = mysqli_fetch_assoc($merk)){ ?>
                    <option value="<?= $m['id_merk']; ?>">
                        <?= $m['nama_merk']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="input-group">
            <label>Tipe</label>
            <select name="id_tipe" required>
                <?php while($t = mysqli_fetch_assoc($tipe)){ ?>
                    <option value="<?= $t['id_tipe']; ?>">
                        <?= $t['nama_tipe']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="input-group">
            <label>Status</label>
            <select name="status" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Terjual">Terjual</option>
            </select>
        </div>

        <div class="input-group">
            <label>Foto Unit</label>
            <input type="file" name="foto" accept="image/*" required>
        </div>

        <button type="submit">Simpan Data</button>
    </form>

    <a href="index.php" class="back">← Kembali ke Data Kendaraan</a>
</div>

<!-- JAVASCRIPT FORMAT RUPIAH -->
<script>
const hargaView = document.getElementById('harga_view');
const hargaHidden = document.getElementById('harga');

hargaView.addEventListener('input', function () {
    let angka = this.value.replace(/[^0-9]/g, '');
    hargaHidden.value = angka;

    if (angka) {
        this.value = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka);
    } else {
        this.value = 'Rp 0';
    }
});
</script>

</body>
</html>