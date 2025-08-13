<?php
include 'koneksi.php';

if (!isset($_GET['nis'])) {
    header("Location: index2.php");
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
    header("Location: index2.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Edit Siswa</h1>
    <form method="POST" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label>NIS</label>
            <input type="text" value="<?= htmlspecialchars($data['nis']) ?>" class="form-control" disabled>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= htmlspecialchars($data['alamat']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Umur</label>
            <input type="number" name="umur" value="<?= htmlspecialchars($data['umur']) ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-warning">Update</button>
        <a href="index2.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
