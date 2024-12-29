<?php
include('db.php');
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $loan_date = date("Y-m-d");

    // Verifikasi bahwa book_id ada di tabel books
    $book_check_query = "SELECT * FROM books WHERE id='$book_id'";
    $book_check_result = mysqli_query($conn, $book_check_query);
    
    if (mysqli_num_rows($book_check_result) > 0) {
        $query = "INSERT INTO loans (book_id, member_id, loan_date) VALUES ('$book_id', '$member_id', '$loan_date')";
        if (mysqli_query($conn, $query)) {
            $msg = 'Peminjaman berhasil dicatat!';
        } else {
            $msg = 'Error: ' . mysqli_error($conn);
        }
    } else {
        $msg = 'Error: Book ID tidak ditemukan di tabel books.';
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
        <input type="text" name="book_id" value="1" required><br>
        <label for="member_id">ID Anggota:</label>
        <input type="text" name="member_id" required><br>
        <button type="submit">Pinjam</button>
    </form>
    <p><?php echo $msg; ?></p>
</body>
</html>
