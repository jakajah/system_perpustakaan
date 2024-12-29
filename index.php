<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}

include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="logout.php" class="button">Logout</a>
    <a href="add_book.php" class="button">Tambah Buku Baru</a>
    <a href="add_member.php" class="button">Tambah Anggota Baru</a>
    <a href="view_members.php" class="button">Lihat Anggota</a>
    <a href="loan_book_direct.php" class="button">Peminjaman Buku</a>
    <a href="return_book.php" class="button">Pengembalian Buku</a>
    <h2>Daftar Buku</h2>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM books");
    if ($result) {
        echo "<table>";
        echo "<tr><th>ID Buku</th><th>Judul</th><th>Penulis</th><th>Tahun Terbit</th><th>Genre</th><th>Aksi</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['publication_year'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td><a href='delete_book.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus buku ini?\");'>Hapus</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    ?>
    
    <h2>Buku yang Dipinjam</h2>
    <?php
    $result = mysqli_query($conn, "SELECT l.id, b.title, m.name, l.loan_date, l.return_date, l.status 
                                   FROM loans l 
                                   JOIN books b ON l.book_id = b.id 
                                   JOIN members m ON l.member_id = m.id");
    if ($result) {
        echo "<table>";
        echo "<tr><th>ID Peminjaman</th><th>Judul Buku</th><th>Nama Peminjam</th><th>Tanggal Peminjaman</th><th>Tanggal Pengembalian</th><th>Status</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['loan_date'] . "</td>";
            echo "<td>" . ($row['status'] == 'Dikembalikan' ? $row['return_date'] : '-') . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    ?>
</body>
</html>
