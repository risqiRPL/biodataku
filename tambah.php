<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nis    = $_POST['nis'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $umur   = $_POST['umur'];

    mysqli_query($conn, "INSERT INTO siswa (nis, nama, alamat, umur) 
                         VALUES ('$nis', '$nama', '$alamat', '$umur')");
    header("Location: index2.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Tambah Siswa</h1>
    <form method="POST" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="index2.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
