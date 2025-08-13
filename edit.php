<?php
include 'koneksi.php';

if (!isset($_GET['nis'])) {
    header("Location: index.php");
    exit;
}

$nis = $_GET['nis'];
$result = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['update'])) {
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $umur   = $_POST['umur'];

    mysqli_query($conn, "UPDATE siswa SET nama='$nama', alamat='$alamat', umur='$umur' WHERE nis='$nis'");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>
    <h1>Edit Siswa</h1>
    <form method="POST">
        <p>NIS: <input type="text" value="<?= $data['nis'] ?>" disabled></p>
        <p>Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required></p>
        <p>Alamat: <textarea name="alamat" required><?= $data['alamat'] ?></textarea></p>
        <p>Umur: <input type="number" name="umur" value="<?= $data['umur'] ?>" required></p>
        <p><button type="submit" name="update">Update</button></p>
    </form>
</body>
</html>
