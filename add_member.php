<?php
include('db.php');
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    
    $query = "INSERT INTO members (name, email, phone_number) VALUES ('$name', '$email', '$phone_number')";
    if (mysqli_query($conn, $query)) {
        $msg = 'Anggota berhasil didaftarkan!';
    } else {
        $msg = 'Error: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Anggota Baru</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Tambah Anggota Baru</h2>
    <form method="post" action="add_member.php">
        <label for="name">Nama:</label>
        <input type="text" name="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="phone_number">Nomor Telepon:</label>
        <input type="text" name="phone_number" required><br>
        <button type="submit">Tambah Anggota</button>
    </form>
    <p><?php echo $msg; ?></p>
    <a href="index.php" class="button">Kembali ke Halaman Utama</a>
</body>
</html>
