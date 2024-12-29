<?php
include('db.php');
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publication_year = $_POST['publication_year'];
    $genre = $_POST['genre'];
    
    $query = "INSERT INTO books (title, author, publication_year, genre) VALUES ('$title', '$author', '$publication_year', '$genre')";
    if (mysqli_query($conn, $query)) {
        $msg = 'Buku berhasil didaftarkan!';
    } else {
        $msg = 'Error: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku Baru</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Tambah Buku Baru</h2>
    <form method="post" action="add_book.php">
        <label for="title">Judul Buku:</label>
        <input type="text" name="title" required><br>
        <label for="author">Penulis:</label>
        <input type="text" name="author" required><br>
        <label for="publication_year">Tahun Terbit:</label>
        <input type="number" name="publication_year" required><br>
        <label for="genre">Genre:</label>
        <input type="text" name="genre" required><br>
        <button type="submit">Tambah Buku</button>
    </form>
    <p><?php echo $msg; ?></p>
    <a href="index.php" class="button">Kembali ke Daftar Buku</a>
</body>
</html>
