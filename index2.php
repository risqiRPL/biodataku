<?php
include 'koneksi.php';

// Hapus data jika tombol delete ditekan
if (isset($_POST['hapus'])) {
    $nis = $_POST['hapus'];
    mysqli_query($conn, "DELETE FROM siswa WHERE nis='$nis'");
    header("Location: index2.php");
    exit;
}

// Ambil semua data siswa
$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nis ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Data Siswa</h1>
    <a href="tambah.php" class="btn btn-primary mb-3">Tambah Siswa</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['nis']) ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['alamat']) ?></td>
                <td><?= htmlspecialchars($row['umur']) ?></td>
                <td>
                    <a href="edit.php?nis=<?= urlencode($row['nis']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="" style="display:inline-block;" onsubmit="return confirm('Yakin hapus data ini?')">
                        <button type="submit" name="hapus" value="<?= htmlspecialchars($row['nis']) ?>" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
