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
    header("Location: view_members.php");
}
?>
