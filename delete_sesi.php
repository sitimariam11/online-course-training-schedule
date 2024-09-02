<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the session record from the database
    $sql = "DELETE FROM sessions WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the list of sessions with a success message
        header("Location: daftar_sesi.php?message=Berhasil menghapus");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid Request!";
    exit;
}
?>