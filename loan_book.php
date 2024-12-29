<?php
include('db.php');
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $loan_date = date("Y-m-d");

    $query = "INSERT INTO loans (book_id, member_id, loan_date, status) VALUES ('$book_id', '$member_id', '$loan_date', 'Dipinjam')";
    if (mysqli_query($conn, $query)) {
        $msg = 'Peminjaman berhasil dicatat!';
    } else {
        $msg = 'Error: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Buku</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Peminjaman Buku</h2>
    <form method="post" action="loan_book.php">
        <label for="book_id">ID Buku:</label>
        <input type="text" name="book_id" required><br>
        <label for="member_id">ID Anggota:</label>
        <input type="text" name="member_id" required><br>
        <button type="submit">Pinjam</button>
    </form>
    <p><?php echo $msg; ?></p>
</body>
</html>
