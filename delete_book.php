<?php
include('db.php');
$msg = '';

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    
    // Hapus buku dari database
    $query = "DELETE FROM books WHERE id='$book_id'";
    if (mysqli_query($conn, $query)) {
        $msg = 'Buku berhasil dihapus!';
    } else {
        $msg = 'Error: ' . mysqli_error($conn);
    }
} else {
    $msg = 'ID buku tidak ditemukan.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Hapus Buku</h2>
    <p><?php echo $msg; ?></p>
    <a href="index.php">Kembali ke Daftar Buku</a>
</body>
</html>
