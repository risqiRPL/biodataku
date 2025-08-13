<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nis    = $_POST['nis'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $umur   = $_POST['umur'];

    mysqli_query($conn, "INSERT INTO siswa (nis, nama, alamat, umur) 
                         VALUES ('$nis', '$nama', '$alamat', '$umur')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
</head>
<body>
    <h1>Tambah Siswa</h1>
    <form method="POST">
        <p>NIS: <input type="text" name="nis" required></p>
        <p>Nama: <input type="text" name="nama" required></p>
        <p>Alamat: <textarea name="alamat" required></textarea></p>
        <p>Umur: <input type="number" name="umur" required></p>
        <p><button type="submit" name="simpan">Simpan</button></p>
    </form>
</body>
</html>
