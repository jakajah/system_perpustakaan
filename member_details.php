<?php
include('db.php');
$member_id = $_GET['id'];
$member = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM members WHERE id='$member_id'"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Anggota</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Detail Anggota</h2>
    <p>Nama: <?php echo $member['name']; ?></p>
    <p>Email: <?php echo $member['email']; ?></p>
    <p>Nomor Telepon: <?php echo $member['phone_number']; ?></p>
    
    <h3>Buku yang Dipinjam</h3>
    <?php
    $result = mysqli_query($conn, "SELECT b.title, l.loan_date, l.status 
                                   FROM loans l 
                                   JOIN books b ON l.book_id = b.id 
                                   WHERE l.member_id = '$member_id'");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Judul Buku: " . $row['title'] . "<br>";
            echo "Tanggal Peminjaman: " . $row['loan_date'] . "<br>";
            echo "Status: " . $row['status'] . "<br><br>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    ?>
    
    <a href="view_members.php" class="button">Kembali ke Daftar Anggota</a>
</body>
</html>
