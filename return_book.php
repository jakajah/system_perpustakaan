<?php
include('db.php');
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loan_id = $_POST['loan_id'];
    $return_date = date("Y-m-d");

    $query = "UPDATE loans SET status='Dikembalikan', return_date='$return_date' WHERE id='$loan_id'";
    if (mysqli_query($conn, $query)) {
        $msg = 'Pengembalian buku berhasil dicatat!';
    } else {
        $msg = 'Error: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Pengembalian Buku</h2>
    <form method="post" action="return_book.php">
        <label for="loan_id">ID Peminjaman:</label>
        <input type="text" name="loan_id" required><br>
        <button type="submit">Kembalikan</button>
    </form>
    <p><?php echo $msg; ?></p>
    <a href="index.php" class="button">Kembali ke Halaman Utama</a>
</body>
</html>
