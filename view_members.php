<?php
include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Anggota</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Daftar Anggota</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM members");
    if ($result) {
        echo "<table>";
        echo "<tr><th>ID Anggota</th><th>Nama</th><th>Email</th><th>Nomor Telepon</th><th>Aksi</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td><a href='member_details.php?id=" . $row['id'] . "'>Lihat Detail</a> | ";
            echo "<a href='delete_member.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus anggota ini?\");'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    ?>
    <a href="index.php" class="button">Kembali ke Halaman Utama</a>
</body>
</html>
