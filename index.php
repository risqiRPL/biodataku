<?php
include 'koneksi.php';

// Hapus data jika tombol delete ditekan
if (isset($_GET['hapus'])) {
    $nis = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM siswa WHERE nis='$nis'");
    header("Location: index.php");
    exit;
}

// Ambil semua data siswa
$result = mysqli_query($conn, "SELECT * FROM siswa ORDER BY nis ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <a href="tambah.php">Tambah Siswa</a>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['nis'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['alamat'] ?></td>
            <td><?= $row['umur'] ?></td>
            <td>
                <a href="edit.php?nis=<?= $row['nis'] ?>">Edit</a> | 
                <a href="index.php?hapus=<?= $row['nis'] ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
