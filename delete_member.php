<?php
include('db.php');
$msg = '';

if (isset($_GET['id'])) {
    $member_id = $_GET['id'];
    
    // Hapus anggota dari database
    $query = "DELETE FROM members WHERE id='$member_id'";
    if (mysqli_query($conn, $query)) {
        $msg = 'Anggota berhasil dihapus!';
    } else {
        $msg = 'Error: ' . mysqli_error($conn);
    }
} else {
    $msg = 'ID anggota tidak ditemukan.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hapus Anggota</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Hapus Anggota</h2>
    <p><?php echo $msg; ?></p>
    <a href="view_members.php" class="button">Kembali ke Daftar Anggota</a>
</body>
</html>
